<?php

declare(strict_types=1);

namespace Telnyx\Messages;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messages\MessageCancelScheduledResponse\Cc;
use Telnyx\Messages\MessageCancelScheduledResponse\Cc\LineType;
use Telnyx\Messages\MessageCancelScheduledResponse\Cc\Status;
use Telnyx\Messages\MessageCancelScheduledResponse\Cost;
use Telnyx\Messages\MessageCancelScheduledResponse\CostBreakdown;
use Telnyx\Messages\MessageCancelScheduledResponse\CostBreakdown\CarrierFee;
use Telnyx\Messages\MessageCancelScheduledResponse\CostBreakdown\Rate;
use Telnyx\Messages\MessageCancelScheduledResponse\Direction;
use Telnyx\Messages\MessageCancelScheduledResponse\From;
use Telnyx\Messages\MessageCancelScheduledResponse\Media;
use Telnyx\Messages\MessageCancelScheduledResponse\RecordType;
use Telnyx\Messages\MessageCancelScheduledResponse\To;
use Telnyx\Messages\MessageCancelScheduledResponse\Type;
use Telnyx\Messages\MessagingError\Source;

/**
 * @phpstan-type MessageCancelScheduledResponseShape = array{
 *   id?: string|null,
 *   cc?: list<Cc>|null,
 *   completed_at?: \DateTimeInterface|null,
 *   cost?: Cost|null,
 *   cost_breakdown?: CostBreakdown|null,
 *   direction?: value-of<Direction>|null,
 *   encoding?: string|null,
 *   errors?: list<MessagingError>|null,
 *   from?: From|null,
 *   media?: list<Media>|null,
 *   messaging_profile_id?: string|null,
 *   organization_id?: string|null,
 *   parts?: int|null,
 *   received_at?: \DateTimeInterface|null,
 *   record_type?: value-of<RecordType>|null,
 *   sent_at?: \DateTimeInterface|null,
 *   subject?: string|null,
 *   tags?: list<string>|null,
 *   tcr_campaign_billable?: bool|null,
 *   tcr_campaign_id?: string|null,
 *   tcr_campaign_registered?: string|null,
 *   text?: string|null,
 *   to?: list<To>|null,
 *   type?: value-of<Type>|null,
 *   valid_until?: \DateTimeInterface|null,
 *   webhook_failover_url?: string|null,
 *   webhook_url?: string|null,
 * }
 */
final class MessageCancelScheduledResponse implements BaseModel
{
    /** @use SdkModel<MessageCancelScheduledResponseShape> */
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
     * ISO 8601 formatted date indicating when the message was finalized.
     */
    #[Api(nullable: true, optional: true)]
    public ?\DateTimeInterface $completed_at;

    #[Api(nullable: true, optional: true)]
    public ?Cost $cost;

    /**
     * Detailed breakdown of the message cost components.
     */
    #[Api(nullable: true, optional: true)]
    public ?CostBreakdown $cost_breakdown;

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
    #[Api(optional: true)]
    public ?string $messaging_profile_id;

    /**
     * The id of the organization the messaging profile belongs to.
     */
    #[Api(optional: true)]
    public ?string $organization_id;

    /**
     * Number of parts into which the message's body must be split.
     */
    #[Api(optional: true)]
    public ?int $parts;

    /**
     * ISO 8601 formatted date indicating when the message request was received.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $received_at;

    /**
     * Identifies the type of the resource.
     *
     * @var value-of<RecordType>|null $record_type
     */
    #[Api(enum: RecordType::class, optional: true)]
    public ?string $record_type;

    /**
     * ISO 8601 formatted date indicating when the message was sent.
     */
    #[Api(nullable: true, optional: true)]
    public ?\DateTimeInterface $sent_at;

    /**
     * Subject of multimedia message.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $subject;

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
    #[Api(optional: true)]
    public ?bool $tcr_campaign_billable;

    /**
     * The Campaign Registry (TCR) campaign ID associated with the message.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $tcr_campaign_id;

    /**
     * The registration status of the TCR campaign.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $tcr_campaign_registered;

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
     * The type of message.
     *
     * @var value-of<Type>|null $type
     */
    #[Api(enum: Type::class, optional: true)]
    public ?string $type;

    /**
     * Message must be out of the queue by this time or else it will be discarded and marked as 'sending_failed'. Once the message moves out of the queue, this field will be nulled.
     */
    #[Api(nullable: true, optional: true)]
    public ?\DateTimeInterface $valid_until;

