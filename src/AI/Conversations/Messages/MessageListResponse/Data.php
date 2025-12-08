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
 *   created_at?: \DateTimeInterface|null,
 *   sent_at?: \DateTimeInterface|null,
 *   tool_calls?: list<ToolCall>|null,
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
    #[Optional]
    public ?\DateTimeInterface $created_at;

    /**
     * The datetime the message was sent to the end user.
     */
    #[Optional]
    public ?\DateTimeInterface $sent_at;

    /**
     * Optional tool calls made by the assistant.
     *
     * @var list<ToolCall>|null $tool_calls
     */
    #[Optional(list: ToolCall::class)]
    public ?array $tool_calls;

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
     * }> $tool_calls
     */
    public static function with(
        Role|string $role,
        string $text,
        ?\DateTimeInterface $created_at = null,
        ?\DateTimeInterface $sent_at = null,
        ?array $tool_calls = null,
    ): self {
        $obj = new self;

        $obj['role'] = $role;
        $obj['text'] = $text;

        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $sent_at && $obj['sent_at'] = $sent_at;
        null !== $tool_calls && $obj['tool_calls'] = $tool_calls;

        return $obj;
    }

    /**
     * The role of the message sender.
     *
     * @param Role|value-of<Role> $role
     */
    public function withRole(Role|string $role): self
    {
        $obj = clone $this;
        $obj['role'] = $role;

        return $obj;
    }

    /**
     * The message content. Can be null for tool calls.
     */
    public function withText(string $text): self
    {
        $obj = clone $this;
        $obj['text'] = $text;

        return $obj;
    }

    /**
     * The datetime the message was created on the conversation. This does not necesarily correspond to the time the message was sent. The best field to use to determine the time the end user experienced the message is `sent_at`.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    /**
     * The datetime the message was sent to the end user.
     */
    public function withSentAt(\DateTimeInterface $sentAt): self
    {
        $obj = clone $this;
        $obj['sent_at'] = $sentAt;

        return $obj;
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
        $obj = clone $this;
        $obj['tool_calls'] = $toolCalls;

        return $obj;
    }
}
