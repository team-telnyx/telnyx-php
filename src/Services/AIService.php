<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\AI\AIGetModelsResponse;
use Telnyx\AI\AISummarizeParams;
use Telnyx\AI\AISummarizeResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
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

final class AIService implements AIContract
{
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
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->assistants = new AssistantsService($client);
        $this->audio = new AudioService($client);
        $this->chat = new ChatService($client);
        $this->clusters = new ClustersService($client);
        $this->conversations = new ConversationsService($client);
        $this->embeddings = new EmbeddingsService($client);
        $this->fineTuning = new FineTuningService($client);
        $this->integrations = new IntegrationsService($client);
        $this->mcpServers = new McpServersService($client);
    }

    /**
     * @api
     *
     * This endpoint returns a list of Open Source and OpenAI models that are available for use. <br /><br /> **Note**: Model `id`'s will be in the form `{source}/{model_name}`. For example `openai/gpt-4` or `mistralai/Mistral-7B-Instruct-v0.1` consistent with HuggingFace naming conventions.
     *
     * @throws APIException
     */
    public function retrieveModels(
        ?RequestOptions $requestOptions = null
    ): AIGetModelsResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'ai/models',
            options: $requestOptions,
            convert: AIGetModelsResponse::class,
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
     *   bucket: string, filename: string, system_prompt?: string
     * }|AISummarizeParams $params
     *
     * @throws APIException
     */
    public function summarize(
        array|AISummarizeParams $params,
        ?RequestOptions $requestOptions = null
    ): AISummarizeResponse {
        [$parsed, $options] = AISummarizeParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'ai/summarize',
            body: (object) $parsed,
            options: $options,
            convert: AISummarizeResponse::class,
        );
    }
}
