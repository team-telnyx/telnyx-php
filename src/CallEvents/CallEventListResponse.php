<?php

declare(strict_types=1);

namespace Telnyx\CallEvents;

use Telnyx\CallEvents\CallEventListResponse\RecordType;
use Telnyx\CallEvents\CallEventListResponse\Type;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type CallEventListResponseShape = array{
 *   call_leg_id: string,
 *   call_session_id: string,
 *   event_timestamp: string,
 *   metadata: array<string,mixed>,
 *   name: string,
 *   record_type: value-of<RecordType>,
 *   type: value-of<Type>,
 * }
 */
final class CallEventListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<CallEventListResponseShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * Uniquely identifies an individual call leg.
     */
    #[Api]
    public string $call_leg_id;

    /**
     * Uniquely identifies the call control session. A session may include multiple call leg events.
     */
    #[Api]
    public string $call_session_id;

    /**
     * Event timestamp.
     */
    #[Api]
    public string $event_timestamp;

    /**
     * Event metadata, which includes raw event, and extra information based on event type.
     *
     * @var array<string,mixed> $metadata
     */
    #[Api(map: 'mixed')]
    public array $metadata;

    /**
     * Event name.
     */
    #[Api]
    public string $name;

    /** @var value-of<RecordType> $record_type */
    #[Api(enum: RecordType::class)]
    public string $record_type;

    /**
     * Event type.
     *
     * @var value-of<Type> $type
     */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * `new CallEventListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CallEventListResponse::with(
     *   call_leg_id: ...,
     *   call_session_id: ...,
     *   event_timestamp: ...,
     *   metadata: ...,
     *   name: ...,
     *   record_type: ...,
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
     * @param RecordType|value-of<RecordType> $record_type
     * @param Type|value-of<Type> $type
     */
    public static function with(
        string $call_leg_id,
        string $call_session_id,
        string $event_timestamp,
        array $metadata,
        string $name,
        RecordType|string $record_type,
        Type|string $type,
    ): self {
        $obj = new self;

        $obj->call_leg_id = $call_leg_id;
        $obj->call_session_id = $call_session_id;
        $obj->event_timestamp = $event_timestamp;
        $obj->metadata = $metadata;
        $obj->name = $name;
        $obj['record_type'] = $record_type;
        $obj['type'] = $type;

        return $obj;
    }

    /**
     * Uniquely identifies an individual call leg.
     */
    public function withCallLegID(string $callLegID): self
    {
        $obj = clone $this;
        $obj->call_leg_id = $callLegID;

        return $obj;
    }

    /**
     * Uniquely identifies the call control session. A session may include multiple call leg events.
     */
    public function withCallSessionID(string $callSessionID): self
    {
        $obj = clone $this;
        $obj->call_session_id = $callSessionID;

        return $obj;
    }

    /**
     * Event timestamp.
     */
    public function withEventTimestamp(string $eventTimestamp): self
    {
        $obj = clone $this;
        $obj->event_timestamp = $eventTimestamp;

        return $obj;
    }

    /**
     * Event metadata, which includes raw event, and extra information based on event type.
     *
     * @param array<string,mixed> $metadata
     */
    public function withMetadata(array $metadata): self
    {
        $obj = clone $this;
        $obj->metadata = $metadata;

        return $obj;
    }

    /**
     * Event name.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(RecordType|string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }

    /**
     * Event type.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }
}
