<?php

declare(strict_types=1);

namespace Telnyx\AI\Conversations\Messages\MessageListResponse;

use Telnyx\AI\Conversations\Messages\MessageListResponse\Data\Role;
use Telnyx\AI\Conversations\Messages\MessageListResponse\Data\ToolCall;
use Telnyx\AI\Conversations\Messages\MessageListResponse\Data\ToolCall\Function1;
use Telnyx\AI\Conversations\Messages\MessageListResponse\Data\ToolCall\Type;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   role: value-of<Role>,
 *   text: string,
 *   createdAt?: \DateTimeInterface|null,
 *   sentAt?: \DateTimeInterface|null,
 *   toolCalls?: list<ToolCall>|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * The role of the message sender.
     *
     * @var value-of<Role> $role
     */
    #[Required(enum: Role::class)]
    public string $role;

    /**
     * The message content. Can be null for tool calls.
     */
    #[Required]
    public string $text;

    /**
     * The datetime the message was created on the conversation. This does not necesarily correspond to the time the message was sent. The best field to use to determine the time the end user experienced the message is `sent_at`.
     */
    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * The datetime the message was sent to the end user.
     */
    #[Optional('sent_at')]
    public ?\DateTimeInterface $sentAt;

    /**
     * Optional tool calls made by the assistant.
     *
     * @var list<ToolCall>|null $toolCalls
     */
    #[Optional('tool_calls', list: ToolCall::class)]
    public ?array $toolCalls;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(role: ..., text: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)->withRole(...)->withText(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Role|value-of<Role> $role
     * @param list<ToolCall|array{
     *   id: string, function: Function1, type: value-of<Type>
     * }> $toolCalls
     */
    public static function with(
        Role|string $role,
        string $text,
        ?\DateTimeInterface $createdAt = null,
        ?\DateTimeInterface $sentAt = null,
        ?array $toolCalls = null,
    ): self {
        $self = new self;

        $self['role'] = $role;
        $self['text'] = $text;

        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $sentAt && $self['sentAt'] = $sentAt;
        null !== $toolCalls && $self['toolCalls'] = $toolCalls;

        return $self;
    }

    /**
     * The role of the message sender.
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
     * The message content. Can be null for tool calls.
     */
    public function withText(string $text): self
    {
        $self = clone $this;
        $self['text'] = $text;

        return $self;
    }

    /**
     * The datetime the message was created on the conversation. This does not necesarily correspond to the time the message was sent. The best field to use to determine the time the end user experienced the message is `sent_at`.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * The datetime the message was sent to the end user.
     */
    public function withSentAt(\DateTimeInterface $sentAt): self
    {
        $self = clone $this;
        $self['sentAt'] = $sentAt;

        return $self;
    }

    /**
     * Optional tool calls made by the assistant.
     *
     * @param list<ToolCall|array{
     *   id: string, function: Function1, type: value-of<Type>
     * }> $toolCalls
     */
    public function withToolCalls(array $toolCalls): self
    {
        $self = clone $this;
        $self['toolCalls'] = $toolCalls;

        return $self;
    }
}
