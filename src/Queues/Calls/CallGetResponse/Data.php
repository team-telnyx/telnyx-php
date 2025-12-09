<?php

declare(strict_types=1);

namespace Telnyx\Queues\Calls\CallGetResponse;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Queues\Calls\CallGetResponse\Data\RecordType;

/**
 * @phpstan-type DataShape = array{
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
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Unique identifier and token for controlling the call.
     */
    #[Required('call_control_id')]
    public string $callControlID;

    /**
     * ID that is unique to the call and can be used to correlate webhook events.
     */
    #[Required('call_leg_id')]
    public string $callLegID;

    /**
     * ID that is unique to the call session and can be used to correlate webhook events. Call session is a group of related call legs that logically belong to the same phone call, e.g. an inbound and outbound leg of a transferred call.
     */
    #[Required('call_session_id')]
    public string $callSessionID;

    /**
     * Call Control App ID (formerly Telnyx connection ID) used in the call.
     */
    #[Required('connection_id')]
    public string $connectionID;

    /**
     * ISO 8601 formatted date of when the call was put in the queue.
     */
    #[Required('enqueued_at')]
    public string $enqueuedAt;

    /**
     * Number or SIP URI placing the call.
     */
    #[Required]
    public string $from;

    /**
     * Unique identifier of the queue the call is in.
     */
    #[Required('queue_id')]
    public string $queueID;

    /**
     * Current position of the call in the queue.
     */
    #[Required('queue_position')]
    public int $queuePosition;

    /** @var value-of<RecordType> $recordType */
    #[Required('record_type', enum: RecordType::class)]
    public string $recordType;

    /**
     * Destination number or SIP URI of the call.
     */
    #[Required]
    public string $to;

    /**
     * The time the call has been waiting in the queue, given in seconds.
     */
    #[Required('wait_time_secs')]
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
        $self = new self;

        $self['callControlID'] = $callControlID;
        $self['callLegID'] = $callLegID;
        $self['callSessionID'] = $callSessionID;
        $self['connectionID'] = $connectionID;
        $self['enqueuedAt'] = $enqueuedAt;
        $self['from'] = $from;
        $self['queueID'] = $queueID;
        $self['queuePosition'] = $queuePosition;
        $self['recordType'] = $recordType;
        $self['to'] = $to;
        $self['waitTimeSecs'] = $waitTimeSecs;

        return $self;
    }

    /**
     * Unique identifier and token for controlling the call.
     */
    public function withCallControlID(string $callControlID): self
    {
        $self = clone $this;
        $self['callControlID'] = $callControlID;

        return $self;
    }

    /**
     * ID that is unique to the call and can be used to correlate webhook events.
     */
    public function withCallLegID(string $callLegID): self
    {
        $self = clone $this;
        $self['callLegID'] = $callLegID;

        return $self;
    }

    /**
     * ID that is unique to the call session and can be used to correlate webhook events. Call session is a group of related call legs that logically belong to the same phone call, e.g. an inbound and outbound leg of a transferred call.
     */
    public function withCallSessionID(string $callSessionID): self
    {
        $self = clone $this;
        $self['callSessionID'] = $callSessionID;

        return $self;
    }

    /**
     * Call Control App ID (formerly Telnyx connection ID) used in the call.
     */
    public function withConnectionID(string $connectionID): self
    {
        $self = clone $this;
        $self['connectionID'] = $connectionID;

        return $self;
    }

    /**
     * ISO 8601 formatted date of when the call was put in the queue.
     */
    public function withEnqueuedAt(string $enqueuedAt): self
    {
        $self = clone $this;
        $self['enqueuedAt'] = $enqueuedAt;

        return $self;
    }

    /**
     * Number or SIP URI placing the call.
     */
    public function withFrom(string $from): self
    {
        $self = clone $this;
        $self['from'] = $from;

        return $self;
    }

    /**
     * Unique identifier of the queue the call is in.
     */
    public function withQueueID(string $queueID): self
    {
        $self = clone $this;
        $self['queueID'] = $queueID;

        return $self;
    }

    /**
     * Current position of the call in the queue.
     */
    public function withQueuePosition(int $queuePosition): self
    {
        $self = clone $this;
        $self['queuePosition'] = $queuePosition;

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
     * Destination number or SIP URI of the call.
     */
    public function withTo(string $to): self
    {
        $self = clone $this;
        $self['to'] = $to;

        return $self;
    }

    /**
     * The time the call has been waiting in the queue, given in seconds.
     */
    public function withWaitTimeSecs(int $waitTimeSecs): self
    {
        $self = clone $this;
        $self['waitTimeSecs'] = $waitTimeSecs;

        return $self;
    }
}
