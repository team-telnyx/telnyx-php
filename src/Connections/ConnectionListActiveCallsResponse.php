<?php

declare(strict_types=1);

namespace Telnyx\Connections;

use Telnyx\Connections\ConnectionListActiveCallsResponse\RecordType;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ConnectionListActiveCallsResponseShape = array{
 *   callControlID: string,
 *   callDuration: int,
 *   callLegID: string,
 *   callSessionID: string,
 *   clientState: string,
 *   recordType: value-of<RecordType>,
 * }
 */
final class ConnectionListActiveCallsResponse implements BaseModel
{
    /** @use SdkModel<ConnectionListActiveCallsResponseShape> */
    use SdkModel;

    /**
     * Unique identifier and token for controlling the call.
     */
    #[Required('call_control_id')]
    public string $callControlID;

    /**
     * Indicates the duration of the call in seconds.
     */
    #[Required('call_duration')]
    public int $callDuration;

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
     * State received from a command.
     */
    #[Required('client_state')]
    public string $clientState;

    /** @var value-of<RecordType> $recordType */
    #[Required('record_type', enum: RecordType::class)]
    public string $recordType;

    /**
     * `new ConnectionListActiveCallsResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ConnectionListActiveCallsResponse::with(
     *   callControlID: ...,
     *   callDuration: ...,
     *   callLegID: ...,
     *   callSessionID: ...,
     *   clientState: ...,
     *   recordType: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ConnectionListActiveCallsResponse)
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
     * @param RecordType|value-of<RecordType> $recordType
     */
    public static function with(
        string $callControlID,
        int $callDuration,
        string $callLegID,
        string $callSessionID,
        string $clientState,
        RecordType|string $recordType,
    ): self {
        $self = new self;

        $self['callControlID'] = $callControlID;
        $self['callDuration'] = $callDuration;
        $self['callLegID'] = $callLegID;
        $self['callSessionID'] = $callSessionID;
        $self['clientState'] = $clientState;
        $self['recordType'] = $recordType;

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
     * Indicates the duration of the call in seconds.
     */
    public function withCallDuration(int $callDuration): self
    {
        $self = clone $this;
        $self['callDuration'] = $callDuration;

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
     * State received from a command.
     */
    public function withClientState(string $clientState): self
    {
        $self = clone $this;
        $self['clientState'] = $clientState;

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
}
