<?php

declare(strict_types=1);

namespace Telnyx\Messages\MessagingInboundMessagePayload\Body;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Details for an edited WhatsApp message.
 *
 * @phpstan-type EditShape = array{
 *   message: array<string,mixed>, originalMessageID: string
 * }
 */
final class Edit implements BaseModel
{
    /** @use SdkModel<EditShape> */
    use SdkModel;

    /**
     * Replacement WhatsApp message content. Its shape depends on the message type.
     *
     * @var array<string,mixed> $message
     */
    #[Required(map: 'mixed')]
    public array $message;

    /**
     * Telnyx message ID when a mapping exists, otherwise the original Meta WhatsApp message ID. Treat this value as opaque.
     */
    #[Required('original_message_id')]
    public string $originalMessageID;

    /**
     * `new Edit()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Edit::with(message: ..., originalMessageID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Edit)->withMessage(...)->withOriginalMessageID(...)
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
     * @param array<string,mixed> $message
     */
    public static function with(array $message, string $originalMessageID): self
    {
        $self = new self;

        $self['message'] = $message;
        $self['originalMessageID'] = $originalMessageID;

        return $self;
    }

    /**
     * Replacement WhatsApp message content. Its shape depends on the message type.
     *
     * @param array<string,mixed> $message
     */
    public function withMessage(array $message): self
    {
        $self = clone $this;
        $self['message'] = $message;

        return $self;
    }

    /**
     * Telnyx message ID when a mapping exists, otherwise the original Meta WhatsApp message ID. Treat this value as opaque.
     */
    public function withOriginalMessageID(string $originalMessageID): self
    {
        $self = clone $this;
        $self['originalMessageID'] = $originalMessageID;

        return $self;
    }
}
