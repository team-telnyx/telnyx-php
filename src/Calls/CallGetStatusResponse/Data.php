<?php

declare(strict_types=1);

namespace Telnyx\Calls\CallGetStatusResponse;

use Telnyx\Calls\CallGetStatusResponse\Data\RecordType;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   call_control_id: string,
 *   call_leg_id: string,
 *   call_session_id: string,
 *   is_alive: bool,
 *   record_type: value-of<RecordType>,
 *   call_duration?: int|null,
 *   client_state?: string|null,
 *   end_time?: string|null,
 *   start_time?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

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
     * Indicates whether the call is alive or not. For Dial command it will always be `false` (dialing is asynchronous).
     */
    #[Api]
    public bool $is_alive;

    /** @var value-of<RecordType> $record_type */
    #[Api(enum: RecordType::class)]
    public string $record_type;

    /**
     * Indicates the duration of the call in seconds.
     */
    #[Api(optional: true)]
    public ?int $call_duration;

    /**
     * State received from a command.
     */
    #[Api(optional: true)]
    public ?string $client_state;

    /**
     * ISO 8601 formatted date indicating when the call ended. Only present when the call is not alive.
     */
    #[Api(optional: true)]
    public ?string $end_time;

    /**
     * ISO 8601 formatted date indicating when the call started.
     */
    #[Api(optional: true)]
    public ?string $start_time;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(
     *   call_control_id: ...,
     *   call_leg_id: ...,
     *   call_session_id: ...,
     *   is_alive: ...,
     *   record_type: ...,
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
     *   ->withIsAlive(...)
     *   ->withRecordType(...)
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
        bool $is_alive,
        RecordType|string $record_type,
        ?int $call_duration = null,
        ?string $client_state = null,
        ?string $end_time = null,
        ?string $start_time = null,
    ): self {
        $obj = new self;

        $obj['call_control_id'] = $call_control_id;
        $obj['call_leg_id'] = $call_leg_id;
        $obj['call_session_id'] = $call_session_id;
        $obj['is_alive'] = $is_alive;
        $obj['record_type'] = $record_type;

        null !== $call_duration && $obj['call_duration'] = $call_duration;
        null !== $client_state && $obj['client_state'] = $client_state;
        null !== $end_time && $obj['end_time'] = $end_time;
        null !== $start_time && $obj['start_time'] = $start_time;

        return $obj;
    }

    /**
     * Unique identifier and token for controlling the call.
     */
    public function withCallControlID(string $callControlID): self
    {
        $obj = clone $this;
        $obj['call_control_id'] = $callControlID;

        return $obj;
    }

    /**
     * ID that is unique to the call and can be used to correlate webhook events.
     */
    public function withCallLegID(string $callLegID): self
    {
        $obj = clone $this;
        $obj['call_leg_id'] = $callLegID;

        return $obj;
    }

    /**
     * ID that is unique to the call session and can be used to correlate webhook events. Call session is a group of related call legs that logically belong to the same phone call, e.g. an inbound and outbound leg of a transferred call.
     */
    public function withCallSessionID(string $callSessionID): self
    {
        $obj = clone $this;
        $obj['call_session_id'] = $callSessionID;

        return $obj;
    }

    /**
     * Indicates whether the call is alive or not. For Dial command it will always be `false` (dialing is asynchronous).
     */
    public function withIsAlive(bool $isAlive): self
    {
        $obj = clone $this;
        $obj['is_alive'] = $isAlive;

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
     * Indicates the duration of the call in seconds.
     */
    public function withCallDuration(int $callDuration): self
    {
        $obj = clone $this;
        $obj['call_duration'] = $callDuration;

        return $obj;
    }

    /**
     * State received from a command.
     */
    public function withClientState(string $clientState): self
    {
        $obj = clone $this;
        $obj['client_state'] = $clientState;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the call ended. Only present when the call is not alive.
     */
    public function withEndTime(string $endTime): self
    {
        $obj = clone $this;
        $obj['end_time'] = $endTime;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the call started.
     */
    public function withStartTime(string $startTime): self
    {
        $obj = clone $this;
        $obj['start_time'] = $startTime;

        return $obj;
    }
}
