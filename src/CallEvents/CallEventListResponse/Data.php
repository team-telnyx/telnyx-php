<?php

declare(strict_types=1);

namespace Telnyx\CallEvents\CallEventListResponse;

use Telnyx\CallEvents\CallEventListResponse\Data\RecordType;
use Telnyx\CallEvents\CallEventListResponse\Data\Type;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type data_alias = array{
 *   callLegID: string,
 *   callSessionID: string,
 *   eventTimestamp: string,
 *   metadata: mixed,
 *   name: string,
 *   recordType: value-of<RecordType>,
 *   type: value-of<Type>,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<data_alias> */
    use SdkModel;

    /**
     * Uniquely identifies an individual call leg.
     */
    #[Api('call_leg_id')]
    public string $callLegID;

    /**
     * Uniquely identifies the call control session. A session may include multiple call leg events.
     */
    #[Api('call_session_id')]
    public string $callSessionID;

    /**
     * Event timestamp.
     */
    #[Api('event_timestamp')]
    public string $eventTimestamp;

    /**
     * Event metadata, which includes raw event, and extra information based on event type.
     */
    #[Api]
    public mixed $metadata;

    /**
     * Event name.
     */
    #[Api]
    public string $name;

    /** @var value-of<RecordType> $recordType */
    #[Api('record_type', enum: RecordType::class)]
    public string $recordType;

    /**
     * Event type.
     *
     * @var value-of<Type> $type
     */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(
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
     * (new Data)
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
     * @param RecordType|value-of<RecordType> $recordType
     * @param Type|value-of<Type> $type
     */
    public static function with(
        string $callLegID,
        string $callSessionID,
        string $eventTimestamp,
        mixed $metadata,
        string $name,
        RecordType|string $recordType,
        Type|string $type,
    ): self {
        $obj = new self;

        $obj->callLegID = $callLegID;
        $obj->callSessionID = $callSessionID;
        $obj->eventTimestamp = $eventTimestamp;
        $obj->metadata = $metadata;
        $obj->name = $name;
        $obj->recordType = $recordType instanceof RecordType ? $recordType->value : $recordType;
        $obj->type = $type instanceof Type ? $type->value : $type;

        return $obj;
    }

    /**
     * Uniquely identifies an individual call leg.
     */
    public function withCallLegID(string $callLegID): self
    {
        $obj = clone $this;
        $obj->callLegID = $callLegID;

        return $obj;
    }

    /**
     * Uniquely identifies the call control session. A session may include multiple call leg events.
     */
    public function withCallSessionID(string $callSessionID): self
    {
        $obj = clone $this;
        $obj->callSessionID = $callSessionID;

        return $obj;
    }

    /**
     * Event timestamp.
     */
    public function withEventTimestamp(string $eventTimestamp): self
    {
        $obj = clone $this;
        $obj->eventTimestamp = $eventTimestamp;

        return $obj;
    }

    /**
     * Event metadata, which includes raw event, and extra information based on event type.
     */
    public function withMetadata(mixed $metadata): self
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
        $obj->recordType = $recordType instanceof RecordType ? $recordType->value : $recordType;

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
        $obj->type = $type instanceof Type ? $type->value : $type;

        return $obj;
    }
}
