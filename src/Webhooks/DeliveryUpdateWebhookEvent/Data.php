<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\DeliveryUpdateWebhookEvent;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messages\MessagingError;
use Telnyx\Messages\OutboundMessagePayload;
use Telnyx\Messages\OutboundMessagePayload\Cc;
use Telnyx\Messages\OutboundMessagePayload\Cost;
use Telnyx\Messages\OutboundMessagePayload\CostBreakdown;
use Telnyx\Messages\OutboundMessagePayload\Direction;
use Telnyx\Messages\OutboundMessagePayload\From;
use Telnyx\Messages\OutboundMessagePayload\Media;
use Telnyx\Messages\OutboundMessagePayload\To;
use Telnyx\Messages\OutboundMessagePayload\Type;
use Telnyx\Webhooks\DeliveryUpdateWebhookEvent\Data\EventType;
use Telnyx\Webhooks\DeliveryUpdateWebhookEvent\Data\RecordType;

/**
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   eventType?: value-of<EventType>|null,
 *   occurredAt?: \DateTimeInterface|null,
 *   payload?: OutboundMessagePayload|null,
 *   recordType?: value-of<RecordType>|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Identifies the type of resource.
     */
    #[Optional]
    public ?string $id;

    /**
     * The type of event being delivered.
     *
     * @var value-of<EventType>|null $eventType
     */
    #[Optional('event_type', enum: EventType::class)]
    public ?string $eventType;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Optional('occurred_at')]
    public ?\DateTimeInterface $occurredAt;

    #[Optional]
    public ?OutboundMessagePayload $payload;

    /**
     * Identifies the type of the resource.
     *
     * @var value-of<RecordType>|null $recordType
     */
    #[Optional('record_type', enum: RecordType::class)]
    public ?string $recordType;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param EventType|value-of<EventType> $eventType
     * @param OutboundMessagePayload|array{
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
     *   recordType?: value-of<OutboundMessagePayload\RecordType>|null,
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
     * } $payload
     * @param RecordType|value-of<RecordType> $recordType
     */
    public static function with(
        ?string $id = null,
        EventType|string|null $eventType = null,
        ?\DateTimeInterface $occurredAt = null,
        OutboundMessagePayload|array|null $payload = null,
        RecordType|string|null $recordType = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $eventType && $self['eventType'] = $eventType;
        null !== $occurredAt && $self['occurredAt'] = $occurredAt;
        null !== $payload && $self['payload'] = $payload;
        null !== $recordType && $self['recordType'] = $recordType;

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
     * The type of event being delivered.
     *
     * @param EventType|value-of<EventType> $eventType
     */
    public function withEventType(EventType|string $eventType): self
    {
        $self = clone $this;
        $self['eventType'] = $eventType;

        return $self;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withOccurredAt(\DateTimeInterface $occurredAt): self
    {
        $self = clone $this;
        $self['occurredAt'] = $occurredAt;

        return $self;
    }

    /**
     * @param OutboundMessagePayload|array{
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
     *   recordType?: value-of<OutboundMessagePayload\RecordType>|null,
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
     * } $payload
     */
    public function withPayload(OutboundMessagePayload|array $payload): self
    {
        $self = clone $this;
        $self['payload'] = $payload;

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
}
