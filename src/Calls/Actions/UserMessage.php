<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Calls\Actions\UserMessage\Role;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Messages sent by an end user.
 *
 * @phpstan-type UserMessageShape = array{
 *   content: string,
 *   role: Role|value-of<Role>,
 *   metadata?: array<string,mixed>|null,
 * }
 */
final class UserMessage implements BaseModel
{
    /** @use SdkModel<UserMessageShape> */
    use SdkModel;

    /**
     * The contents of the user message.
     */
    #[Required]
    public string $content;

    /**
     * The role of the messages author, in this case `user`.
     *
     * @var value-of<Role> $role
     */
    #[Required(enum: Role::class)]
    public string $role;

    /**
     * Metadata to add to the message.
     *
     * @var array<string,mixed>|null $metadata
     */
    #[Optional(map: 'mixed')]
    public ?array $metadata;

    /**
     * `new UserMessage()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * UserMessage::with(content: ..., role: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new UserMessage)->withContent(...)->withRole(...)
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
        ?array $metadata = null
    ): self {
        $self = new self;

        $self['content'] = $content;
        $self['role'] = $role;

        null !== $metadata && $self['metadata'] = $metadata;

        return $self;
    }

    /**
     * The contents of the user message.
     */
    public function withContent(string $content): self
    {
        $self = clone $this;
        $self['content'] = $content;

        return $self;
    }

    /**
     * The role of the messages author, in this case `user`.
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
