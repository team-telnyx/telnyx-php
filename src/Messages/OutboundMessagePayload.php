<?php

declare(strict_types=1);

namespace Telnyx\Messages;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messages\MessagingError\Source;
use Telnyx\Messages\OutboundMessagePayload\Cc;
use Telnyx\Messages\OutboundMessagePayload\Cc\LineType;
use Telnyx\Messages\OutboundMessagePayload\Cc\Status;
use Telnyx\Messages\OutboundMessagePayload\Cost;
use Telnyx\Messages\OutboundMessagePayload\CostBreakdown;
use Telnyx\Messages\OutboundMessagePayload\CostBreakdown\CarrierFee;
use Telnyx\Messages\OutboundMessagePayload\CostBreakdown\Rate;
use Telnyx\Messages\OutboundMessagePayload\Direction;
use Telnyx\Messages\OutboundMessagePayload\From;
use Telnyx\Messages\OutboundMessagePayload\Media;
use Telnyx\Messages\OutboundMessagePayload\RecordType;
use Telnyx\Messages\OutboundMessagePayload\To;
use Telnyx\Messages\OutboundMessagePayload\Type;

/**
 * @phpstan-type OutboundMessagePayloadShape = array{
 *   id?: string|null,
 *   cc?: list<Cc>|null,
 *   completedAt?: \DateTimeInterface|null,
 *   cost?: Cost|null,
 *   costBreakdown?: CostBreakdown|null,
 *   direction?: value-of<Direction>|null,
 *   encoding?: string|null,
 *   errors?: list<MessagingError>|null,
 *   from?: From|null,
 *   media?: list<Media>|null,
 *   messagingProfileID?: string|null,
 *   organizationID?: string|null,
 *   parts?: int|null,
 *   receivedAt?: \DateTimeInterface|null,
 *   recordType?: value-of<RecordType>|null,
 *   sentAt?: \DateTimeInterface|null,
 *   subject?: string|null,
 *   tags?: list<string>|null,
 *   tcrCampaignBillable?: bool|null,
 *   tcrCampaignID?: string|null,
 *   tcrCampaignRegistered?: string|null,
 *   text?: string|null,
 *   to?: list<To>|null,
 *   type?: value-of<Type>|null,
 *   validUntil?: \DateTimeInterface|null,
 *   webhookFailoverURL?: string|null,
 *   webhookURL?: string|null,
 * }
 */
final class OutboundMessagePayload implements BaseModel
{
    /** @use SdkModel<OutboundMessagePayloadShape> */
    use SdkModel;

    /**
     * Identifies the type of resource.
     */
    #[Optional]
    public ?string $id;

    /** @var list<Cc>|null $cc */
    #[Optional(list: Cc::class)]
    public ?array $cc;

    /**
     * ISO 8601 formatted date indicating when the message was finalized.
     */
    #[Optional('completed_at', nullable: true)]
    public ?\DateTimeInterface $completedAt;

    #[Optional(nullable: true)]
    public ?Cost $cost;

    /**
     * Detailed breakdown of the message cost components.
     */
    #[Optional('cost_breakdown', nullable: true)]
    public ?CostBreakdown $costBreakdown;

    /**
     * The direction of the message. Inbound messages are sent to you whereas outbound messages are sent from you.
     *
     * @var value-of<Direction>|null $direction
     */
    #[Optional(enum: Direction::class)]
    public ?string $direction;

    /**
     * Encoding scheme used for the message body.
     */
    #[Optional]
    public ?string $encoding;

    /**
     * These errors may point at addressees when referring to unsuccessful/unconfirmed delivery statuses.
     *
     * @var list<MessagingError>|null $errors
     */
    #[Optional(list: MessagingError::class)]
    public ?array $errors;

    #[Optional]
    public ?From $from;

    /** @var list<Media>|null $media */
    #[Optional(list: Media::class)]
    public ?array $media;

    /**
     * Unique identifier for a messaging profile.
     */
    #[Optional('messaging_profile_id')]
    public ?string $messagingProfileID;

    /**
     * The id of the organization the messaging profile belongs to.
     */
    #[Optional('organization_id')]
    public ?string $organizationID;

    /**
     * Number of parts into which the message's body must be split.
     */
    #[Optional]
    public ?int $parts;

    /**
     * ISO 8601 formatted date indicating when the message request was received.
     */
    #[Optional('received_at')]
    public ?\DateTimeInterface $receivedAt;

