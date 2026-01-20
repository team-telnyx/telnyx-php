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
 *   content: string, role: 'system', metadata?: mixed
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
     */
    #[Optional]
    public mixed $metadata;

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
     */
    public static function with(string $content, mixed $metadata = null): self
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
     * Metadata to add to the message.
     */
    public function withMetadata(mixed $metadata): self
    {
        $self = clone $this;
        $self['metadata'] = $metadata;

        return $self;
    }
}
