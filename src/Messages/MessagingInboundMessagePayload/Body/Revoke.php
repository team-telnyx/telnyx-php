<?php

declare(strict_types=1);

namespace Telnyx\Messages\MessagingInboundMessagePayload\Body;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Details for a revoked WhatsApp message.
 *
 * @phpstan-type RevokeShape = array{originalMessageID: string}
 */
final class Revoke implements BaseModel
{
    /** @use SdkModel<RevokeShape> */
    use SdkModel;

    /**
     * Telnyx message ID when a mapping exists, otherwise the original Meta WhatsApp message ID. Treat this value as opaque.
     */
    #[Required('original_message_id')]
    public string $originalMessageID;

    /**
     * `new Revoke()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Revoke::with(originalMessageID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Revoke)->withOriginalMessageID(...)
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
    public static function with(string $originalMessageID): self
    {
        $self = new self;

        $self['originalMessageID'] = $originalMessageID;

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
