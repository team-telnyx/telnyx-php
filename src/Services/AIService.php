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
    }

    /**
     * @api
     *
     * This endpoint returns a list of Open Source and OpenAI models that are available for use. <br /><br /> **Note**: Model `id`'s will be in the form `{source}/{model_name}`. For example `openai/gpt-4` or `mistralai/Mistral-7B-Instruct-v0.1` consistent with HuggingFace naming conventions.
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
