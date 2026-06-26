<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionAddAIAssistantMessagesParams\Message;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Developer-provided instructions that the model should follow, regardless of messages sent by the user.
 *
 * @phpstan-type SystemMessageShape = array{
 *   content: string, role: 'system', metadata?: array<string,mixed>|null
 * }
 */
final class SystemMessage implements BaseModel
{
    /** @use SdkModel<SystemMessageShape> */
    use SdkModel;

    /**
     * The role of the messages author, in this case `system`.
     *
     * @var 'system' $role
     */
    #[Required]
    public string $role = 'system';

    /**
     * The contents of the system message.
     */
    #[Required]
    public string $content;

    /**
     * Metadata to add to the message.
     *
     * @var array<string,mixed>|null $metadata
     */
    #[Optional(map: 'mixed')]
    public ?array $metadata;

    /**
     * `new SystemMessage()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SystemMessage::with(content: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SystemMessage)->withContent(...)
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
    public static function with(string $content, ?array $metadata = null): self
    {
        $self = new self;

        $self['content'] = $content;

        null !== $metadata && $self['metadata'] = $metadata;

        return $self;
    }

    /**
     * The contents of the system message.
     */
    public function withContent(string $content): self
    {
        $self = clone $this;
        $self['content'] = $content;

        return $self;
    }

    /**
     * The role of the messages author, in this case `system`.
     *
     * @param 'system' $role
     */
    public function withRole(string $role): self
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