    /**
     * The failover URL where webhooks related to this message will be sent if sending to the primary URL fails.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $webhook_failover_url;

    /**
     * The URL where webhooks related to this message will be sent.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $webhook_url;

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
     *   line_type?: value-of<LineType>|null,
     *   phone_number?: string|null,
     *   status?: value-of<Status>|null,
     * }> $cc
     * @param Cost|array{amount?: string|null, currency?: string|null}|null $cost
     * @param CostBreakdown|array{
     *   carrier_fee?: CarrierFee|null, rate?: Rate|null
     * }|null $cost_breakdown
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
     *   line_type?: value-of<From\LineType>|null,
     *   phone_number?: string|null,
     * } $from
     * @param list<Media|array{
     *   content_type?: string|null,
     *   sha256?: string|null,
     *   size?: int|null,
     *   url?: string|null,
     * }> $media
     * @param RecordType|value-of<RecordType> $record_type
     * @param list<string> $tags
     * @param list<To|array{
     *   carrier?: string|null,
     *   line_type?: value-of<To\LineType>|null,
     *   phone_number?: string|null,
     *   status?: value-of<To\Status>|null,
     * }> $to
     * @param Type|value-of<Type> $type
     */
    public static function with(
        ?string $id = null,
        ?array $cc = null,
        ?\DateTimeInterface $completed_at = null,
        Cost|array|null $cost = null,
        CostBreakdown|array|null $cost_breakdown = null,
        Direction|string|null $direction = null,
        ?string $encoding = null,
        ?array $errors = null,
        From|array|null $from = null,
        ?array $media = null,
        ?string $messaging_profile_id = null,
        ?string $organization_id = null,
        ?int $parts = null,
        ?\DateTimeInterface $received_at = null,
        RecordType|string|null $record_type = null,
        ?\DateTimeInterface $sent_at = null,
        ?string $subject = null,
        ?array $tags = null,
        ?bool $tcr_campaign_billable = null,
        ?string $tcr_campaign_id = null,
        ?string $tcr_campaign_registered = null,
        ?string $text = null,
        ?array $to = null,
        Type|string|null $type = null,
        ?\DateTimeInterface $valid_until = null,
        ?string $webhook_failover_url = null,
        ?string $webhook_url = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $cc && $obj['cc'] = $cc;
        null !== $completed_at && $obj['completed_at'] = $completed_at;
        null !== $cost && $obj['cost'] = $cost;
        null !== $cost_breakdown && $obj['cost_breakdown'] = $cost_breakdown;
        null !== $direction && $obj['direction'] = $direction;
        null !== $encoding && $obj['encoding'] = $encoding;
        null !== $errors && $obj['errors'] = $errors;
        null !== $from && $obj['from'] = $from;
        null !== $media && $obj['media'] = $media;
        null !== $messaging_profile_id && $obj['messaging_profile_id'] = $messaging_profile_id;
        null !== $organization_id && $obj['organization_id'] = $organization_id;
        null !== $parts && $obj['parts'] = $parts;
        null !== $received_at && $obj['received_at'] = $received_at;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $sent_at && $obj['sent_at'] = $sent_at;
        null !== $subject && $obj['subject'] = $subject;
        null !== $tags && $obj['tags'] = $tags;
        null !== $tcr_campaign_billable && $obj['tcr_campaign_billable'] = $tcr_campaign_billable;
        null !== $tcr_campaign_id && $obj['tcr_campaign_id'] = $tcr_campaign_id;
        null !== $tcr_campaign_registered && $obj['tcr_campaign_registered'] = $tcr_campaign_registered;
        null !== $text && $obj['text'] = $text;
        null !== $to && $obj['to'] = $to;
        null !== $type && $obj['type'] = $type;
        null !== $valid_until && $obj['valid_until'] = $valid_until;
        null !== $webhook_failover_url && $obj['webhook_failover_url'] = $webhook_failover_url;
        null !== $webhook_url && $obj['webhook_url'] = $webhook_url;

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
     *   line_type?: value-of<LineType>|null,
     *   phone_number?: string|null,
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
        $obj['completed_at'] = $completedAt;

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
     *   carrier_fee?: CarrierFee|null, rate?: Rate|null
     * }|null $costBreakdown
     */
    public function withCostBreakdown(
        CostBreakdown|array|null $costBreakdown
    ): self {
        $obj = clone $this;
        $obj['cost_breakdown'] = $costBreakdown;

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
     *   line_type?: value-of<From\LineType>|null,
     *   phone_number?: string|null,
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
     *   content_type?: string|null,
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
        $obj['messaging_profile_id'] = $messagingProfileID;

        return $obj;
    }

    /**
     * The id of the organization the messaging profile belongs to.
     */
    public function withOrganizationID(string $organizationID): self
    {
        $obj = clone $this;
        $obj['organization_id'] = $organizationID;

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
        $obj['received_at'] = $receivedAt;

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
        $obj['record_type'] = $recordType;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the message was sent.
     */
    public function withSentAt(?\DateTimeInterface $sentAt): self
    {
        $obj = clone $this;
        $obj['sent_at'] = $sentAt;

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
        $obj['tcr_campaign_billable'] = $tcrCampaignBillable;

        return $obj;
    }

    /**
     * The Campaign Registry (TCR) campaign ID associated with the message.
     */
    public function withTcrCampaignID(?string $tcrCampaignID): self
    {
        $obj = clone $this;
        $obj['tcr_campaign_id'] = $tcrCampaignID;

        return $obj;
    }

    /**
     * The registration status of the TCR campaign.
     */
    public function withTcrCampaignRegistered(
        ?string $tcrCampaignRegistered
    ): self {
        $obj = clone $this;
        $obj['tcr_campaign_registered'] = $tcrCampaignRegistered;

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
     *   line_type?: value-of<To\LineType>|null,
     *   phone_number?: string|null,
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
        $obj['valid_until'] = $validUntil;

        return $obj;
    }

    /**
     * The failover URL where webhooks related to this message will be sent if sending to the primary URL fails.
     */
    public function withWebhookFailoverURL(?string $webhookFailoverURL): self
    {
        $obj = clone $this;
        $obj['webhook_failover_url'] = $webhookFailoverURL;

        return $obj;
    }

    /**
     * The URL where webhooks related to this message will be sent.
     */
    public function withWebhookURL(?string $webhookURL): self
    {
        $obj = clone $this;
        $obj['webhook_url'] = $webhookURL;

        return $obj;
    }
}
