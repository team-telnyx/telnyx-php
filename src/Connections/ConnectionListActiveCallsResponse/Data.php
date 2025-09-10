<?php

declare(strict_types=1);

namespace Telnyx\Connections\ConnectionListActiveCallsResponse;

use Telnyx\Connections\ConnectionListActiveCallsResponse\Data\RecordType;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type data_alias = array{
 *   callControlID: string,
 *   callDuration: int,
 *   callLegID: string,
 *   callSessionID: string,
 *   clientState: string,
 *   recordType: value-of<RecordType>,
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
     * Indicates the duration of the call in seconds.
     */
    #[Api('call_duration')]
    public int $callDuration;

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
     * State received from a command.
     */
    #[Api('client_state')]
    public string $clientState;

    /** @var value-of<RecordType> $recordType */
    #[Api('record_type', enum: RecordType::class)]
    public string $recordType;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(
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
        $obj = new self;

        $obj->callControlID = $callControlID;
        $obj->callDuration = $callDuration;
        $obj->callLegID = $callLegID;
        $obj->callSessionID = $callSessionID;
        $obj->clientState = $clientState;
        $obj->recordType = $recordType instanceof RecordType ? $recordType->value : $recordType;

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
     * Indicates the duration of the call in seconds.
     */
    public function withCallDuration(int $callDuration): self
    {
        $obj = clone $this;
        $obj->callDuration = $callDuration;

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
     * State received from a command.
     */
    public function withClientState(string $clientState): self
    {
        $obj = clone $this;
        $obj->clientState = $clientState;

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
}