    /**
     * Identifies the type of the resource.
     *
     * @var value-of<RecordType>|null $recordType
     */
    #[Optional('record_type', enum: RecordType::class)]
    public ?string $recordType;

    /**
     * ISO 8601 formatted date indicating when the message was sent.
     */
    #[Optional('sent_at', nullable: true)]
    public ?\DateTimeInterface $sentAt;

    /**
     * Subject of multimedia message.
     */
    #[Optional(nullable: true)]
    public ?string $subject;

    /**
     * Tags associated with the resource.
     *
     * @var list<string>|null $tags
     */
    #[Optional(list: 'string')]
    public ?array $tags;

    /**
     * Indicates whether the TCR campaign is billable.
     */
    #[Optional('tcr_campaign_billable')]
    public ?bool $tcrCampaignBillable;

    /**
     * The Campaign Registry (TCR) campaign ID associated with the message.
     */
    #[Optional('tcr_campaign_id', nullable: true)]
    public ?string $tcrCampaignID;

    /**
     * The registration status of the TCR campaign.
     */
    #[Optional('tcr_campaign_registered', nullable: true)]
    public ?string $tcrCampaignRegistered;

    /**
     * Message body (i.e., content) as a non-empty string.
     *
     * **Required for SMS**
     */
    #[Optional]
    public ?string $text;

    /** @var list<To>|null $to */
    #[Optional(list: To::class)]
    public ?array $to;

    /**
     * The type of message.
     *
     * @var value-of<Type>|null $type
     */
    #[Optional(enum: Type::class)]
    public ?string $type;

    /**
     * Message must be out of the queue by this time or else it will be discarded and marked as 'sending_failed'. Once the message moves out of the queue, this field will be nulled.
     */
    #[Optional('valid_until', nullable: true)]
    public ?\DateTimeInterface $validUntil;

    /**
     * The failover URL where webhooks related to this message will be sent if sending to the primary URL fails.
     */
    #[Optional('webhook_failover_url', nullable: true)]
    public ?string $webhookFailoverURL;

    /**
     * The URL where webhooks related to this message will be sent.
     */
    #[Optional('webhook_url', nullable: true)]
    public ?string $webhookURL;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Cc|array{
     *   carrier?: string|null,
     *   lineType?: value-of<LineType>|null,
     *   phoneNumber?: string|null,
     *   status?: value-of<Status>|null,
     * }> $cc
     * @param Cost|array{amount?: string|null, currency?: string|null}|null $cost
     * @param CostBreakdown|array{
     *   carrierFee?: CarrierFee|null, rate?: Rate|null
     * }|null $costBreakdown
     * @param Direction|value-of<Direction> $direction
     * @param list<MessagingError|array{
     *   code: string,
     *   title: string,
     *   detail?: string|null,
     *   meta?: mixed,
     *   source?: Source|null,
     * }> $errors
     * @param From|array{
     *   carrier?: string|null,
     *   lineType?: value-of<From\LineType>|null,
     *   phoneNumber?: string|null,
     * } $from
     * @param list<Media|array{
     *   contentType?: string|null,
     *   sha256?: string|null,
     *   size?: int|null,
     *   url?: string|null,
     * }> $media
     * @param RecordType|value-of<RecordType> $recordType
     * @param list<string> $tags
     * @param list<To|array{
     *   carrier?: string|null,
     *   lineType?: value-of<To\LineType>|null,
     *   phoneNumber?: string|null,
     *   status?: value-of<To\Status>|null,
     * }> $to
     * @param Type|value-of<Type> $type
     */
    public static function with(
        ?string $id = null,
        ?array $cc = null,
        ?\DateTimeInterface $completedAt = null,
        Cost|array|null $cost = null,
        CostBreakdown|array|null $costBreakdown = null,
        Direction|string|null $direction = null,
        ?string $encoding = null,
        ?array $errors = null,
        From|array|null $from = null,
        ?array $media = null,
        ?string $messagingProfileID = null,
        ?string $organizationID = null,
        ?int $parts = null,
        ?\DateTimeInterface $receivedAt = null,
        RecordType|string|null $recordType = null,
        ?\DateTimeInterface $sentAt = null,
        ?string $subject = null,
        ?array $tags = null,
        ?bool $tcrCampaignBillable = null,
        ?string $tcrCampaignID = null,
        ?string $tcrCampaignRegistered = null,
        ?string $text = null,
        ?array $to = null,
        Type|string|null $type = null,
        ?\DateTimeInterface $validUntil = null,
        ?string $webhookFailoverURL = null,
        ?string $webhookURL = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $cc && $self['cc'] = $cc;
        null !== $completedAt && $self['completedAt'] = $completedAt;
        null !== $cost && $self['cost'] = $cost;
        null !== $costBreakdown && $self['costBreakdown'] = $costBreakdown;
        null !== $direction && $self['direction'] = $direction;
        null !== $encoding && $self['encoding'] = $encoding;
        null !== $errors && $self['errors'] = $errors;
        null !== $from && $self['from'] = $from;
        null !== $media && $self['media'] = $media;
        null !== $messagingProfileID && $self['messagingProfileID'] = $messagingProfileID;
        null !== $organizationID && $self['organizationID'] = $organizationID;
        null !== $parts && $self['parts'] = $parts;
        null !== $receivedAt && $self['receivedAt'] = $receivedAt;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $sentAt && $self['sentAt'] = $sentAt;
        null !== $subject && $self['subject'] = $subject;
        null !== $tags && $self['tags'] = $tags;
        null !== $tcrCampaignBillable && $self['tcrCampaignBillable'] = $tcrCampaignBillable;
        null !== $tcrCampaignID && $self['tcrCampaignID'] = $tcrCampaignID;
        null !== $tcrCampaignRegistered && $self['tcrCampaignRegistered'] = $tcrCampaignRegistered;
        null !== $text && $self['text'] = $text;
        null !== $to && $self['to'] = $to;
        null !== $type && $self['type'] = $type;
        null !== $validUntil && $self['validUntil'] = $validUntil;
        null !== $webhookFailoverURL && $self['webhookFailoverURL'] = $webhookFailoverURL;
        null !== $webhookURL && $self['webhookURL'] = $webhookURL;

        return $self;
    }

