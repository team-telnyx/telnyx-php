<?php

declare(strict_types=1);

namespace Telnyx\EmailBlocks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\EmailBlocks\EmailBlockGetEventsResponse\EventType;
use Telnyx\EmailBlocks\EmailBlockGetEventsResponse\RecordType;

/**
 * @phpstan-type EmailBlockGetEventsResponseShape = array{
 *   id: string,
 *   actor: string,
 *   eventType: EventType|value-of<EventType>,
 *   occurredAt: \DateTimeInterface,
 *   reason: string,
 *   recordType: RecordType|value-of<RecordType>,
 *   source: string,
 *   meta?: array<string,mixed>|null,
 * }
 */
final class EmailBlockGetEventsResponse implements BaseModel
{
    /** @use SdkModel<EmailBlockGetEventsResponseShape> */
    use SdkModel;

    #[Required]
    public string $id;

    /**
     * Free-text (`user_id`/`org_id`/`api_key`/`dev_bypass`/`system`/`manual`).
     */
    #[Required]
    public string $actor;

    /** @var value-of<EventType> $eventType */
    #[Required('event_type', enum: EventType::class)]
    public string $eventType;

    #[Required('occurred_at')]
    public \DateTimeInterface $occurredAt;

    /**
     * Free-text snapshot of the block's reason at event time.
     */
    #[Required]
    public string $reason;

    /**
     * View-only.
     *
     * @var value-of<RecordType> $recordType
     */
    #[Required('record_type', enum: RecordType::class)]
    public string $recordType;

    /**
     * Free-text snapshot of the block's source at event time.
     */
    #[Required]
    public string $source;

    /**
     * `null` when the schema field is nil (the context usually sets it to `{}`).
     *
     * @var array<string,mixed>|null $meta
     */
    #[Optional(map: 'mixed', nullable: true)]
    public ?array $meta;

    /**
     * `new EmailBlockGetEventsResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EmailBlockGetEventsResponse::with(
     *   id: ...,
     *   actor: ...,
     *   eventType: ...,
     *   occurredAt: ...,
     *   reason: ...,
     *   recordType: ...,
     *   source: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EmailBlockGetEventsResponse)
     *   ->withID(...)
     *   ->withActor(...)
     *   ->withEventType(...)
     *   ->withOccurredAt(...)
     *   ->withReason(...)
     *   ->withRecordType(...)
     *   ->withSource(...)
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
     *
     * @param EventType|value-of<EventType> $eventType
     * @param RecordType|value-of<RecordType> $recordType
     * @param array<string,mixed>|null $meta
     */
    public static function with(
        string $id,
        string $actor,
        EventType|string $eventType,
        \DateTimeInterface $occurredAt,
        string $reason,
        RecordType|string $recordType,
        string $source,
        ?array $meta = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['actor'] = $actor;
        $self['eventType'] = $eventType;
        $self['occurredAt'] = $occurredAt;
        $self['reason'] = $reason;
        $self['recordType'] = $recordType;
        $self['source'] = $source;

        null !== $meta && $self['meta'] = $meta;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Free-text (`user_id`/`org_id`/`api_key`/`dev_bypass`/`system`/`manual`).
     */
    public function withActor(string $actor): self
    {
        $self = clone $this;
        $self['actor'] = $actor;

        return $self;
    }

    /**
     * @param EventType|value-of<EventType> $eventType
     */
    public function withEventType(EventType|string $eventType): self
    {
        $self = clone $this;
        $self['eventType'] = $eventType;

        return $self;
    }

    public function withOccurredAt(\DateTimeInterface $occurredAt): self
    {
        $self = clone $this;
        $self['occurredAt'] = $occurredAt;

        return $self;
    }

    /**
     * Free-text snapshot of the block's reason at event time.
     */
    public function withReason(string $reason): self
    {
        $self = clone $this;
        $self['reason'] = $reason;

        return $self;
    }

    /**
     * View-only.
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
     * Free-text snapshot of the block's source at event time.
     */
    public function withSource(string $source): self
    {
        $self = clone $this;
        $self['source'] = $source;

        return $self;
    }

    /**
     * `null` when the schema field is nil (the context usually sets it to `{}`).
     *
     * @param array<string,mixed>|null $meta
     */
    public function withMeta(?array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
