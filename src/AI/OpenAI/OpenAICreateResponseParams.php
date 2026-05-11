<?php

declare(strict_types=1);

namespace Telnyx\AI\OpenAI;

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
 * @phpstan-type OpenAICreateResponseParamsShape = array{
 *   conversation?: string|null,
 *   input?: mixed,
 *   instructions?: string|null,
 *   model?: string|null,
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
     */
    #[Optional]
    public mixed $input;

    /**
     * Optional system/developer instructions for the model. When used with a persisted `conversation`, send these on the first request that creates the thread; subsequent turns can rely on the stored history.
     */
    #[Optional]
    public ?string $instructions;

    /**
     * Model identifier to use for the response, for example `zai-org/GLM-5.1-FP8` or another model available from the Telnyx OpenAI-compatible models endpoint.
     */
    #[Optional]
    public ?string $model;

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
     */
    public static function with(
        ?string $conversation = null,
        mixed $input = null,
        ?string $instructions = null,
        ?string $model = null,
        ?bool $stream = null,
    ): self {
        $self = new self;

        null !== $conversation && $self['conversation'] = $conversation;
        null !== $input && $self['input'] = $input;
        null !== $instructions && $self['instructions'] = $instructions;
        null !== $model && $self['model'] = $model;
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
     */
    public function withInput(mixed $input): self
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
     * Model identifier to use for the response, for example `zai-org/GLM-5.1-FP8` or another model available from the Telnyx OpenAI-compatible models endpoint.
     */
    public function withModel(string $model): self
    {
        $self = clone $this;
        $self['model'] = $model;

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
