<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\InboundMessageWebhookEvent\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messages\MessagingError;
use Telnyx\Webhooks\InboundMessageWebhookEvent\Data\Payload\Cc;
use Telnyx\Webhooks\InboundMessageWebhookEvent\Data\Payload\Cost;
use Telnyx\Webhooks\InboundMessageWebhookEvent\Data\Payload\CostBreakdown;
use Telnyx\Webhooks\InboundMessageWebhookEvent\Data\Payload\Direction;
use Telnyx\Webhooks\InboundMessageWebhookEvent\Data\Payload\From;
use Telnyx\Webhooks\InboundMessageWebhookEvent\Data\Payload\Media;
use Telnyx\Webhooks\InboundMessageWebhookEvent\Data\Payload\RecordType;
use Telnyx\Webhooks\InboundMessageWebhookEvent\Data\Payload\To;
use Telnyx\Webhooks\InboundMessageWebhookEvent\Data\Payload\Type;

/**
 * @phpstan-type payload_alias = array{
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
 *   parts?: int|null,
 *   receivedAt?: \DateTimeInterface|null,
 *   recordType?: value-of<RecordType>|null,
 *   sentAt?: \DateTimeInterface|null,
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
final class Payload implements BaseModel
{
    /** @use SdkModel<payload_alias> */
    use SdkModel;

    /**
     * Identifies the type of resource.
     */
    #[Api(optional: true)]
    public ?string $id;

    /** @var list<Cc>|null $cc */
    #[Api(list: Cc::class, optional: true)]
    public ?array $cc;

    /**
     * Not used for inbound messages.
     */
    #[Api('completed_at', nullable: true, optional: true)]
    public ?\DateTimeInterface $completedAt;

    #[Api(nullable: true, optional: true)]
    public ?Cost $cost;

    /**
     * Detailed breakdown of the message cost components.
     */
    #[Api('cost_breakdown', nullable: true, optional: true)]
    public ?CostBreakdown $costBreakdown;

    /**
     * The direction of the message. Inbound messages are sent to you whereas outbound messages are sent from you.
     *
     * @var value-of<Direction>|null $direction
     */
    #[Api(enum: Direction::class, optional: true)]
    public ?string $direction;

    /**
     * Encoding scheme used for the message body.
     */
    #[Api(optional: true)]
    public ?string $encoding;

    /**
     * These errors may point at addressees when referring to unsuccessful/unconfirmed delivery statuses.
     *
     * @var list<MessagingError>|null $errors
     */
    #[Api(list: MessagingError::class, optional: true)]
    public ?array $errors;

    #[Api(optional: true)]
    public ?From $from;

    /** @var list<Media>|null $media */
    #[Api(list: Media::class, optional: true)]
    public ?array $media;

    /**
     * Unique identifier for a messaging profile.
     */
    #[Api('messaging_profile_id', optional: true)]
    public ?string $messagingProfileID;

    /**
     * Number of parts into which the message's body must be split.
     */
    #[Api(optional: true)]
    public ?int $parts;

    /**
     * ISO 8601 formatted date indicating when the message request was received.
     */
    #[Api('received_at', optional: true)]
    public ?\DateTimeInterface $receivedAt;

    /**
     * Identifies the type of the resource.
     *
     * @var value-of<RecordType>|null $recordType
     */
    #[Api('record_type', enum: RecordType::class, optional: true)]
    public ?string $recordType;

    /**
     * Not used for inbound messages.
     */
    #[Api('sent_at', nullable: true, optional: true)]
    public ?\DateTimeInterface $sentAt;

    /**
     * Tags associated with the resource.
     *
     * @var list<string>|null $tags
     */
    #[Api(list: 'string', optional: true)]
    public ?array $tags;

    /**
     * Indicates whether the TCR campaign is billable.
     */
    #[Api('tcr_campaign_billable', optional: true)]
    public ?bool $tcrCampaignBillable;

    /**
     * The Campaign Registry (TCR) campaign ID associated with the message.
     */
    #[Api('tcr_campaign_id', nullable: true, optional: true)]
    public ?string $tcrCampaignID;

    /**
     * The registration status of the TCR campaign.
     */
    #[Api('tcr_campaign_registered', nullable: true, optional: true)]
    public ?string $tcrCampaignRegistered;

    /**
     * Message body (i.e., content) as a non-empty string.
     *
     * **Required for SMS**
     */
    #[Api(optional: true)]
    public ?string $text;

    /** @var list<To>|null $to */
    #[Api(list: To::class, optional: true)]
    public ?array $to;

    /**
     * The type of message. This value can be either 'sms' or 'mms'.
     *
     * @var value-of<Type>|null $type
     */
    #[Api(enum: Type::class, optional: true)]
    public ?string $type;

    /**
     * Not used for inbound messages.
     */
    #[Api('valid_until', nullable: true, optional: true)]
    public ?\DateTimeInterface $validUntil;

    /**
     * The failover URL where webhooks related to this message will be sent if sending to the primary URL fails.
     */
    #[Api('webhook_failover_url', nullable: true, optional: true)]
    public ?string $webhookFailoverURL;

    /**
     * The URL where webhooks related to this message will be sent.
     */
    #[Api('webhook_url', nullable: true, optional: true)]
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
     * @param list<Cc> $cc
     * @param Direction|value-of<Direction> $direction
     * @param list<MessagingError> $errors
     * @param list<Media> $media
     * @param RecordType|value-of<RecordType> $recordType
     * @param list<string> $tags
     * @param list<To> $to
     * @param Type|value-of<Type> $type
     */
    public static function with(
        ?string $id = null,
        ?array $cc = null,
        ?\DateTimeInterface $completedAt = null,
        ?Cost $cost = null,
        ?CostBreakdown $costBreakdown = null,
        Direction|string|null $direction = null,
        ?string $encoding = null,
        ?array $errors = null,
        ?From $from = null,
        ?array $media = null,
        ?string $messagingProfileID = null,
        ?int $parts = null,
        ?\DateTimeInterface $receivedAt = null,
        RecordType|string|null $recordType = null,
        ?\DateTimeInterface $sentAt = null,
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

        null !== $id && $obj->id = $id;
        null !== $cc && $obj->cc = $cc;
        null !== $completedAt && $obj->completedAt = $completedAt;
        null !== $cost && $obj->cost = $cost;
        null !== $costBreakdown && $obj->costBreakdown = $costBreakdown;
        null !== $direction && $obj->direction = $direction instanceof Direction ? $direction->value : $direction;
        null !== $encoding && $obj->encoding = $encoding;
        null !== $errors && $obj->errors = $errors;
        null !== $from && $obj->from = $from;
        null !== $media && $obj->media = $media;
        null !== $messagingProfileID && $obj->messagingProfileID = $messagingProfileID;
        null !== $parts && $obj->parts = $parts;
        null !== $receivedAt && $obj->receivedAt = $receivedAt;
        null !== $recordType && $obj->recordType = $recordType instanceof RecordType ? $recordType->value : $recordType;
        null !== $sentAt && $obj->sentAt = $sentAt;
        null !== $tags && $obj->tags = $tags;
        null !== $tcrCampaignBillable && $obj->tcrCampaignBillable = $tcrCampaignBillable;
        null !== $tcrCampaignID && $obj->tcrCampaignID = $tcrCampaignID;
        null !== $tcrCampaignRegistered && $obj->tcrCampaignRegistered = $tcrCampaignRegistered;
        null !== $text && $obj->text = $text;
        null !== $to && $obj->to = $to;
        null !== $type && $obj->type = $type instanceof Type ? $type->value : $type;
        null !== $validUntil && $obj->validUntil = $validUntil;
        null !== $webhookFailoverURL && $obj->webhookFailoverURL = $webhookFailoverURL;
        null !== $webhookURL && $obj->webhookURL = $webhookURL;

        return $obj;
    }

    /**
     * Identifies the type of resource.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * @param list<Cc> $cc
     */
    public function withCc(array $cc): self
    {
        $obj = clone $this;
        $obj->cc = $cc;

        return $obj;
    }

    /**
     * Not used for inbound messages.
     */
    public function withCompletedAt(?\DateTimeInterface $completedAt): self
    {
        $obj = clone $this;
        $obj->completedAt = $completedAt;

        return $obj;
    }

    public function withCost(?Cost $cost): self
    {
        $obj = clone $this;
        $obj->cost = $cost;

        return $obj;
    }

    /**
     * Detailed breakdown of the message cost components.
     */
    public function withCostBreakdown(?CostBreakdown $costBreakdown): self
    {
        $obj = clone $this;
        $obj->costBreakdown = $costBreakdown;

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
        $obj->direction = $direction instanceof Direction ? $direction->value : $direction;

        return $obj;
    }

    /**
     * Encoding scheme used for the message body.
     */
    public function withEncoding(string $encoding): self
    {
        $obj = clone $this;
        $obj->encoding = $encoding;

        return $obj;
    }

    /**
     * These errors may point at addressees when referring to unsuccessful/unconfirmed delivery statuses.
     *
     * @param list<MessagingError> $errors
     */
    public function withErrors(array $errors): self
    {
        $obj = clone $this;
        $obj->errors = $errors;

        return $obj;
    }

    public function withFrom(From $from): self
    {
        $obj = clone $this;
        $obj->from = $from;

        return $obj;
    }

    /**
     * @param list<Media> $media
     */
    public function withMedia(array $media): self
    {
        $obj = clone $this;
        $obj->media = $media;

        return $obj;
    }

    /**
     * Unique identifier for a messaging profile.
     */
    public function withMessagingProfileID(string $messagingProfileID): self
    {
        $obj = clone $this;
        $obj->messagingProfileID = $messagingProfileID;

        return $obj;
    }

    /**
     * Number of parts into which the message's body must be split.
     */
    public function withParts(int $parts): self
    {
        $obj = clone $this;
        $obj->parts = $parts;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the message request was received.
     */
    public function withReceivedAt(\DateTimeInterface $receivedAt): self
    {
        $obj = clone $this;
        $obj->receivedAt = $receivedAt;

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
        $obj->recordType = $recordType instanceof RecordType ? $recordType->value : $recordType;

        return $obj;
    }

    /**
     * Not used for inbound messages.
     */
    public function withSentAt(?\DateTimeInterface $sentAt): self
    {
        $obj = clone $this;
        $obj->sentAt = $sentAt;

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
        $obj->tags = $tags;

        return $obj;
    }

    /**
     * Indicates whether the TCR campaign is billable.
     */
    public function withTcrCampaignBillable(bool $tcrCampaignBillable): self
    {
        $obj = clone $this;
        $obj->tcrCampaignBillable = $tcrCampaignBillable;

        return $obj;
    }

    /**
     * The Campaign Registry (TCR) campaign ID associated with the message.
     */
    public function withTcrCampaignID(?string $tcrCampaignID): self
    {
        $obj = clone $this;
        $obj->tcrCampaignID = $tcrCampaignID;

        return $obj;
    }

    /**
     * The registration status of the TCR campaign.
     */
    public function withTcrCampaignRegistered(
        ?string $tcrCampaignRegistered
    ): self {
        $obj = clone $this;
        $obj->tcrCampaignRegistered = $tcrCampaignRegistered;

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
        $obj->text = $text;

        return $obj;
    }

    /**
     * @param list<To> $to
     */
    public function withTo(array $to): self
    {
        $obj = clone $this;
        $obj->to = $to;

        return $obj;
    }

    /**
     * The type of message. This value can be either 'sms' or 'mms'.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj->type = $type instanceof Type ? $type->value : $type;

        return $obj;
    }

    /**
     * Not used for inbound messages.
     */
    public function withValidUntil(?\DateTimeInterface $validUntil): self
    {
        $obj = clone $this;
        $obj->validUntil = $validUntil;

        return $obj;
    }

    /**
     * The failover URL where webhooks related to this message will be sent if sending to the primary URL fails.
     */
    public function withWebhookFailoverURL(?string $webhookFailoverURL): self
    {
        $obj = clone $this;
        $obj->webhookFailoverURL = $webhookFailoverURL;

        return $obj;
    }

    /**
     * The URL where webhooks related to this message will be sent.
     */
    public function withWebhookURL(?string $webhookURL): self
    {
        $obj = clone $this;
        $obj->webhookURL = $webhookURL;

        return $obj;
    }
}