    /**
     * Identifies the type of resource.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * @param list<Cc|array{
     *   carrier?: string|null,
     *   lineType?: value-of<LineType>|null,
     *   phoneNumber?: string|null,
     *   status?: value-of<Status>|null,
     * }> $cc
     */
    public function withCc(array $cc): self
    {
        $self = clone $this;
        $self['cc'] = $cc;

        return $self;
    }

    /**
     * ISO 8601 formatted date indicating when the message was finalized.
     */
    public function withCompletedAt(?\DateTimeInterface $completedAt): self
    {
        $self = clone $this;
        $self['completedAt'] = $completedAt;

        return $self;
    }

    /**
     * @param Cost|array{amount?: string|null, currency?: string|null}|null $cost
     */
    public function withCost(Cost|array|null $cost): self
    {
        $self = clone $this;
        $self['cost'] = $cost;

        return $self;
    }

    /**
     * Detailed breakdown of the message cost components.
     *
     * @param CostBreakdown|array{
     *   carrierFee?: CarrierFee|null, rate?: Rate|null
     * }|null $costBreakdown
     */
    public function withCostBreakdown(
        CostBreakdown|array|null $costBreakdown
    ): self {
        $self = clone $this;
        $self['costBreakdown'] = $costBreakdown;

        return $self;
    }

    /**
     * The direction of the message. Inbound messages are sent to you whereas outbound messages are sent from you.
     *
     * @param Direction|value-of<Direction> $direction
     */
    public function withDirection(Direction|string $direction): self
    {
        $self = clone $this;
        $self['direction'] = $direction;

        return $self;
    }

    /**
     * Encoding scheme used for the message body.
     */
    public function withEncoding(string $encoding): self
    {
        $self = clone $this;
        $self['encoding'] = $encoding;

        return $self;
    }

    /**
     * These errors may point at addressees when referring to unsuccessful/unconfirmed delivery statuses.
     *
     * @param list<MessagingError|array{
     *   code: string,
     *   title: string,
     *   detail?: string|null,
     *   meta?: mixed,
     *   source?: Source|null,
     * }> $errors
     */
    public function withErrors(array $errors): self
    {
        $self = clone $this;
        $self['errors'] = $errors;

        return $self;
    }

    /**
     * @param From|array{
     *   carrier?: string|null,
     *   lineType?: value-of<From\LineType>|null,
     *   phoneNumber?: string|null,
     * } $from
     */
    public function withFrom(From|array $from): self
    {
        $self = clone $this;
        $self['from'] = $from;

        return $self;
    }

