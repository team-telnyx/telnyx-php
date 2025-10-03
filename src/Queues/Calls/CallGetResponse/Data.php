<?php

declare(strict_types=1);

namespace Telnyx\Queues\Calls\CallGetResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Queues\Calls\CallGetResponse\Data\RecordType;

/**
 * @phpstan-type data_alias = array{
 *   callControlID: string,
 *   callLegID: string,
 *   callSessionID: string,
 *   connectionID: string,
 *   enqueuedAt: string,
 *   from: string,
 *   queueID: string,
 *   queuePosition: int,
 *   recordType: value-of<RecordType>,
 *   to: string,
 *   waitTimeSecs: int,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<data_alias> */
    use SdkModel;

    /**
     * Unique identifier and token for controlling the call.
     */
    #[Api('call_control_id')]
    public string $callControlID;

    /**
     * ID that is unique to the call and can be used to correlate webhook events.
     */
    #[Api('call_leg_id')]
    public string $callLegID;

    /**
     * ID that is unique to the call session and can be used to correlate webhook events. Call session is a group of related call legs that logically belong to the same phone call, e.g. an inbound and outbound leg of a transferred call.
     */
    #[Api('call_session_id')]
    public string $callSessionID;

    /**
     * Call Control App ID (formerly Telnyx connection ID) used in the call.
     */
    #[Api('connection_id')]
    public string $connectionID;

    /**
     * ISO 8601 formatted date of when the call was put in the queue.
     */
    #[Api('enqueued_at')]
    public string $enqueuedAt;

    /**
     * Number or SIP URI placing the call.
     */
    #[Api]
    public string $from;

    /**
     * Unique identifier of the queue the call is in.
     */
    #[Api('queue_id')]
    public string $queueID;

    /**
     * Current position of the call in the queue.
     */
    #[Api('queue_position')]
    public int $queuePosition;

    /** @var value-of<RecordType> $recordType */
    #[Api('record_type', enum: RecordType::class)]
    public string $recordType;

    /**
     * Destination number or SIP URI of the call.
     */
    #[Api]
    public string $to;

    /**
     * The time the call has been waiting in the queue, given in seconds.
     */
    #[Api('wait_time_secs')]
    public int $waitTimeSecs;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(
     *   callControlID: ...,
     *   callLegID: ...,
     *   callSessionID: ...,
     *   connectionID: ...,
     *   enqueuedAt: ...,
     *   from: ...,
     *   queueID: ...,
     *   queuePosition: ...,
     *   recordType: ...,
     *   to: ...,
     *   waitTimeSecs: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)
     *   ->withCallControlID(...)
     *   ->withCallLegID(...)
     *   ->withCallSessionID(...)
     *   ->withConnectionID(...)
     *   ->withEnqueuedAt(...)
     *   ->withFrom(...)
     *   ->withQueueID(...)
     *   ->withQueuePosition(...)
     *   ->withRecordType(...)
     *   ->withTo(...)
     *   ->withWaitTimeSecs(...)
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
     */
    public static function with(
        string $callControlID,
        string $callLegID,
        string $callSessionID,
        string $connectionID,
        string $enqueuedAt,
        string $from,
        string $queueID,
        int $queuePosition,
        RecordType|string $recordType,
        string $to,
        int $waitTimeSecs,
    ): self {
        $obj = new self;

        $obj->callControlID = $callControlID;
        $obj->callLegID = $callLegID;
        $obj->callSessionID = $callSessionID;
        $obj->connectionID = $connectionID;
        $obj->enqueuedAt = $enqueuedAt;
        $obj->from = $from;
        $obj->queueID = $queueID;
        $obj->queuePosition = $queuePosition;
        $obj['recordType'] = $recordType;
        $obj->to = $to;
        $obj->waitTimeSecs = $waitTimeSecs;

        return $obj;
    }

    /**
     * Unique identifier and token for controlling the call.
     */
    public function withCallControlID(string $callControlID): self
    {
        $obj = clone $this;
        $obj->callControlID = $callControlID;

        return $obj;
    }

    /**
     * ID that is unique to the call and can be used to correlate webhook events.
     */
    public function withCallLegID(string $callLegID): self
    {
        $obj = clone $this;
        $obj->callLegID = $callLegID;

        return $obj;
    }

    /**
     * ID that is unique to the call session and can be used to correlate webhook events. Call session is a group of related call legs that logically belong to the same phone call, e.g. an inbound and outbound leg of a transferred call.
     */
    public function withCallSessionID(string $callSessionID): self
    {
        $obj = clone $this;
        $obj->callSessionID = $callSessionID;

        return $obj;
    }

    /**
     * Call Control App ID (formerly Telnyx connection ID) used in the call.
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj->connectionID = $connectionID;

        return $obj;
    }

    /**
     * ISO 8601 formatted date of when the call was put in the queue.
     */
    public function withEnqueuedAt(string $enqueuedAt): self
    {
        $obj = clone $this;
        $obj->enqueuedAt = $enqueuedAt;

        return $obj;
    }

    /**
     * Number or SIP URI placing the call.
     */
    public function withFrom(string $from): self
    {
        $obj = clone $this;
        $obj->from = $from;

        return $obj;
    }

    /**
     * Unique identifier of the queue the call is in.
     */
    public function withQueueID(string $queueID): self
    {
        $obj = clone $this;
        $obj->queueID = $queueID;

        return $obj;
    }

    /**
     * Current position of the call in the queue.
     */
    public function withQueuePosition(int $queuePosition): self
    {
        $obj = clone $this;
        $obj->queuePosition = $queuePosition;

        return $obj;
    }

    /**
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(RecordType|string $recordType): self
    {
        $obj = clone $this;
        $obj['recordType'] = $recordType;

        return $obj;
    }

    /**
     * Destination number or SIP URI of the call.
     */
    public function withTo(string $to): self
    {
        $obj = clone $this;
        $obj->to = $to;

        return $obj;
    }

    /**
     * The time the call has been waiting in the queue, given in seconds.
     */
    public function withWaitTimeSecs(int $waitTimeSecs): self
    {
        $obj = clone $this;
        $obj->waitTimeSecs = $waitTimeSecs;

        return $obj;
    }
}
