<?php

declare(strict_types=1);

namespace Telnyx\Queues\Calls;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\Queues\Calls\CallListResponse\RecordType;

/**
 * @phpstan-type CallListResponseShape = array{
 *   call_control_id: string,
 *   call_leg_id: string,
 *   call_session_id: string,
 *   connection_id: string,
 *   enqueued_at: string,
 *   from: string,
 *   queue_id: string,
 *   queue_position: int,
 *   record_type: value-of<RecordType>,
 *   to: string,
 *   wait_time_secs: int,
 * }
 */
final class CallListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<CallListResponseShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * Unique identifier and token for controlling the call.
     */
    #[Api]
    public string $call_control_id;

    /**
     * ID that is unique to the call and can be used to correlate webhook events.
     */
    #[Api]
    public string $call_leg_id;

    /**
     * ID that is unique to the call session and can be used to correlate webhook events. Call session is a group of related call legs that logically belong to the same phone call, e.g. an inbound and outbound leg of a transferred call.
     */
    #[Api]
    public string $call_session_id;

    /**
     * Call Control App ID (formerly Telnyx connection ID) used in the call.
     */
    #[Api]
    public string $connection_id;

    /**
     * ISO 8601 formatted date of when the call was put in the queue.
     */
    #[Api]
    public string $enqueued_at;

    /**
     * Number or SIP URI placing the call.
     */
    #[Api]
    public string $from;

    /**
     * Unique identifier of the queue the call is in.
     */
    #[Api]
    public string $queue_id;

    /**
     * Current position of the call in the queue.
     */
    #[Api]
    public int $queue_position;

    /** @var value-of<RecordType> $record_type */
    #[Api(enum: RecordType::class)]
    public string $record_type;

    /**
     * Destination number or SIP URI of the call.
     */
    #[Api]
    public string $to;

    /**
     * The time the call has been waiting in the queue, given in seconds.
     */
    #[Api]
    public int $wait_time_secs;

    /**
     * `new CallListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CallListResponse::with(
     *   call_control_id: ...,
     *   call_leg_id: ...,
     *   call_session_id: ...,
     *   connection_id: ...,
     *   enqueued_at: ...,
     *   from: ...,
     *   queue_id: ...,
     *   queue_position: ...,
     *   record_type: ...,
     *   to: ...,
     *   wait_time_secs: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CallListResponse)
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
     * @param RecordType|value-of<RecordType> $record_type
     */
    public static function with(
        string $call_control_id,
        string $call_leg_id,
        string $call_session_id,
        string $connection_id,
        string $enqueued_at,
        string $from,
        string $queue_id,
        int $queue_position,
        RecordType|string $record_type,
        string $to,
        int $wait_time_secs,
    ): self {
        $obj = new self;

        $obj->call_control_id = $call_control_id;
        $obj->call_leg_id = $call_leg_id;
        $obj->call_session_id = $call_session_id;
        $obj->connection_id = $connection_id;
        $obj->enqueued_at = $enqueued_at;
        $obj->from = $from;
        $obj->queue_id = $queue_id;
        $obj->queue_position = $queue_position;
        $obj['record_type'] = $record_type;
        $obj->to = $to;
        $obj->wait_time_secs = $wait_time_secs;

        return $obj;
    }

    /**
     * Unique identifier and token for controlling the call.
     */
    public function withCallControlID(string $callControlID): self
    {
        $obj = clone $this;
        $obj->call_control_id = $callControlID;

        return $obj;
    }

    /**
     * ID that is unique to the call and can be used to correlate webhook events.
     */
    public function withCallLegID(string $callLegID): self
    {
        $obj = clone $this;
        $obj->call_leg_id = $callLegID;

        return $obj;
    }

    /**
     * ID that is unique to the call session and can be used to correlate webhook events. Call session is a group of related call legs that logically belong to the same phone call, e.g. an inbound and outbound leg of a transferred call.
     */
    public function withCallSessionID(string $callSessionID): self
    {
        $obj = clone $this;
        $obj->call_session_id = $callSessionID;

        return $obj;
    }

    /**
     * Call Control App ID (formerly Telnyx connection ID) used in the call.
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj->connection_id = $connectionID;

        return $obj;
    }

    /**
     * ISO 8601 formatted date of when the call was put in the queue.
     */
    public function withEnqueuedAt(string $enqueuedAt): self
    {
        $obj = clone $this;
        $obj->enqueued_at = $enqueuedAt;

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
        $obj->queue_id = $queueID;

        return $obj;
    }

    /**
     * Current position of the call in the queue.
     */
    public function withQueuePosition(int $queuePosition): self
    {
        $obj = clone $this;
        $obj->queue_position = $queuePosition;

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
        $obj->wait_time_secs = $waitTimeSecs;

        return $obj;
    }
}
