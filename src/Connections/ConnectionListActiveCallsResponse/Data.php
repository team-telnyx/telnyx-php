<?php

declare(strict_types=1);

namespace Telnyx\Connections\ConnectionListActiveCallsResponse;

use Telnyx\Connections\ConnectionListActiveCallsResponse\Data\RecordType;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   call_control_id: string,
 *   call_duration: int,
 *   call_leg_id: string,
 *   call_session_id: string,
 *   client_state: string,
 *   record_type: value-of<RecordType>,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Unique identifier and token for controlling the call.
     */
    #[Required]
    public string $call_control_id;

    /**
     * Indicates the duration of the call in seconds.
     */
    #[Required]
    public int $call_duration;

    /**
     * ID that is unique to the call and can be used to correlate webhook events.
     */
    #[Required]
    public string $call_leg_id;

    /**
     * ID that is unique to the call session and can be used to correlate webhook events. Call session is a group of related call legs that logically belong to the same phone call, e.g. an inbound and outbound leg of a transferred call.
     */
    #[Required]
    public string $call_session_id;

    /**
     * State received from a command.
     */
    #[Required]
    public string $client_state;

    /** @var value-of<RecordType> $record_type */
    #[Required(enum: RecordType::class)]
    public string $record_type;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(
     *   call_control_id: ...,
     *   call_duration: ...,
     *   call_leg_id: ...,
     *   call_session_id: ...,
     *   client_state: ...,
     *   record_type: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)
     *   ->withCallControlID(...)
     *   ->withCallDuration(...)
     *   ->withCallLegID(...)
     *   ->withCallSessionID(...)
     *   ->withClientState(...)
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
        int $call_duration,
        string $call_leg_id,
        string $call_session_id,
        string $client_state,
        RecordType|string $record_type,
    ): self {
        $obj = new self;

        $obj['call_control_id'] = $call_control_id;
        $obj['call_duration'] = $call_duration;
        $obj['call_leg_id'] = $call_leg_id;
        $obj['call_session_id'] = $call_session_id;
        $obj['client_state'] = $client_state;
        $obj['record_type'] = $record_type;

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
     * Indicates the duration of the call in seconds.
     */
    public function withCallDuration(int $callDuration): self
    {
        $obj = clone $this;
        $obj['call_duration'] = $callDuration;

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
     * State received from a command.
     */
    public function withClientState(string $clientState): self
    {
        $obj = clone $this;
        $obj['client_state'] = $clientState;

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
}
