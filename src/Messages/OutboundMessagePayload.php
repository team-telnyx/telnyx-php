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
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $cc && $obj['cc'] = $cc;
        null !== $completedAt && $obj['completedAt'] = $completedAt;
        null !== $cost && $obj['cost'] = $cost;
        null !== $costBreakdown && $obj['costBreakdown'] = $costBreakdown;
        null !== $direction && $obj['direction'] = $direction;
        null !== $encoding && $obj['encoding'] = $encoding;
        null !== $errors && $obj['errors'] = $errors;
        null !== $from && $obj['from'] = $from;
        null !== $media && $obj['media'] = $media;
        null !== $messagingProfileID && $obj['messagingProfileID'] = $messagingProfileID;
        null !== $organizationID && $obj['organizationID'] = $organizationID;
        null !== $parts && $obj['parts'] = $parts;
        null !== $receivedAt && $obj['receivedAt'] = $receivedAt;
        null !== $recordType && $obj['recordType'] = $recordType;
        null !== $sentAt && $obj['sentAt'] = $sentAt;
        null !== $subject && $obj['subject'] = $subject;
        null !== $tags && $obj['tags'] = $tags;
        null !== $tcrCampaignBillable && $obj['tcrCampaignBillable'] = $tcrCampaignBillable;
        null !== $tcrCampaignID && $obj['tcrCampaignID'] = $tcrCampaignID;
        null !== $tcrCampaignRegistered && $obj['tcrCampaignRegistered'] = $tcrCampaignRegistered;
        null !== $text && $obj['text'] = $text;
        null !== $to && $obj['to'] = $to;
        null !== $type && $obj['type'] = $type;
        null !== $validUntil && $obj['validUntil'] = $validUntil;
        null !== $webhookFailoverURL && $obj['webhookFailoverURL'] = $webhookFailoverURL;
        null !== $webhookURL && $obj['webhookURL'] = $webhookURL;

        return $obj;
    }

    /**
     * Identifies the type of resource.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
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
        $obj = clone $this;
        $obj['cc'] = $cc;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the message was finalized.
     */
    public function withCompletedAt(?\DateTimeInterface $completedAt): self
    {
        $obj = clone $this;
        $obj['completedAt'] = $completedAt;

        return $obj;
    }

    /**
     * @param Cost|array{amount?: string|null, currency?: string|null}|null $cost
     */
    public function withCost(Cost|array|null $cost): self
    {
        $obj = clone $this;
        $obj['cost'] = $cost;

        return $obj;
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
        $obj = clone $this;
        $obj['costBreakdown'] = $costBreakdown;

        return $obj;
    }

    /**
     * The direction of the message. Inbound messages are sent to you whereas outbound messages are sent from you.
     *
     * @param Direction|value-of<Direction> $direction
     */
    public function withDirection(Direction|string $direction): self
    {
        $obj = clone $this;
        $obj['direction'] = $direction;

        return $obj;
    }

    /**
     * Encoding scheme used for the message body.
     */
    public function withEncoding(string $encoding): self
    {
        $obj = clone $this;
        $obj['encoding'] = $encoding;

        return $obj;
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
        $obj = clone $this;
        $obj['errors'] = $errors;

        return $obj;
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
        $obj = clone $this;
        $obj['from'] = $from;

        return $obj;
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
        $obj = clone $this;
        $obj['media'] = $media;

        return $obj;
    }

    /**
     * Unique identifier for a messaging profile.
     */
    public function withMessagingProfileID(string $messagingProfileID): self
    {
        $obj = clone $this;
        $obj['messagingProfileID'] = $messagingProfileID;

        return $obj;
    }

    /**
     * The id of the organization the messaging profile belongs to.
     */
    public function withOrganizationID(string $organizationID): self
    {
        $obj = clone $this;
        $obj['organizationID'] = $organizationID;

        return $obj;
    }

    /**
     * Number of parts into which the message's body must be split.
     */
    public function withParts(int $parts): self
    {
        $obj = clone $this;
        $obj['parts'] = $parts;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the message request was received.
     */
    public function withReceivedAt(\DateTimeInterface $receivedAt): self
    {
        $obj = clone $this;
        $obj['receivedAt'] = $receivedAt;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     *
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(RecordType|string $recordType): self
    {
        $obj = clone $this;
        $obj['recordType'] = $recordType;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the message was sent.
     */
    public function withSentAt(?\DateTimeInterface $sentAt): self
    {
        $obj = clone $this;
        $obj['sentAt'] = $sentAt;

        return $obj;
    }

    /**
     * Subject of multimedia message.
     */
    public function withSubject(?string $subject): self
    {
        $obj = clone $this;
        $obj['subject'] = $subject;

        return $obj;
    }

    /**
     * Tags associated with the resource.
     *
     * @param list<string> $tags
     */
    public function withTags(array $tags): self
    {
        $obj = clone $this;
        $obj['tags'] = $tags;

        return $obj;
    }

    /**
     * Indicates whether the TCR campaign is billable.
     */
    public function withTcrCampaignBillable(bool $tcrCampaignBillable): self
    {
        $obj = clone $this;
        $obj['tcrCampaignBillable'] = $tcrCampaignBillable;

        return $obj;
    }

    /**
     * The Campaign Registry (TCR) campaign ID associated with the message.
     */
    public function withTcrCampaignID(?string $tcrCampaignID): self
    {
        $obj = clone $this;
        $obj['tcrCampaignID'] = $tcrCampaignID;

        return $obj;
    }

    /**
     * The registration status of the TCR campaign.
     */
    public function withTcrCampaignRegistered(
        ?string $tcrCampaignRegistered
    ): self {
        $obj = clone $this;
        $obj['tcrCampaignRegistered'] = $tcrCampaignRegistered;

        return $obj;
    }

    /**
     * Message body (i.e., content) as a non-empty string.
     *
     * **Required for SMS**
     */
    public function withText(string $text): self
    {
        $obj = clone $this;
        $obj['text'] = $text;

        return $obj;
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
        $obj = clone $this;
        $obj['to'] = $to;

        return $obj;
    }

    /**
     * The type of message.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }

    /**
     * Message must be out of the queue by this time or else it will be discarded and marked as 'sending_failed'. Once the message moves out of the queue, this field will be nulled.
     */
    public function withValidUntil(?\DateTimeInterface $validUntil): self
    {
        $obj = clone $this;
        $obj['validUntil'] = $validUntil;

        return $obj;
    }

    /**
     * The failover URL where webhooks related to this message will be sent if sending to the primary URL fails.
     */
    public function withWebhookFailoverURL(?string $webhookFailoverURL): self
    {
        $obj = clone $this;
        $obj['webhookFailoverURL'] = $webhookFailoverURL;

        return $obj;
    }

    /**
     * The URL where webhooks related to this message will be sent.
     */
    public function withWebhookURL(?string $webhookURL): self
    {
        $obj = clone $this;
        $obj['webhookURL'] = $webhookURL;

        return $obj;
    }
}
