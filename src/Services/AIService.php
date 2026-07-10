<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\AI\AIGetConversationHistoriesResponse;
use Telnyx\AI\AIRetrieveConversationHistoriesParams\Region;
use Telnyx\AI\AISummarizeResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AIContract;
use Telnyx\Services\AI\AnthropicService;
use Telnyx\Services\AI\AssistantsService;
use Telnyx\Services\AI\AudioService;
use Telnyx\Services\AI\ChatService;
use Telnyx\Services\AI\ClustersService;
use Telnyx\Services\AI\ConversationsService;
use Telnyx\Services\AI\EmbeddingsService;
use Telnyx\Services\AI\FineTuningService;
use Telnyx\Services\AI\IntegrationsService;
use Telnyx\Services\AI\McpServersService;
use Telnyx\Services\AI\MissionsService;
use Telnyx\Services\AI\OpenAIService;
use Telnyx\Services\AI\ToolsService;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class AIService implements AIContract
{
    /**
     * @api
     */
    public AIRawService $raw;

    /**
     * @api
     */
    public AssistantsService $assistants;

    /**
     * @api
     */
    public AudioService $audio;

    /**
     * @api
     */
    public ChatService $chat;

    /**
     * @api
     */
    public ClustersService $clusters;

    /**
     * @api
     */
    public ConversationsService $conversations;

    /**
     * @api
     */
    public EmbeddingsService $embeddings;

    /**
     * @api
     */
    public FineTuningService $fineTuning;

    /**
     * @api
     */
    public IntegrationsService $integrations;

    /**
     * @api
     */
    public McpServersService $mcpServers;

    /**
     * @api
     */
    public MissionsService $missions;

    /**
     * @api
     */
    public OpenAIService $openai;

    /**
     * @api
     */
    public ToolsService $tools;

    /**
     * @api
     */
    public AnthropicService $anthropic;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new AIRawService($client);
        $this->assistants = new AssistantsService($client);
        $this->audio = new AudioService($client);
        $this->chat = new ChatService($client);
        $this->clusters = new ClustersService($client);
        $this->conversations = new ConversationsService($client);
        $this->embeddings = new EmbeddingsService($client);
        $this->fineTuning = new FineTuningService($client);
        $this->integrations = new IntegrationsService($client);
        $this->mcpServers = new McpServersService($client);
        $this->missions = new MissionsService($client);
        $this->openai = new OpenAIService($client);
        $this->tools = new ToolsService($client);
        $this->anthropic = new AnthropicService($client);
    }

    /**
     * @api
     *
     * Performs semantic vector search across conversation history records.
     *
     * **How it works:**
     * 1. The query text is embedded into a 1024-dimensional vector using the multilingual-e5-large model.
     * 2. The vector is compared against indexed record chunks using semantic similarity search.
     * 3. When no region is specified, all regions are queried in parallel (fan-out) and results are merged by score.
     * 4. Results are ranked by similarity score (descending) and paginated via `page[number]` / `page[size]`.
     *
     * **Authentication:** Requires a Telnyx API key via `Authorization: Bearer <key>`. Results are automatically scoped to the caller's organization — `organization_id` is injected from the auth token and cannot be overridden.
     *
     * **Chunking:** Records are split into chunks of up to 480 tokens with 64-token overlap at ingestion time. Each search result represents a single chunk, with `chunk_index` and `chunk_total` indicating its position within the original record.
     *
     * **Filtering:** Use `filter[field][operator]=value` query parameters to narrow results before vector search.
     *
     * Top-level filterable fields: `user_id`, `region`, `record_id`, `record_created_at`, `ingested_at`, `retention`
     *
     * Note: `retention` is filter-only — it can be used to narrow results but is not returned in the response body.
     *
     * Metadata fields: any field not in the list above is resolved to `data.metadata.<field>` (e.g., `filter[language]=en` → `data.metadata.language`).
     *
     * Supported filter operators:
     * - `eq` — exact match (default when no operator specified)
     * - `in` — match any of comma-separated values
     * - `gte`, `gt`, `lte`, `lt` — range comparisons (useful for date filtering)
     * - `contains` — wildcard substring match
     *
     * **Examples:**
     * ```
     * GET /v2/ai/conversation_histories?q=billing+issue&page[size]=10
     * GET /v2/ai/conversation_histories?q=setup+guide&region=USA&min_score=0.5
     * GET /v2/ai/conversation_histories?q=refund&filter[record_created_at][gte]=2026-01-01T00:00:00Z
     * GET /v2/ai/conversation_histories?q=outage&filter[region][in]=USA,DEU
     * GET /v2/ai/conversation_histories?q=hold+time&filter[language]=en
     * ```
     *
     * @param string $q Natural language search query. The text is embedded into a 1024-dimensional vector and compared against indexed record chunks using semantic similarity.
     * @param \DateTimeInterface $filterIngestedAtGte only include records ingested (chunked, embedded, and indexed) on or after this ISO 8601 timestamp
     * @param \DateTimeInterface $filterIngestedAtLte only include records ingested (chunked, embedded, and indexed) on or before this ISO 8601 timestamp
     * @param \DateTimeInterface $filterRecordCreatedAtGte only include records whose original creation time is on or after this ISO 8601 timestamp
     * @param \DateTimeInterface $filterRecordCreatedAtLte only include records whose original creation time is on or before this ISO 8601 timestamp
     * @param string $filterRecordID filter to chunks belonging to a specific parent record (exact match)
     * @param string $filterRegionIn Filter by the region stored on the record. Comma-separated to match multiple regions (USA, DEU, AUS, UAE). Distinct from the `region` parameter, which selects which cluster(s) are queried.
     * @param string $filterRetention Filter by retention policy (exact match). Filter-only: not returned in the response body.
     * @param string $filterUserID filter to records owned by a specific user (exact match)
     * @param float $minScore Minimum cosine similarity score threshold (0.0 to 1.0). Results below this threshold are excluded.
     * @param int $pageNumber Page number to return (1-based). Defaults to 1.
     * @param int $pageSize Number of results per page. Defaults to 20, maximum 100.
     * @param Region|value-of<Region> $region Restrict search to a specific region. When omitted, all regions are queried in parallel (fan-out) and results are merged by similarity score.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveConversationHistories(
        string $q,
        ?\DateTimeInterface $filterIngestedAtGte = null,
        ?\DateTimeInterface $filterIngestedAtLte = null,
        ?\DateTimeInterface $filterRecordCreatedAtGte = null,
        ?\DateTimeInterface $filterRecordCreatedAtLte = null,
        ?string $filterRecordID = null,
        ?string $filterRegionIn = null,
        ?string $filterRetention = null,
        ?string $filterUserID = null,
        float $minScore = 0,
        int $pageNumber = 1,
        int $pageSize = 20,
        Region|string|null $region = null,
        RequestOptions|array|null $requestOptions = null,
    ): AIGetConversationHistoriesResponse {
        $params = Util::removeNulls(
            [
                'q' => $q,
                'filterIngestedAtGte' => $filterIngestedAtGte,
                'filterIngestedAtLte' => $filterIngestedAtLte,
                'filterRecordCreatedAtGte' => $filterRecordCreatedAtGte,
                'filterRecordCreatedAtLte' => $filterRecordCreatedAtLte,
                'filterRecordID' => $filterRecordID,
                'filterRegionIn' => $filterRegionIn,
                'filterRetention' => $filterRetention,
                'filterUserID' => $filterUserID,
                'minScore' => $minScore,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
                'region' => $region,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveConversationHistories(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Generate a summary of a file's contents.
     *
     *  Supports the following text formats:
     * - PDF, HTML, txt, json, csv
     *
     *  Supports the following media formats (billed for both the transcription and summary):
     * - flac, mp3, mp4, mpeg, mpga, m4a, ogg, wav, or webm
     * - Up to 100 MB
     *
     * @param string $bucket the name of the bucket that contains the file to be summarized
     * @param string $filename the name of the file to be summarized
     * @param string $systemPrompt a system prompt to guide the summary generation
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function summarize(
        string $bucket,
        string $filename,
        ?string $systemPrompt = null,
        RequestOptions|array|null $requestOptions = null,
    ): AISummarizeResponse {
        $params = Util::removeNulls(
            [
                'bucket' => $bucket,
                'filename' => $filename,
                'systemPrompt' => $systemPrompt,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->summarize(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
