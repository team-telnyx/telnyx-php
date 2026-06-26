<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Calls\Actions\ToolMessage\Role;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ToolMessageShape = array{
 *   content: string,
 *   role: Role|value-of<Role>,
 *   toolCallID: string,
 *   metadata?: array<string,mixed>|null,
 * }
 */
final class ToolMessage implements BaseModel
{
    /** @use SdkModel<ToolMessageShape> */
    use SdkModel;

    /**
     * The contents of the tool message.
     */
    #[Required]
    public string $content;

    /**
     * The role of the messages author, in this case `tool`.
     *
     * @var value-of<Role> $role
     */
    #[Required(enum: Role::class)]
    public string $role;

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
     * ToolMessage::with(content: ..., role: ..., toolCallID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ToolMessage)->withContent(...)->withRole(...)->withToolCallID(...)
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
     * @param array<string,mixed>|null $metadata
     */
    public static function with(
        string $content,
        Role|string $role,
        string $toolCallID,
        ?array $metadata = null,
    ): self {
        $self = new self;

        $self['content'] = $content;
        $self['role'] = $role;
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
     * @param Role|value-of<Role> $role
     */
    public function withRole(Role|string $role): self
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
