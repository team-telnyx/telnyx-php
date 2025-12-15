<?php

declare(strict_types=1);

namespace Telnyx\Messsages\MesssageWhatsappResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messsages\MesssageWhatsappResponse\Data\Body;
use Telnyx\Messsages\MesssageWhatsappResponse\Data\Body\Contact;
use Telnyx\Messsages\MesssageWhatsappResponse\Data\Body\Interactive;
use Telnyx\Messsages\MesssageWhatsappResponse\Data\Body\Location;
use Telnyx\Messsages\MesssageWhatsappResponse\Data\Body\Reaction;
use Telnyx\Messsages\MesssageWhatsappResponse\Data\Body\Type;
use Telnyx\Messsages\MesssageWhatsappResponse\Data\From;
use Telnyx\Messsages\MesssageWhatsappResponse\Data\From\LineType;
use Telnyx\Messsages\MesssageWhatsappResponse\Data\From\Status;
use Telnyx\Messsages\MesssageWhatsappResponse\Data\To;
use Telnyx\Messsages\WhatsappMedia;

/**
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   body?: Body|null,
 *   direction?: string|null,
 *   encoding?: string|null,
 *   from?: From|null,
 *   messagingProfileID?: string|null,
 *   organizationID?: string|null,
 *   receivedAt?: \DateTimeInterface|null,
 *   recordType?: string|null,
 *   to?: list<To>|null,
 *   type?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * message ID.
     */
    #[Optional]
    public ?string $id;

    #[Optional]
    public ?Body $body;

    #[Optional]
    public ?string $direction;

    #[Optional]
    public ?string $encoding;

    #[Optional]
    public ?From $from;

    #[Optional('messaging_profile_id')]
    public ?string $messagingProfileID;

    #[Optional('organization_id')]
    public ?string $organizationID;

    #[Optional('received_at')]
    public ?\DateTimeInterface $receivedAt;

    #[Optional('record_type')]
    public ?string $recordType;

    /** @var list<To>|null $to */
    #[Optional(list: To::class)]
    public ?array $to;

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
     * @param Body|array{
     *   audio?: WhatsappMedia|null,
     *   bizOpaqueCallbackData?: string|null,
     *   contacts?: list<Contact>|null,
     *   document?: WhatsappMedia|null,
     *   image?: WhatsappMedia|null,
     *   interactive?: Interactive|null,
     *   location?: Location|null,
     *   reaction?: Reaction|null,
     *   sticker?: WhatsappMedia|null,
     *   type?: value-of<Type>|null,
     *   video?: WhatsappMedia|null,
     * } $body
     * @param From|array{
     *   carrier?: string|null,
     *   lineType?: value-of<LineType>|null,
     *   phoneNumber?: string|null,
     *   status?: value-of<Status>|null,
     * } $from
     * @param list<To|array{
     *   carrier?: string|null,
     *   lineType?: string|null,
     *   phoneNumber?: string|null,
     *   status?: string|null,
     * }> $to
     */
    public static function with(
        ?string $id = null,
        Body|array|null $body = null,
        ?string $direction = null,
        ?string $encoding = null,
        From|array|null $from = null,
        ?string $messagingProfileID = null,
        ?string $organizationID = null,
        ?\DateTimeInterface $receivedAt = null,
        ?string $recordType = null,
        ?array $to = null,
        ?string $type = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $body && $self['body'] = $body;
        null !== $direction && $self['direction'] = $direction;
        null !== $encoding && $self['encoding'] = $encoding;
        null !== $from && $self['from'] = $from;
        null !== $messagingProfileID && $self['messagingProfileID'] = $messagingProfileID;
        null !== $organizationID && $self['organizationID'] = $organizationID;
        null !== $receivedAt && $self['receivedAt'] = $receivedAt;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $to && $self['to'] = $to;
        null !== $type && $self['type'] = $type;

        return $self;
    }

    /**
     * message ID.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * @param Body|array{
     *   audio?: WhatsappMedia|null,
     *   bizOpaqueCallbackData?: string|null,
     *   contacts?: list<Contact>|null,
     *   document?: WhatsappMedia|null,
     *   image?: WhatsappMedia|null,
     *   interactive?: Interactive|null,
     *   location?: Location|null,
     *   reaction?: Reaction|null,
     *   sticker?: WhatsappMedia|null,
     *   type?: value-of<Type>|null,
     *   video?: WhatsappMedia|null,
     * } $body
     */
    public function withBody(Body|array $body): self
    {
        $self = clone $this;
        $self['body'] = $body;

        return $self;
    }

    public function withDirection(string $direction): self
    {
        $self = clone $this;
        $self['direction'] = $direction;

        return $self;
    }

    public function withEncoding(string $encoding): self
    {
        $self = clone $this;
        $self['encoding'] = $encoding;

        return $self;
    }

    /**
     * @param From|array{
     *   carrier?: string|null,
     *   lineType?: value-of<LineType>|null,
     *   phoneNumber?: string|null,
     *   status?: value-of<Status>|null,
     * } $from
     */
    public function withFrom(From|array $from): self
    {
        $self = clone $this;
        $self['from'] = $from;

        return $self;
    }

    public function withMessagingProfileID(string $messagingProfileID): self
    {
        $self = clone $this;
        $self['messagingProfileID'] = $messagingProfileID;

        return $self;
    }

    public function withOrganizationID(string $organizationID): self
    {
        $self = clone $this;
        $self['organizationID'] = $organizationID;

        return $self;
    }

    public function withReceivedAt(\DateTimeInterface $receivedAt): self
    {
        $self = clone $this;
        $self['receivedAt'] = $receivedAt;

        return $self;
    }

    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * @param list<To|array{
     *   carrier?: string|null,
     *   lineType?: string|null,
     *   phoneNumber?: string|null,
     *   status?: string|null,
     * }> $to
     */
    public function withTo(array $to): self
    {
        $self = clone $this;
        $self['to'] = $to;

        return $self;
    }

    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
