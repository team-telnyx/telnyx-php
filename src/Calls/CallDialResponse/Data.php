<?php

declare(strict_types=1);

namespace Telnyx\Calls\CallDialResponse;

use Telnyx\Calls\CallDialResponse\Data\RecordType;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   callControlID: string,
 *   callLegID: string,
 *   callSessionID: string,
 *   isAlive: bool,
 *   recordType: value-of<RecordType>,
 *   callDuration?: int|null,
 *   clientState?: string|null,
 *   endTime?: string|null,
 *   recordingID?: string|null,
 *   startTime?: string|null,
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
     * Indicates whether the call is alive or not. For Dial command it will always be `false` (dialing is asynchronous).
     */
    #[Required('is_alive')]
    public bool $isAlive;

    /** @var value-of<RecordType> $recordType */
    #[Required('record_type', enum: RecordType::class)]
    public string $recordType;

    /**
     * Indicates the duration of the call in seconds.
     */
    #[Optional('call_duration')]
    public ?int $callDuration;

    /**
     * State received from a command.
     */
    #[Optional('client_state')]
    public ?string $clientState;

    /**
     * ISO 8601 formatted date indicating when the call ended. Only present when the call is not alive.
     */
    #[Optional('end_time')]
    public ?string $endTime;

    /**
     * The ID of the recording. Only present when the record parameter is set to record-from-answer.
     */
    #[Optional('recording_id')]
    public ?string $recordingID;

    /**
     * ISO 8601 formatted date indicating when the call started.
     */
    #[Optional('start_time')]
    public ?string $startTime;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(
     *   callControlID: ...,
     *   callLegID: ...,
     *   callSessionID: ...,
     *   isAlive: ...,
     *   recordType: ...,
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
     * @param RecordType|value-of<RecordType> $recordType
     */
    public static function with(
        string $callControlID,
        string $callLegID,
        string $callSessionID,
        bool $isAlive,
        RecordType|string $recordType,
        ?int $callDuration = null,
        ?string $clientState = null,
        ?string $endTime = null,
        ?string $recordingID = null,
        ?string $startTime = null,
    ): self {
        $self = new self;

        $self['callControlID'] = $callControlID;
        $self['callLegID'] = $callLegID;
        $self['callSessionID'] = $callSessionID;
        $self['isAlive'] = $isAlive;
        $self['recordType'] = $recordType;

        null !== $callDuration && $self['callDuration'] = $callDuration;
        null !== $clientState && $self['clientState'] = $clientState;
        null !== $endTime && $self['endTime'] = $endTime;
        null !== $recordingID && $self['recordingID'] = $recordingID;
        null !== $startTime && $self['startTime'] = $startTime;

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
     * Indicates whether the call is alive or not. For Dial command it will always be `false` (dialing is asynchronous).
     */
    public function withIsAlive(bool $isAlive): self
    {
        $self = clone $this;
        $self['isAlive'] = $isAlive;

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
     * Indicates the duration of the call in seconds.
     */
    public function withCallDuration(int $callDuration): self
    {
        $self = clone $this;
        $self['callDuration'] = $callDuration;

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
     * ISO 8601 formatted date indicating when the call ended. Only present when the call is not alive.
     */
    public function withEndTime(string $endTime): self
    {
        $self = clone $this;
        $self['endTime'] = $endTime;

        return $self;
    }

    /**
     * The ID of the recording. Only present when the record parameter is set to record-from-answer.
     */
    public function withRecordingID(string $recordingID): self
    {
        $self = clone $this;
        $self['recordingID'] = $recordingID;

        return $self;
    }

    /**
     * ISO 8601 formatted date indicating when the call started.
     */
    public function withStartTime(string $startTime): self
    {
        $self = clone $this;
        $self['startTime'] = $startTime;

        return $self;
    }
}
