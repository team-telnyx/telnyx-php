<?php

declare(strict_types=1);

namespace Telnyx\CallEvents;

use Telnyx\CallEvents\CallEventListResponse\RecordType;
use Telnyx\CallEvents\CallEventListResponse\Type;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type CallEventListResponseShape = array{
 *   callLegID: string,
 *   callSessionID: string,
 *   eventTimestamp: string,
 *   metadata: array<string,mixed>,
 *   name: string,
 *   recordType: RecordType|value-of<RecordType>,
 *   type: Type|value-of<Type>,
 * }
 */
final class CallEventListResponse implements BaseModel
{
    /** @use SdkModel<CallEventListResponseShape> */
    use SdkModel;

    /**
     * Uniquely identifies an individual call leg.
     */
    #[Required('call_leg_id')]
    public string $callLegID;

    /**
     * Uniquely identifies the call control session. A session may include multiple call leg events.
     */
    #[Required('call_session_id')]
    public string $callSessionID;

    /**
     * Event timestamp.
     */
    #[Required('event_timestamp')]
    public string $eventTimestamp;

    /**
     * Event metadata, which includes raw event, and extra information based on event type.
     *
     * @var array<string,mixed> $metadata
     */
    #[Required(map: 'mixed')]
    public array $metadata;

    /**
     * Event name.
     */
    #[Required]
    public string $name;

    /** @var value-of<RecordType> $recordType */
    #[Required('record_type', enum: RecordType::class)]
    public string $recordType;

    /**
     * Event type.
     *
     * @var value-of<Type> $type
     */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * `new CallEventListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CallEventListResponse::with(
     *   callLegID: ...,
     *   callSessionID: ...,
     *   eventTimestamp: ...,
     *   metadata: ...,
     *   name: ...,
     *   recordType: ...,
     *   type: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CallEventListResponse)
     *   ->withCallLegID(...)
     *   ->withCallSessionID(...)
     *   ->withEventTimestamp(...)
     *   ->withMetadata(...)
     *   ->withName(...)
     *   ->withRecordType(...)
     *   ->withType(...)
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
     * @param array<string,mixed> $metadata
     * @param RecordType|value-of<RecordType> $recordType
     * @param Type|value-of<Type> $type
     */
    public static function with(
        string $callLegID,
        string $callSessionID,
        string $eventTimestamp,
        array $metadata,
        string $name,
        RecordType|string $recordType,
        Type|string $type,
    ): self {
        $self = new self;

        $self['callLegID'] = $callLegID;
        $self['callSessionID'] = $callSessionID;
        $self['eventTimestamp'] = $eventTimestamp;
        $self['metadata'] = $metadata;
        $self['name'] = $name;
        $self['recordType'] = $recordType;
        $self['type'] = $type;

        return $self;
    }

    /**
     * Uniquely identifies an individual call leg.
     */
    public function withCallLegID(string $callLegID): self
    {
        $self = clone $this;
        $self['callLegID'] = $callLegID;

        return $self;
    }

    /**
     * Uniquely identifies the call control session. A session may include multiple call leg events.
     */
    public function withCallSessionID(string $callSessionID): self
    {
        $self = clone $this;
        $self['callSessionID'] = $callSessionID;

        return $self;
    }

    /**
     * Event timestamp.
     */
    public function withEventTimestamp(string $eventTimestamp): self
    {
        $self = clone $this;
        $self['eventTimestamp'] = $eventTimestamp;

        return $self;
    }

    /**
     * Event metadata, which includes raw event, and extra information based on event type.
     *
     * @param array<string,mixed> $metadata
     */
    public function withMetadata(array $metadata): self
    {
        $self = clone $this;
        $self['metadata'] = $metadata;

        return $self;
    }

    /**
     * Event name.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(RecordType|string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * Event type.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
