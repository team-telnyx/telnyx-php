<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\AI\AIGetConversationHistoriesResponse;
use Telnyx\AI\AIRetrieveConversationHistoriesParams;
use Telnyx\AI\AIRetrieveConversationHistoriesParams\Region;
use Telnyx\AI\AISummarizeParams;
use Telnyx\AI\AISummarizeResponse;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AIRawContract;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class AIRawService implements AIRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

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
     * @param array{
     *   q: string,
     *   filterIngestedAtGte?: \DateTimeInterface,
     *   filterIngestedAtLte?: \DateTimeInterface,
     *   filterRecordCreatedAtGte?: \DateTimeInterface,
     *   filterRecordCreatedAtLte?: \DateTimeInterface,
     *   filterRecordID?: string,
     *   filterRegionIn?: string,
     *   filterRetention?: string,
     *   filterUserID?: string,
     *   minScore?: float,
     *   pageNumber?: int,
     *   pageSize?: int,
     *   region?: Region|value-of<Region>,
     * }|AIRetrieveConversationHistoriesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AIGetConversationHistoriesResponse>
     *
     * @throws APIException
     */
    public function retrieveConversationHistories(
        array|AIRetrieveConversationHistoriesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AIRetrieveConversationHistoriesParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'ai/conversation_histories',
            query: Util::array_transform_keys(
                $parsed,
                [
                    'filterIngestedAtGte' => 'filter[ingested_at][gte]',
                    'filterIngestedAtLte' => 'filter[ingested_at][lte]',
                    'filterRecordCreatedAtGte' => 'filter[record_created_at][gte]',
                    'filterRecordCreatedAtLte' => 'filter[record_created_at][lte]',
                    'filterRecordID' => 'filter[record_id]',
                    'filterRegionIn' => 'filter[region][in]',
                    'filterRetention' => 'filter[retention]',
                    'filterUserID' => 'filter[user_id]',
                    'minScore' => 'min_score',
                    'pageNumber' => 'page[number]',
                    'pageSize' => 'page[size]',
                ],
            ),
            options: $options,
            convert: AIGetConversationHistoriesResponse::class,
        );
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
     * @param array{
     *   bucket: string, filename: string, systemPrompt?: string
     * }|AISummarizeParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AISummarizeResponse>
     *
     * @throws APIException
     */
    public function summarize(
        array|AISummarizeParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AISummarizeParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'ai/summarize',
            body: (object) $parsed,
            options: $options,
            convert: AISummarizeResponse::class,
        );
    }
}
