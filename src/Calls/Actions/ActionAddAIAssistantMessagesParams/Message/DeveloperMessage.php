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
 * @phpstan-type DeveloperMessageShape = array{
 *   content: string, role: 'developer', metadata?: mixed
 * }
 */
final class DeveloperMessage implements BaseModel
{
    /** @use SdkModel<DeveloperMessageShape> */
    use SdkModel;

    /**
     * The role of the messages author, in this case developer.
     *
     * @var 'developer' $role
     */
    #[Required]
    public string $role = 'developer';

    /**
     * The contents of the developer message.
     */
    #[Required]
    public string $content;

    /**
     * Metadata to add to the message.
     */
    #[Optional]
    public mixed $metadata;

    /**
     * `new DeveloperMessage()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DeveloperMessage::with(content: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DeveloperMessage)->withContent(...)
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
     * The contents of the developer message.
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
