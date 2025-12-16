<?php

declare(strict_types=1);

namespace Telnyx\Messages;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messages\MessageCancelScheduledResponse\Cc;
use Telnyx\Messages\MessageCancelScheduledResponse\Cost;
use Telnyx\Messages\MessageCancelScheduledResponse\CostBreakdown;
use Telnyx\Messages\MessageCancelScheduledResponse\Direction;
use Telnyx\Messages\MessageCancelScheduledResponse\From;
use Telnyx\Messages\MessageCancelScheduledResponse\Media;
use Telnyx\Messages\MessageCancelScheduledResponse\RecordType;
use Telnyx\Messages\MessageCancelScheduledResponse\To;
use Telnyx\Messages\MessageCancelScheduledResponse\Type;

/**
 * @phpstan-import-type CcShape from \Telnyx\Messages\MessageCancelScheduledResponse\Cc
 * @phpstan-import-type CostShape from \Telnyx\Messages\MessageCancelScheduledResponse\Cost
 * @phpstan-import-type CostBreakdownShape from \Telnyx\Messages\MessageCancelScheduledResponse\CostBreakdown
 * @phpstan-import-type MessagingErrorShape from \Telnyx\Messages\MessagingError
 * @phpstan-import-type FromShape from \Telnyx\Messages\MessageCancelScheduledResponse\From
 * @phpstan-import-type MediaShape from \Telnyx\Messages\MessageCancelScheduledResponse\Media
 * @phpstan-import-type ToShape from \Telnyx\Messages\MessageCancelScheduledResponse\To
 *
 * @phpstan-type MessageCancelScheduledResponseShape = array{
 *   id?: string|null,
 *   cc?: list<CcShape>|null,
 *   completedAt?: \DateTimeInterface|null,
 *   cost?: null|Cost|CostShape,
 *   costBreakdown?: null|CostBreakdown|CostBreakdownShape,
 *   direction?: null|Direction|value-of<Direction>,
 *   encoding?: string|null,
 *   errors?: list<MessagingErrorShape>|null,
 *   from?: null|From|FromShape,
 *   media?: list<MediaShape>|null,
 *   messagingProfileID?: string|null,
 *   organizationID?: string|null,
 *   parts?: int|null,
 *   receivedAt?: \DateTimeInterface|null,
 *   recordType?: null|RecordType|value-of<RecordType>,
 *   sentAt?: \DateTimeInterface|null,
 *   subject?: string|null,
 *   tags?: list<string>|null,
 *   tcrCampaignBillable?: bool|null,
 *   tcrCampaignID?: string|null,
 *   tcrCampaignRegistered?: string|null,
 *   text?: string|null,
 *   to?: list<ToShape>|null,
 *   type?: null|Type|value-of<Type>,
 *   validUntil?: \DateTimeInterface|null,
 *   webhookFailoverURL?: string|null,
 *   webhookURL?: string|null,
 * }
 */
final class MessageCancelScheduledResponse implements BaseModel
{
    /** @use SdkModel<MessageCancelScheduledResponseShape> */
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
     * @param list<CcShape> $cc
     * @param CostShape|null $cost
     * @param CostBreakdownShape|null $costBreakdown
     * @param Direction|value-of<Direction> $direction
     * @param list<MessagingErrorShape> $errors
     * @param FromShape $from
     * @param list<MediaShape> $media
     * @param RecordType|value-of<RecordType> $recordType
     * @param list<string> $tags
     * @param list<ToShape> $to
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
     * @param list<CcShape> $cc
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
     * @param CostShape|null $cost
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
     * @param CostBreakdownShape|null $costBreakdown
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
     * @param list<MessagingErrorShape> $errors
     */
    public function withErrors(array $errors): self
    {
        $self = clone $this;
        $self['errors'] = $errors;

        return $self;
    }

    /**
     * @param FromShape $from
     */
    public function withFrom(From|array $from): self
    {
        $self = clone $this;
        $self['from'] = $from;

        return $self;
    }

    /**
     * @param list<MediaShape> $media
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
     * @param list<ToShape> $to
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
