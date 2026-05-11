<?php

declare(strict_types=1);

namespace Telnyx\Services\AI;

use Telnyx\AI\OpenAI\OpenAICreateResponseParams;
use Telnyx\AI\OpenAI\OpenAIListModelsResponse;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Conversion\MapOf;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\OpenAIRawContract;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class OpenAIRawService implements OpenAIRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a response using Telnyx's OpenAI-compatible Responses API. This endpoint is compatible with the [OpenAI Responses API](https://developers.openai.com/api/reference/responses/overview) and may be used with the OpenAI JS or Python SDK by setting the base URL to `https://api.telnyx.com/v2/ai/openai`.
     *
     * The `conversation` parameter refers to a Telnyx Conversation rather than an OpenAI-hosted conversation object. To persist a thread across turns, first [create a conversation](https://developers.telnyx.com/api-reference/conversations/create-a-conversation) with `POST /ai/conversations`, then pass that conversation's `id` in the Responses request as `conversation`. The endpoint appends the new input, assistant output, reasoning, and tool-call messages to that conversation. Reuse the same `conversation` id on subsequent Responses requests, including tool-result followups, so the model receives the prior context.
     *
     * If `conversation` is omitted, the request is processed without persisting messages to a Telnyx conversation. Use the Conversations API to manage history: [list conversations](https://developers.telnyx.com/api-reference/conversations/list-conversations) (optionally filtered by metadata), [fetch messages](https://developers.telnyx.com/api-reference/conversations/get-conversation-messages) for a conversation, and optionally [add messages](https://developers.telnyx.com/api-reference/conversations/create-message) outside the Responses flow.
     *
     * You can attach arbitrary metadata when creating a conversation (for example to tag the conversation's source, channel, or user) and later filter by it when listing conversations.
     *
     * @param array{
     *   conversation?: string,
     *   input?: mixed,
     *   instructions?: string,
     *   model?: string,
     *   stream?: bool,
     * }|OpenAICreateResponseParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<array<string,mixed>>
     *
     * @throws APIException
     */
    public function createResponse(
        array|OpenAICreateResponseParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = OpenAICreateResponseParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'ai/openai/responses',
            body: (object) $parsed,
            options: $options,
            convert: new MapOf('mixed'),
        );
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
     * @return BaseResponse<OpenAIListModelsResponse>
     *
     * @throws APIException
     */
    public function listModels(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'ai/openai/models',
            options: $requestOptions,
            convert: OpenAIListModelsResponse::class,
        );
    }
}
