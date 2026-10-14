<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallConversationEnded\Payload;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\CallConversationEnded\Payload\Message\Role;
use Telnyx\Webhooks\CallConversationEnded\Payload\Message\ToolCall;

/**
 * @phpstan-import-type ToolCallShape from \Telnyx\Webhooks\CallConversationEnded\Payload\Message\ToolCall
 *
 * @phpstan-type MessageShape = array{
 *   content?: string|null,
 *   role?: null|Role|value-of<Role>,
 *   timestamp?: \DateTimeInterface|null,
 *   toolCallID?: string|null,
 *   toolCalls?: list<ToolCall|ToolCallShape>|null,
 * }
 */
final class Message implements BaseModel
{
    /** @use SdkModel<MessageShape> */
    use SdkModel;

    /**
     * The text of the message. For a tool result, the tool output. May be absent on an assistant message that only contains `tool_calls`.
     */
    #[Optional]
    public ?string $content;

    /**
     * The author of the message. `tool`, `system`, and `developer` only appear when `conversation_ended_full_history` is enabled. `system` and `developer` entries are informational (for example idle check-ins, voicemail prompts, participant-left notices, or messages added through the API); their wording is not a stable contract.
     *
     * @var value-of<Role>|null $role
     */
    #[Optional(enum: Role::class)]
    public ?string $role;

    /**
     * ISO 8601 datetime of when the message was added to the conversation.
     */
    #[Optional]
    public ?\DateTimeInterface $timestamp;

    /**
     * The `id` of the tool call this message answers. Only present on `tool` messages when `conversation_ended_full_history` is enabled.
     */
    #[Optional('tool_call_id')]
    public ?string $toolCallID;

    /**
     * Tools the assistant called in this turn. Only present on `assistant` messages when `conversation_ended_full_history` is enabled.
     *
     * @var list<ToolCall>|null $toolCalls
     */
    #[Optional('tool_calls', list: ToolCall::class)]
    public ?array $toolCalls;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Role|value-of<Role>|null $role
     * @param list<ToolCall|ToolCallShape>|null $toolCalls
     */
    public static function with(
        ?string $content = null,
        Role|string|null $role = null,
        ?\DateTimeInterface $timestamp = null,
        ?string $toolCallID = null,
        ?array $toolCalls = null,
    ): self {
        $self = new self;

        null !== $content && $self['content'] = $content;
        null !== $role && $self['role'] = $role;
        null !== $timestamp && $self['timestamp'] = $timestamp;
        null !== $toolCallID && $self['toolCallID'] = $toolCallID;
        null !== $toolCalls && $self['toolCalls'] = $toolCalls;

        return $self;
    }

    /**
     * The text of the message. For a tool result, the tool output. May be absent on an assistant message that only contains `tool_calls`.
     */
    public function withContent(string $content): self
    {
        $self = clone $this;
        $self['content'] = $content;

        return $self;
    }

    /**
     * The author of the message. `tool`, `system`, and `developer` only appear when `conversation_ended_full_history` is enabled. `system` and `developer` entries are informational (for example idle check-ins, voicemail prompts, participant-left notices, or messages added through the API); their wording is not a stable contract.
     *
     * @param Role|value-of<Role> $role
     */
    public function withRole(Role|string $role): self
    {
        $self = clone $this;
        $self['role'] = $role;

        return $self;
    }

    /**
     * ISO 8601 datetime of when the message was added to the conversation.
     */
    public function withTimestamp(\DateTimeInterface $timestamp): self
    {
        $self = clone $this;
        $self['timestamp'] = $timestamp;

        return $self;
    }

    /**
     * The `id` of the tool call this message answers. Only present on `tool` messages when `conversation_ended_full_history` is enabled.
     */
    public function withToolCallID(string $toolCallID): self
    {
        $self = clone $this;
        $self['toolCallID'] = $toolCallID;

        return $self;
    }

    /**
     * Tools the assistant called in this turn. Only present on `assistant` messages when `conversation_ended_full_history` is enabled.
     *
     * @param list<ToolCall|ToolCallShape> $toolCalls
     */
    public function withToolCalls(array $toolCalls): self
    {
        $self = clone $this;
        $self['toolCalls'] = $toolCalls;

        return $self;
    }
}
