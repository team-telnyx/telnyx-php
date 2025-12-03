<?php

declare(strict_types=1);

namespace Telnyx\AI\Conversations;

use Telnyx\AI\Conversations\ConversationAddMessageParams\Metadata;
use Telnyx\AI\Conversations\ConversationAddMessageParams\ToolChoice;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\MapOf;

/**
 * Add a new message to the conversation. Used to insert a new messages to a conversation manually ( without using chat endpoint ).
 *
 * @see Telnyx\Services\AI\ConversationsService::addMessage()
 *
 * @phpstan-type ConversationAddMessageParamsShape = array{
 *   role: string,
 *   content?: string,
 *   metadata?: array<string,string|int|bool|list<string|int|bool>>,
 *   name?: string,
 *   sent_at?: \DateTimeInterface,
 *   tool_call_id?: string,
 *   tool_calls?: list<array<string,mixed>>,
 *   tool_choice?: string|array<string,mixed>,
 * }
 */
final class ConversationAddMessageParams implements BaseModel
{
    /** @use SdkModel<ConversationAddMessageParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $role;

    #[Api(optional: true)]
    public ?string $content;

    /** @var array<string,string|int|bool|list<string|int|bool>>|null $metadata */
    #[Api(map: Metadata::class, optional: true)]
    public ?array $metadata;

    #[Api(optional: true)]
    public ?string $name;

    #[Api(optional: true)]
    public ?\DateTimeInterface $sent_at;

    #[Api(optional: true)]
    public ?string $tool_call_id;

    /** @var list<array<string,mixed>>|null $tool_calls */
    #[Api(list: new MapOf('mixed'), optional: true)]
    public ?array $tool_calls;

    /** @var string|array<string,mixed>|null $tool_choice */
    #[Api(union: ToolChoice::class, optional: true)]
    public string|array|null $tool_choice;

    /**
     * `new ConversationAddMessageParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ConversationAddMessageParams::with(role: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ConversationAddMessageParams)->withRole(...)
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
     * @param array<string,string|int|bool|list<string|int|bool>> $metadata
     * @param list<array<string,mixed>> $tool_calls
     * @param string|array<string,mixed> $tool_choice
     */
    public static function with(
        string $role,
        ?string $content = null,
        ?array $metadata = null,
        ?string $name = null,
        ?\DateTimeInterface $sent_at = null,
        ?string $tool_call_id = null,
        ?array $tool_calls = null,
        string|array|null $tool_choice = null,
    ): self {
        $obj = new self;

        $obj->role = $role;

        null !== $content && $obj->content = $content;
        null !== $metadata && $obj->metadata = $metadata;
        null !== $name && $obj->name = $name;
        null !== $sent_at && $obj->sent_at = $sent_at;
        null !== $tool_call_id && $obj->tool_call_id = $tool_call_id;
        null !== $tool_calls && $obj->tool_calls = $tool_calls;
        null !== $tool_choice && $obj->tool_choice = $tool_choice;

        return $obj;
    }

    public function withRole(string $role): self
    {
        $obj = clone $this;
        $obj->role = $role;

        return $obj;
    }

    public function withContent(string $content): self
    {
        $obj = clone $this;
        $obj->content = $content;

        return $obj;
    }

    /**
     * @param array<string,string|int|bool|list<string|int|bool>> $metadata
     */
    public function withMetadata(array $metadata): self
    {
        $obj = clone $this;
        $obj->metadata = $metadata;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    public function withSentAt(\DateTimeInterface $sentAt): self
    {
        $obj = clone $this;
        $obj->sent_at = $sentAt;

        return $obj;
    }

    public function withToolCallID(string $toolCallID): self
    {
        $obj = clone $this;
        $obj->tool_call_id = $toolCallID;

        return $obj;
    }

    /**
     * @param list<array<string,mixed>> $toolCalls
     */
    public function withToolCalls(array $toolCalls): self
    {
        $obj = clone $this;
        $obj->tool_calls = $toolCalls;

        return $obj;
    }

    /**
     * @param string|array<string,mixed> $toolChoice
     */
    public function withToolChoice(string|array $toolChoice): self
    {
        $obj = clone $this;
        $obj->tool_choice = $toolChoice;

        return $obj;
    }
}
