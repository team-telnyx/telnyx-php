<?php

declare(strict_types=1);

namespace Telnyx\Messages\MessagingInboundMessagePayload;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messages\MessagingInboundMessagePayload\Body\Edit;
use Telnyx\Messages\MessagingInboundMessagePayload\Body\Revoke;

/**
 * WhatsApp message body. For message edits and revocations, inspect `type` and the corresponding `edit` or `revoke` object.
 *
 * @phpstan-import-type EditShape from \Telnyx\Messages\MessagingInboundMessagePayload\Body\Edit
 * @phpstan-import-type RevokeShape from \Telnyx\Messages\MessagingInboundMessagePayload\Body\Revoke
 *
 * @phpstan-type BodyShape = array{
 *   id?: string|null,
 *   edit?: null|Edit|EditShape,
 *   foreignID?: string|null,
 *   from?: string|null,
 *   revoke?: null|Revoke|RevokeShape,
 *   timestamp?: string|null,
 *   type?: string|null,
 * }
 */
final class Body implements BaseModel
{
    /** @use SdkModel<BodyShape> */
    use SdkModel;

    /**
     * Telnyx identifier for this webhook message.
     */
    #[Optional]
    public ?string $id;

    /**
     * Details for an edited WhatsApp message.
     */
    #[Optional]
    public ?Edit $edit;

    /**
     * Meta WhatsApp message identifier for this webhook event.
     */
    #[Optional('foreign_id')]
    public ?string $foreignID;

    /**
     * WhatsApp sender in E.164 format.
     */
    #[Optional]
    public ?string $from;

    /**
     * Details for a revoked WhatsApp message.
     */
    #[Optional]
    public ?Revoke $revoke;

    /**
     * Unix timestamp supplied by Meta.
     */
    #[Optional]
    public ?string $timestamp;

    /**
     * WhatsApp message body type. Edit and revoke events use `edit` and `revoke`, respectively.
     */
    #[Optional]
    public ?string $type;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Edit|EditShape|null $edit
     * @param Revoke|RevokeShape|null $revoke
     */
    public static function with(
        ?string $id = null,
        Edit|array|null $edit = null,
        ?string $foreignID = null,
        ?string $from = null,
        Revoke|array|null $revoke = null,
        ?string $timestamp = null,
        ?string $type = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $edit && $self['edit'] = $edit;
        null !== $foreignID && $self['foreignID'] = $foreignID;
        null !== $from && $self['from'] = $from;
        null !== $revoke && $self['revoke'] = $revoke;
        null !== $timestamp && $self['timestamp'] = $timestamp;
        null !== $type && $self['type'] = $type;

        return $self;
    }

    /**
     * Telnyx identifier for this webhook message.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Details for an edited WhatsApp message.
     *
     * @param Edit|EditShape $edit
     */
    public function withEdit(Edit|array $edit): self
    {
        $self = clone $this;
        $self['edit'] = $edit;

        return $self;
    }

    /**
     * Meta WhatsApp message identifier for this webhook event.
     */
    public function withForeignID(string $foreignID): self
    {
        $self = clone $this;
        $self['foreignID'] = $foreignID;

        return $self;
    }

    /**
     * WhatsApp sender in E.164 format.
     */
    public function withFrom(string $from): self
    {
        $self = clone $this;
        $self['from'] = $from;

        return $self;
    }

    /**
     * Details for a revoked WhatsApp message.
     *
     * @param Revoke|RevokeShape $revoke
     */
    public function withRevoke(Revoke|array $revoke): self
    {
        $self = clone $this;
        $self['revoke'] = $revoke;

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
     * WhatsApp message body type. Edit and revoke events use `edit` and `revoke`, respectively.
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
