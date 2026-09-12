<?php

declare(strict_types=1);

namespace Telnyx\Services\AI;

use Telnyx\AI\ModelsResponse;
use Telnyx\AI\OpenAI\OpenAICreateResponseParams\Mode;
use Telnyx\AI\OpenAI\OpenAICreateResponseParams\Reasoning;
use Telnyx\AI\OpenAI\OpenAICreateResponseParams\Region;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\OpenAIContract;
use Telnyx\Services\AI\OpenAI\ChatService;
use Telnyx\Services\AI\OpenAI\EmbeddingsService;

/**
 * @phpstan-import-type ReasoningShape from \Telnyx\AI\OpenAI\OpenAICreateResponseParams\Reasoning
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
     * Create a response using Telnyx's OpenAI-compatible Responses API. This endpoint is compatible with the [OpenAI Responses API](https://developers.openai.com/api/reference/responses/overview) and may be used with the OpenAI JS or Python SDK by setting the base URL to `https://api.telnyx.com/v2/ai/openai`.
     *
     * The `conversation` parameter refers to a Telnyx Conversation rather than an OpenAI-hosted conversation object. To persist a thread across turns, first [create a conversation](https://developers.telnyx.com/api-reference/conversations/create-a-conversation) with `POST /ai/conversations`, then pass that conversation's `id` in the Responses request as `conversation`. The endpoint appends the new input, assistant output, reasoning, and tool-call messages to that conversation. Reuse the same `conversation` id on subsequent Responses requests, including tool-result followups, so the model receives the prior context.
     *
     * If `conversation` is omitted, the request is processed without persisting messages to a Telnyx conversation. Use the Conversations API to manage history: [list conversations](https://developers.telnyx.com/api-reference/conversations/list-conversations) (optionally filtered by metadata), [fetch messages](https://developers.telnyx.com/api-reference/conversations/get-conversation-messages) for a conversation, and optionally [add messages](https://developers.telnyx.com/api-reference/conversations/create-message) outside the Responses flow.
     *
     * You can attach arbitrary metadata when creating a conversation (for example to tag the conversation's source, channel, or user) and later filter by it when listing conversations.
     *
     * @param string $conversation Optional Telnyx Conversation ID from `POST /ai/conversations`. When provided, Telnyx stores this turn on that conversation and uses the conversation's prior messages as context. Reuse the same ID for subsequent turns and tool-result followups. Omit it for a non-persisted, stateless response.
     * @param array<string,mixed> $input the input items for this turn, using the OpenAI Responses API input format
     * @param string $instructions Optional system/developer instructions for the model. When used with a persisted `conversation`, send these on the first request that creates the thread; subsequent turns can rely on the stored history.
     * @param Mode|value-of<Mode> $mode How strictly `region` is applied. `preferred` (the default when `region` is set) tries that region first and falls back to another when the model cannot be served there, so a request that would have succeeded still succeeds. `strict` pins the request: it is served from that region or it fails with a 422, never redirected to another region. Requires `region`.
     * @param string $model Model identifier to use for the response, for example `zai-org/GLM-5.1-FP8` or another model available from the Telnyx OpenAI-compatible models endpoint.
     * @param Reasoning|ReasoningShape $reasoning
     * @param Region|value-of<Region> $region Optional data-residency region the request should be served from, using the same vocabulary as your account's Data Locality setting. Behavior depends on `mode`. Supported for Telnyx-hosted models only: a request routed to an external provider never passes through Telnyx model routing, so a region cannot be enforced for it. Omit for today's latency-based routing.
     * @param string $serviceTier The service tier to use for this request. Supported values vary by model; use `GET /v2/ai/openai/models` and inspect the model's `service_tiers` field. If omitted, Telnyx-hosted models use `default`.
     * @param bool $stream set to `true` to stream Server-Sent Events, matching OpenAI's Responses streaming format
     * @param RequestOpts|null $requestOptions
     *
     * @return array<string,mixed>
     *
     * @throws APIException
     */
    public function createResponse(
        ?string $conversation = null,
        ?array $input = null,
        ?string $instructions = null,
        Mode|string $mode = 'preferred',
        ?string $model = null,
        Reasoning|array|null $reasoning = null,
        Region|string|null $region = null,
        ?string $serviceTier = null,
        ?bool $stream = null,
        RequestOptions|array|null $requestOptions = null,
    ): array {
        $params = array_filter(
            [
                'conversation' => $conversation ?? Omitted::VALUE,
                'input' => $input ?? Omitted::VALUE,
                'instructions' => $instructions ?? Omitted::VALUE,
                'mode' => $mode,
                'model' => $model ?? Omitted::VALUE,
                'reasoning' => $reasoning ?? Omitted::VALUE,
                'region' => $region ?? Omitted::VALUE,
                'serviceTier' => $serviceTier ?? Omitted::VALUE,
                'stream' => $stream ?? Omitted::VALUE,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

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
    ): ModelsResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listModels(requestOptions: $requestOptions);

        return $response->parse();
    }
}
