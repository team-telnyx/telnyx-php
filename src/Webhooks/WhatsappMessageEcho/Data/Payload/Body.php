<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\WhatsappMessageEcho\Data\Payload;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Mirrored WhatsApp message content. The content property matches the value of `type`.
 *
 * @phpstan-type BodyShape = array{
 *   id: string,
 *   foreignID: string,
 *   timestamp: string,
 *   type: string,
 *   from?: string|null,
 *   fromUserID?: string|null,
 * }
 */
final class Body implements BaseModel
{
    /** @use SdkModel<BodyShape> */
    use SdkModel;

    /**
     * Telnyx identifier for the mirrored message.
     */
    #[Required]
    public string $id;

    /**
     * Meta WhatsApp message identifier, also known as a wamid.
     */
    #[Required('foreign_id')]
    public string $foreignID;

    /**
     * Unix timestamp supplied by Meta.
     */
    #[Required]
    public string $timestamp;

    /**
     * WhatsApp message content type.
     */
    #[Required]
    public string $type;

    /**
     * WhatsApp user who received the message.
     */
    #[Optional]
    public ?string $from;

    /**
     * Opaque recipient identifier when Meta does not supply a phone number.
     */
    #[Optional('from_user_id')]
    public ?string $fromUserID;

    /**
     * `new Body()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Body::with(id: ..., foreignID: ..., timestamp: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Body)->withID(...)->withForeignID(...)->withTimestamp(...)->withType(...)
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
    public static function with(
        string $id,
        string $foreignID,
        string $timestamp,
        string $type,
        ?string $from = null,
        ?string $fromUserID = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['foreignID'] = $foreignID;
        $self['timestamp'] = $timestamp;
        $self['type'] = $type;

        null !== $from && $self['from'] = $from;
        null !== $fromUserID && $self['fromUserID'] = $fromUserID;

        return $self;
    }

    /**
     * Telnyx identifier for the mirrored message.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Meta WhatsApp message identifier, also known as a wamid.
     */
    public function withForeignID(string $foreignID): self
    {
        $self = clone $this;
        $self['foreignID'] = $foreignID;

        return $self;
    }

    /**
     * Unix timestamp supplied by Meta.
     */
    public function withTimestamp(string $timestamp): self
    {
        $self = clone $this;
        $self['timestamp'] = $timestamp;

        return $self;
    }

    /**
     * WhatsApp message content type.
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * WhatsApp user who received the message.
     */
    public function withFrom(string $from): self
    {
        $self = clone $this;
        $self['from'] = $from;

        return $self;
    }

    /**
     * Opaque recipient identifier when Meta does not supply a phone number.
     */
    public function withFromUserID(string $fromUserID): self
    {
        $self = clone $this;
        $self['fromUserID'] = $fromUserID;

        return $self;
    }
}