    /**
     * @param list<Media|array{
     *   contentType?: string|null,
     *   sha256?: string|null,
     *   size?: int|null,
     *   url?: string|null,
     * }> $media
     */
    public function withMedia(array $media): self
    {
        $self = clone $this;
        $self['media'] = $media;

        return $self;
    }

    /**
     * Unique identifier for a messaging profile.
     */
    public function withMessagingProfileID(string $messagingProfileID): self
    {
        $self = clone $this;
        $self['messagingProfileID'] = $messagingProfileID;

        return $self;
    }

    /**
     * The id of the organization the messaging profile belongs to.
     */
    public function withOrganizationID(string $organizationID): self
    {
        $self = clone $this;
        $self['organizationID'] = $organizationID;

        return $self;
    }

    /**
     * Number of parts into which the message's body must be split.
     */
    public function withParts(int $parts): self
    {
        $self = clone $this;
        $self['parts'] = $parts;

        return $self;
    }

    /**
     * ISO 8601 formatted date indicating when the message request was received.
     */
    public function withReceivedAt(\DateTimeInterface $receivedAt): self
    {
        $self = clone $this;
        $self['receivedAt'] = $receivedAt;

        return $self;
    }

    /**
     * Identifies the type of the resource.
     *
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(RecordType|string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * ISO 8601 formatted date indicating when the message was sent.
     */
    public function withSentAt(?\DateTimeInterface $sentAt): self
    {
        $self = clone $this;
        $self['sentAt'] = $sentAt;

        return $self;
    }

    /**
     * Subject of multimedia message.
     */
    public function withSubject(?string $subject): self
    {
        $self = clone $this;
        $self['subject'] = $subject;

        return $self;
    }

    /**
     * Tags associated with the resource.
     *
     * @param list<string> $tags
     */
    public function withTags(array $tags): self
    {
        $self = clone $this;
        $self['tags'] = $tags;

        return $self;
    }

    /**
     * Indicates whether the TCR campaign is billable.
     */
    public function withTcrCampaignBillable(bool $tcrCampaignBillable): self
    {
        $self = clone $this;
        $self['tcrCampaignBillable'] = $tcrCampaignBillable;

        return $self;
    }

    /**
     * The Campaign Registry (TCR) campaign ID associated with the message.
     */
    public function withTcrCampaignID(?string $tcrCampaignID): self
    {
        $self = clone $this;
        $self['tcrCampaignID'] = $tcrCampaignID;

        return $self;
    }

    /**
     * The registration status of the TCR campaign.
     */
    public function withTcrCampaignRegistered(
        ?string $tcrCampaignRegistered
    ): self {
        $self = clone $this;
        $self['tcrCampaignRegistered'] = $tcrCampaignRegistered;

        return $self;
    }

    /**
     * Message body (i.e., content) as a non-empty string.
     *
     * **Required for SMS**
     */
    public function withText(string $text): self
    {
        $self = clone $this;
        $self['text'] = $text;

        return $self;
    }

    /**
     * @param list<To|array{
     *   carrier?: string|null,
     *   lineType?: value-of<To\LineType>|null,
     *   phoneNumber?: string|null,
     *   status?: value-of<To\Status>|null,
     * }> $to
     */
    public function withTo(array $to): self
    {
        $self = clone $this;
        $self['to'] = $to;

        return $self;
    }

    /**
     * The type of message.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * Message must be out of the queue by this time or else it will be discarded and marked as 'sending_failed'. Once the message moves out of the queue, this field will be nulled.
     */
    public function withValidUntil(?\DateTimeInterface $validUntil): self
    {
        $self = clone $this;
        $self['validUntil'] = $validUntil;

        return $self;
    }

    /**
     * The failover URL where webhooks related to this message will be sent if sending to the primary URL fails.
     */
    public function withWebhookFailoverURL(?string $webhookFailoverURL): self
    {
        $self = clone $this;
        $self['webhookFailoverURL'] = $webhookFailoverURL;

        return $self;
    }

    /**
     * The URL where webhooks related to this message will be sent.
     */
    public function withWebhookURL(?string $webhookURL): self
    {
        $self = clone $this;
        $self['webhookURL'] = $webhookURL;

        return $self;
    }
}
