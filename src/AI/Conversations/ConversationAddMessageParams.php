<?php

declare(strict_types=1);

namespace Telnyx\AI\Conversations;

use Telnyx\AI\Conversations\ConversationAddMessageParams\Metadata;
use Telnyx\AI\Conversations\ConversationAddMessageParams\ToolChoice;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\MapOf;

/**
 * Add a new message to the conversation. Used to insert a new messages to a conversation manually ( without using chat endpoint ).
 *
 * @see Telnyx\Services\AI\ConversationsService::addMessage()
 *
 * @phpstan-import-type MetadataVariants from \Telnyx\AI\Conversations\ConversationAddMessageParams\Metadata
 * @phpstan-import-type ToolChoiceVariants from \Telnyx\AI\Conversations\ConversationAddMessageParams\ToolChoice
 * @phpstan-import-type MetadataShape from \Telnyx\AI\Conversations\ConversationAddMessageParams\Metadata
 * @phpstan-import-type ToolChoiceShape from \Telnyx\AI\Conversations\ConversationAddMessageParams\ToolChoice
 *
 * @phpstan-type ConversationAddMessageParamsShape = array{
 *   role: string,
 *   content?: string|null,
 *   metadata?: array<string,MetadataShape>|null,
 *   name?: string|null,
 *   sentAt?: \DateTimeInterface|null,
 *   toolCallID?: string|null,
 *   toolCalls?: list<array<string,mixed>>|null,
 *   toolChoice?: ToolChoiceShape|null,
 * }
 */
final class ConversationAddMessageParams implements BaseModel
{
    /** @use SdkModel<ConversationAddMessageParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $role;

    #[Optional]
    public ?string $content;

    /** @var array<string,MetadataVariants>|null $metadata */
    #[Optional(map: Metadata::class)]
    public ?array $metadata;

    #[Optional]
    public ?string $name;

    #[Optional('sent_at')]
    public ?\DateTimeInterface $sentAt;

    #[Optional('tool_call_id')]
    public ?string $toolCallID;

    /** @var list<array<string,mixed>>|null $toolCalls */
    #[Optional('tool_calls', list: new MapOf('mixed'))]
    public ?array $toolCalls;

    /** @var ToolChoiceVariants|null $toolChoice */
    #[Optional('tool_choice', union: ToolChoice::class)]
    public string|array|null $toolChoice;

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
     * @param array<string,MetadataShape>|null $metadata
     * @param list<array<string,mixed>>|null $toolCalls
     * @param ToolChoiceShape|null $toolChoice
     */
    public static function with(
        string $role,
        ?string $content = null,
        ?array $metadata = null,
        ?string $name = null,
        ?\DateTimeInterface $sentAt = null,
        ?string $toolCallID = null,
        ?array $toolCalls = null,
        string|array|null $toolChoice = null,
    ): self {
        $self = new self;

        $self['role'] = $role;

        null !== $content && $self['content'] = $content;
        null !== $metadata && $self['metadata'] = $metadata;
        null !== $name && $self['name'] = $name;
        null !== $sentAt && $self['sentAt'] = $sentAt;
        null !== $toolCallID && $self['toolCallID'] = $toolCallID;
        null !== $toolCalls && $self['toolCalls'] = $toolCalls;
        null !== $toolChoice && $self['toolChoice'] = $toolChoice;

        return $self;
    }

    public function withRole(string $role): self
    {
        $self = clone $this;
        $self['role'] = $role;

        return $self;
    }

    public function withContent(string $content): self
    {
        $self = clone $this;
        $self['content'] = $content;

        return $self;
    }

    /**
     * @param array<string,MetadataShape> $metadata
     */
    public function withMetadata(array $metadata): self
    {
        $self = clone $this;
        $self['metadata'] = $metadata;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withSentAt(\DateTimeInterface $sentAt): self
    {
        $self = clone $this;
        $self['sentAt'] = $sentAt;

        return $self;
    }

    public function withToolCallID(string $toolCallID): self
    {
        $self = clone $this;
        $self['toolCallID'] = $toolCallID;

        return $self;
    }

    /**
     * @param list<array<string,mixed>> $toolCalls
     */
    public function withToolCalls(array $toolCalls): self
    {
        $self = clone $this;
        $self['toolCalls'] = $toolCalls;

        return $self;
    }

    /**
     * @param ToolChoiceShape $toolChoice
     */
    public function withToolChoice(string|array $toolChoice): self
    {
        $self = clone $this;
        $self['toolChoice'] = $toolChoice;

        return $self;
    }
}
