<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionAddAIAssistantMessagesParams\Message;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ToolMessageShape = array{
 *   content: string,
 *   role: 'tool',
 *   toolCallID: string,
 *   metadata?: array<string,mixed>|null,
 * }
 */
final class ToolMessage implements BaseModel
{
    /** @use SdkModel<ToolMessageShape> */
    use SdkModel;

    /**
     * The role of the messages author, in this case `tool`.
     *
     * @var 'tool' $role
     */
    #[Required]
    public string $role = 'tool';

    /**
     * The contents of the tool message.
     */
    #[Required]
    public string $content;

    /**
     * Tool call that this message is responding to.
     */
    #[Required('tool_call_id')]
    public string $toolCallID;

    /**
     * Metadata to add to the message.
     *
     * @var array<string,mixed>|null $metadata
     */
    #[Optional(map: 'mixed')]
    public ?array $metadata;

    /**
     * `new ToolMessage()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ToolMessage::with(content: ..., toolCallID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ToolMessage)->withContent(...)->withToolCallID(...)
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
     * @param array<string,mixed>|null $metadata
     */
    public static function with(
        string $content,
        string $toolCallID,
        ?array $metadata = null
    ): self {
        $self = new self;

        $self['content'] = $content;
        $self['toolCallID'] = $toolCallID;

        null !== $metadata && $self['metadata'] = $metadata;

        return $self;
    }

    /**
     * The contents of the tool message.
     */
    public function withContent(string $content): self
    {
        $self = clone $this;
        $self['content'] = $content;

        return $self;
    }

    /**
     * The role of the messages author, in this case `tool`.
     *
     * @param 'tool' $role
     */
    public function withRole(string $role): self
    {
        $self = clone $this;
        $self['role'] = $role;

        return $self;
    }

    /**
     * Tool call that this message is responding to.
     */
    public function withToolCallID(string $toolCallID): self
    {
        $self = clone $this;
        $self['toolCallID'] = $toolCallID;

        return $self;
    }

    /**
     * Metadata to add to the message.
     *
     * @param array<string,mixed> $metadata
     */
    public function withMetadata(array $metadata): self
    {
        $self = clone $this;
        $self['metadata'] = $metadata;

        return $self;
    }
}
