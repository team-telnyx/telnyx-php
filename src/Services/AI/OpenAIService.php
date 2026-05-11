<?php

declare(strict_types=1);

namespace Telnyx\Services\AI;

use Telnyx\AI\OpenAI\OpenAIListModelsResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\OpenAIContract;
use Telnyx\Services\AI\OpenAI\ChatService;
use Telnyx\Services\AI\OpenAI\EmbeddingsService;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class OpenAIService implements OpenAIContract
{
    /**
     * @api
     */
    public OpenAIRawService $raw;

    /**
     * @api
     */
    public EmbeddingsService $embeddings;

    /**
     * @api
     */
    public ChatService $chat;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new OpenAIRawService($client);
        $this->embeddings = new EmbeddingsService($client);
        $this->chat = new ChatService($client);
    }

    /**
     * @api
     *
     * Chat with a language model. This endpoint is consistent with the [OpenAI Responses API](https://platform.openai.com/docs/api-reference/responses) and may be used with the OpenAI JS or Python SDK. Response id parameter is not supported at the moment. Use 'conversation' parameter to leverage persistent conversations feature.
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
     * @api
     *
     * Lists every model currently available to your account on Telnyx Inference, including SOTA open-source LLMs hosted on Telnyx GPUs (for example `moonshotai/Kimi-K2.6`, `zai-org/GLM-5.1-FP8`, and `MiniMaxAI/MiniMax-M2.7`), embedding models, and any fine-tuned models you have created.
     *
     * Each entry is a `ModelMetadata` object describing the model id, owner, task, context length, supported languages, billing tier, pricing per 1M tokens, deployment regions, and whether the model supports vision or fine-tuning. Use this endpoint to discover model ids you can pass to `POST /v2/ai/openai/chat/completions`.
     *
     * Model ids follow the `{organization}/{model_name}` convention from Hugging Face (for example `moonshotai/Kimi-K2.6`). This endpoint is OpenAI-compatible: clients pointed at `https://api.telnyx.com/v2/ai/openai` can call `client.models.list()` to retrieve the same payload.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listModels(
        RequestOptions|array|null $requestOptions = null
    ): OpenAIListModelsResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listModels(requestOptions: $requestOptions);

        return $response->parse();
    }
}
