<?php

declare(strict_types=1);

namespace Telnyx\Calls\CallGetStatusResponse;

use Telnyx\Calls\CallGetStatusResponse\Data\RecordType;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   callControlID: string,
 *   callLegID: string,
 *   callSessionID: string,
 *   isAlive: bool,
 *   recordType: value-of<RecordType>,
 *   callDuration?: int,
 *   clientState?: string,
 *   endTime?: string,
 *   startTime?: string,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
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
     * Indicates whether the call is alive or not. For Dial command it will always be `false` (dialing is asynchronous).
     */
    #[Api('is_alive')]
    public bool $isAlive;

    /** @var value-of<RecordType> $recordType */
    #[Api('record_type', enum: RecordType::class)]
    public string $recordType;

    /**
     * Indicates the duration of the call in seconds.
     */
    #[Api('call_duration', optional: true)]
    public ?int $callDuration;

    /**
     * State received from a command.
     */
    #[Api('client_state', optional: true)]
    public ?string $clientState;

    /**
     * ISO 8601 formatted date indicating when the call ended. Only present when the call is not alive.
     */
    #[Api('end_time', optional: true)]
    public ?string $endTime;

    /**
     * ISO 8601 formatted date indicating when the call started.
     */
    #[Api('start_time', optional: true)]
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
        ?string $startTime = null,
    ): self {
        $obj = new self;

        $obj->callControlID = $callControlID;
        $obj->callLegID = $callLegID;
        $obj->callSessionID = $callSessionID;
        $obj->isAlive = $isAlive;
        $obj['recordType'] = $recordType;

        null !== $callDuration && $obj->callDuration = $callDuration;
        null !== $clientState && $obj->clientState = $clientState;
        null !== $endTime && $obj->endTime = $endTime;
        null !== $startTime && $obj->startTime = $startTime;

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
     * Indicates whether the call is alive or not. For Dial command it will always be `false` (dialing is asynchronous).
     */
    public function withIsAlive(bool $isAlive): self
    {
        $obj = clone $this;
        $obj->isAlive = $isAlive;

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
     * Indicates the duration of the call in seconds.
     */
    public function withCallDuration(int $callDuration): self
    {
        $obj = clone $this;
        $obj->callDuration = $callDuration;

        return $obj;
    }

    /**
     * State received from a command.
     */
    public function withClientState(string $clientState): self
    {
        $obj = clone $this;
        $obj->clientState = $clientState;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the call ended. Only present when the call is not alive.
     */
    public function withEndTime(string $endTime): self
    {
        $obj = clone $this;
        $obj->endTime = $endTime;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the call started.
     */
    public function withStartTime(string $startTime): self
    {
        $obj = clone $this;
        $obj->startTime = $startTime;

        return $obj;
    }
}
