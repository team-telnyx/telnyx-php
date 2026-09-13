<?php

declare(strict_types=1);

namespace Telnyx\AI\OpenAI;

use Telnyx\AI\OpenAI\OpenAICreateResponseParams\Mode;
use Telnyx\AI\OpenAI\OpenAICreateResponseParams\Reasoning;
use Telnyx\AI\OpenAI\OpenAICreateResponseParams\Region;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Create a response using Telnyx's OpenAI-compatible Responses API. This endpoint is compatible with the [OpenAI Responses API](https://developers.openai.com/api/reference/responses/overview) and may be used with the OpenAI JS or Python SDK by setting the base URL to `https://api.telnyx.com/v2/ai/openai`.
 *
 * The `conversation` parameter refers to a Telnyx Conversation rather than an OpenAI-hosted conversation object. To persist a thread across turns, first [create a conversation](https://developers.telnyx.com/api-reference/conversations/create-a-conversation) with `POST /ai/conversations`, then pass that conversation's `id` in the Responses request as `conversation`. The endpoint appends the new input, assistant output, reasoning, and tool-call messages to that conversation. Reuse the same `conversation` id on subsequent Responses requests, including tool-result followups, so the model receives the prior context.
 *
 * If `conversation` is omitted, the request is processed without persisting messages to a Telnyx conversation. Use the Conversations API to manage history: [list conversations](https://developers.telnyx.com/api-reference/conversations/list-conversations) (optionally filtered by metadata), [fetch messages](https://developers.telnyx.com/api-reference/conversations/get-conversation-messages) for a conversation, and optionally [add messages](https://developers.telnyx.com/api-reference/conversations/create-message) outside the Responses flow.
 *
 * You can attach arbitrary metadata when creating a conversation (for example to tag the conversation's source, channel, or user) and later filter by it when listing conversations.
 *
 * @see Telnyx\Services\AI\OpenAIService::createResponse()
 *
 * @phpstan-import-type ReasoningShape from \Telnyx\AI\OpenAI\OpenAICreateResponseParams\Reasoning
 *
 * @phpstan-type OpenAICreateResponseParamsShape = array{
 *   conversation?: string|null,
 *   input?: array<string,mixed>|null,
 *   instructions?: string|null,
 *   mode?: null|Mode|value-of<Mode>,
 *   model?: string|null,
 *   reasoning?: null|Reasoning|ReasoningShape,
 *   region?: null|Region|value-of<Region>,
 *   serviceTier?: string|null,
 *   stream?: bool|null,
 * }
 */
final class OpenAICreateResponseParams implements BaseModel
{
    /** @use SdkModel<OpenAICreateResponseParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Optional Telnyx Conversation ID from `POST /ai/conversations`. When provided, Telnyx stores this turn on that conversation and uses the conversation's prior messages as context. Reuse the same ID for subsequent turns and tool-result followups. Omit it for a non-persisted, stateless response.
     */
    #[Optional]
    public ?string $conversation;

    /**
     * The input items for this turn, using the OpenAI Responses API input format.
     *
     * @var array<string,mixed>|null $input
     */
    #[Optional(map: 'mixed')]
    public ?array $input;

    /**
     * Optional system/developer instructions for the model. When used with a persisted `conversation`, send these on the first request that creates the thread; subsequent turns can rely on the stored history.
     */
    #[Optional]
    public ?string $instructions;

    /**
     * How strictly `region` is applied. `preferred` (the default when `region` is set) tries that region first and falls back to another when the model cannot be served there, so a request that would have succeeded still succeeds. `strict` pins the request: it is served from that region or it fails with a 422, never redirected to another region. Requires `region`.
     *
     * @var value-of<Mode>|null $mode
     */
    #[Optional(enum: Mode::class)]
    public ?string $mode;

    /**
     * Model identifier to use for the response, for example `zai-org/GLM-5.1-FP8` or another model available from the Telnyx OpenAI-compatible models endpoint.
     */
    #[Optional]
    public ?string $model;

    #[Optional]
    public ?Reasoning $reasoning;

    /**
     * Optional data-residency region the request should be served from, using the same vocabulary as your account's Data Locality setting. Behavior depends on `mode`. Supported for Telnyx-hosted models only: a request routed to an external provider never passes through Telnyx model routing, so a region cannot be enforced for it. Omit for today's latency-based routing.
     *
     * @var value-of<Region>|null $region
     */
    #[Optional(enum: Region::class)]
    public ?string $region;

    /**
     * The service tier to use for this request. Supported values vary by model; use `GET /v2/ai/openai/models` and inspect the model's `service_tiers` field. If omitted, Telnyx-hosted models use `default`.
     */
    #[Optional('service_tier')]
    public ?string $serviceTier;

    /**
     * Set to `true` to stream Server-Sent Events, matching OpenAI's Responses streaming format.
     */
    #[Optional]
    public ?bool $stream;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param array<string,mixed>|null $input
     * @param Mode|value-of<Mode>|null $mode
     * @param Reasoning|ReasoningShape|null $reasoning
     * @param Region|value-of<Region>|null $region
     */
    public static function with(
        ?string $conversation = null,
        ?array $input = null,
        ?string $instructions = null,
        Mode|string|null $mode = null,
        ?string $model = null,
        Reasoning|array|null $reasoning = null,
        Region|string|null $region = null,
        ?string $serviceTier = null,
        ?bool $stream = null,
    ): self {
        $self = new self;

        null !== $conversation && $self['conversation'] = $conversation;
        null !== $input && $self['input'] = $input;
        null !== $instructions && $self['instructions'] = $instructions;
        null !== $mode && $self['mode'] = $mode;
        null !== $model && $self['model'] = $model;
        null !== $reasoning && $self['reasoning'] = $reasoning;
        null !== $region && $self['region'] = $region;
        null !== $serviceTier && $self['serviceTier'] = $serviceTier;
        null !== $stream && $self['stream'] = $stream;

        return $self;
    }

    /**
     * Optional Telnyx Conversation ID from `POST /ai/conversations`. When provided, Telnyx stores this turn on that conversation and uses the conversation's prior messages as context. Reuse the same ID for subsequent turns and tool-result followups. Omit it for a non-persisted, stateless response.
     */
    public function withConversation(string $conversation): self
    {
        $self = clone $this;
        $self['conversation'] = $conversation;

        return $self;
    }

    /**
     * The input items for this turn, using the OpenAI Responses API input format.
     *
     * @param array<string,mixed> $input
     */
    public function withInput(array $input): self
    {
        $self = clone $this;
        $self['input'] = $input;

        return $self;
    }

    /**
     * Optional system/developer instructions for the model. When used with a persisted `conversation`, send these on the first request that creates the thread; subsequent turns can rely on the stored history.
     */
    public function withInstructions(string $instructions): self
    {
        $self = clone $this;
        $self['instructions'] = $instructions;

        return $self;
    }

    /**
     * How strictly `region` is applied. `preferred` (the default when `region` is set) tries that region first and falls back to another when the model cannot be served there, so a request that would have succeeded still succeeds. `strict` pins the request: it is served from that region or it fails with a 422, never redirected to another region. Requires `region`.
     *
     * @param Mode|value-of<Mode> $mode
     */
    public function withMode(Mode|string $mode): self
    {
        $self = clone $this;
        $self['mode'] = $mode;

        return $self;
    }

    /**
     * Model identifier to use for the response, for example `zai-org/GLM-5.1-FP8` or another model available from the Telnyx OpenAI-compatible models endpoint.
     */
    public function withModel(string $model): self
    {
        $self = clone $this;
        $self['model'] = $model;

        return $self;
    }

    /**
     * @param Reasoning|ReasoningShape $reasoning
     */
    public function withReasoning(Reasoning|array $reasoning): self
    {
        $self = clone $this;
        $self['reasoning'] = $reasoning;

        return $self;
    }

    /**
     * Optional data-residency region the request should be served from, using the same vocabulary as your account's Data Locality setting. Behavior depends on `mode`. Supported for Telnyx-hosted models only: a request routed to an external provider never passes through Telnyx model routing, so a region cannot be enforced for it. Omit for today's latency-based routing.
     *
     * @param Region|value-of<Region> $region
     */
    public function withRegion(Region|string $region): self
    {
        $self = clone $this;
        $self['region'] = $region;

        return $self;
    }

    /**
     * The service tier to use for this request. Supported values vary by model; use `GET /v2/ai/openai/models` and inspect the model's `service_tiers` field. If omitted, Telnyx-hosted models use `default`.
     */
    public function withServiceTier(string $serviceTier): self
    {
        $self = clone $this;
        $self['serviceTier'] = $serviceTier;

        return $self;
    }

    /**
     * Set to `true` to stream Server-Sent Events, matching OpenAI's Responses streaming format.
     */
    public function withStream(bool $stream): self
    {
        $self = clone $this;
        $self['stream'] = $stream;

        return $self;
    }
}
