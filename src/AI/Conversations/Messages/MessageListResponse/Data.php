<?php

declare(strict_types=1);

namespace Telnyx\AI\Conversations\Messages\MessageListResponse;

use Telnyx\AI\Conversations\Messages\MessageListResponse\Data\Role;
use Telnyx\AI\Conversations\Messages\MessageListResponse\Data\ToolCall;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type data_alias = array{
 *   role: value-of<Role>,
 *   text: string,
 *   createdAt?: \DateTimeInterface,
 *   sentAt?: \DateTimeInterface,
 *   toolCalls?: list<ToolCall>,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<data_alias> */
    use SdkModel;

    /**
     * The role of the message sender.
     *
     * @var value-of<Role> $role
     */
    #[Api(enum: Role::class)]
    public string $role;

    /**
     * The message content. Can be null for tool calls.
     */
    #[Api]
    public string $text;

    /**
     * The datetime the message was created on the conversation. This does not necesarily correspond to the time the message was sent. The best field to use to determine the time the end user experienced the message is `sent_at`.
     */
    #[Api('created_at', optional: true)]
    public ?\DateTimeInterface $createdAt;

    /**
     * The datetime the message was sent to the end user.
     */
    #[Api('sent_at', optional: true)]
    public ?\DateTimeInterface $sentAt;

    /**
     * Optional tool calls made by the assistant.
     *
     * @var list<ToolCall>|null $toolCalls
     */
    #[Api('tool_calls', list: ToolCall::class, optional: true)]
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
     * @param list<ToolCall> $toolCalls
     */
    public static function with(
        Role|string $role,
        string $text,
        ?\DateTimeInterface $createdAt = null,
        ?\DateTimeInterface $sentAt = null,
        ?array $toolCalls = null,
    ): self {
        $obj = new self;

        $obj['role'] = $role;
        $obj->text = $text;

        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $sentAt && $obj->sentAt = $sentAt;
        null !== $toolCalls && $obj->toolCalls = $toolCalls;

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
        $obj->text = $text;

        return $obj;
    }

    /**
     * The datetime the message was created on the conversation. This does not necesarily correspond to the time the message was sent. The best field to use to determine the time the end user experienced the message is `sent_at`.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * The datetime the message was sent to the end user.
     */
    public function withSentAt(\DateTimeInterface $sentAt): self
    {
        $obj = clone $this;
        $obj->sentAt = $sentAt;

        return $obj;
    }

    /**
     * Optional tool calls made by the assistant.
     *
     * @param list<ToolCall> $toolCalls
     */
    public function withToolCalls(array $toolCalls): self
    {
        $obj = clone $this;
        $obj->toolCalls = $toolCalls;

        return $obj;
    }
}
