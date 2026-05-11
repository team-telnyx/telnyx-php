<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\AI\AIGetModelsResponse;
use Telnyx\AI\AISummarizeResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AIContract;
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
 * Generate text with LLMs.
 *
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
    }

    /**
     * @deprecated
     *
     * @api
     *
     * **Deprecated**: Use `POST /v2/ai/openai/responses` instead. Chat with a language model. This endpoint is consistent with the [OpenAI Responses API](https://platform.openai.com/docs/api-reference/responses) and may be used with the OpenAI JS or Python SDK. Response id parameter is not supported at the moment. Use 'conversation' parameter to leverage persistent conversations feature.
     *
     * @param array<string,mixed> $body
     * @param RequestOpts|null $requestOptions
     *
     * @return array<string,mixed>
     *
     * @throws APIException
     */
    public function createResponse(
        array $body,
        RequestOptions|array|null $requestOptions = null
    ): array {
        $params = Util::removeNulls(['body' => $body]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createResponse(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @deprecated
     *
     * @api
     *
     * **Deprecated**: Use `GET /v2/ai/openai/models` instead.
     *
     * Returns the same `ModelsResponse` payload as the OpenAI-compatible endpoint — open-source LLMs hosted on Telnyx (e.g. `moonshotai/Kimi-K2.6`, `zai-org/GLM-5.1-FP8`, `MiniMaxAI/MiniMax-M2.7`), embedding models, and fine-tuned models — kept around for backwards compatibility. New integrations should use `/v2/ai/openai/models`.
     *
     * Model ids follow the `{organization}/{model_name}` convention from Hugging Face.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveModels(
        RequestOptions|array|null $requestOptions = null
    ): AIGetModelsResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveModels(requestOptions: $requestOptions);

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
