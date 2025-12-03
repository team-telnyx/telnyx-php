<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallStreamingFailed;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\CallStreamingFailed\Payload\StreamParams;
use Telnyx\Webhooks\CallStreamingFailed\Payload\StreamType;

/**
 * @phpstan-type PayloadShape = array{
 *   call_control_id?: string|null,
 *   call_leg_id?: string|null,
 *   call_session_id?: string|null,
 *   client_state?: string|null,
 *   connection_id?: string|null,
 *   failure_reason?: string|null,
 *   stream_id?: string|null,
 *   stream_params?: StreamParams|null,
 *   stream_type?: value-of<StreamType>|null,
 * }
 */
final class Payload implements BaseModel
{
    /** @use SdkModel<PayloadShape> */
    use SdkModel;

    /**
     * Call ID used to issue commands via Call Control API.
     */
    #[Api(optional: true)]
    public ?string $call_control_id;

    /**
     * ID that is unique to the call and can be used to correlate webhook events.
     */
    #[Api(optional: true)]
    public ?string $call_leg_id;

    /**
     * ID that is unique to the call session and can be used to correlate webhook events. Call session is a group of related call legs that logically belong to the same phone call, e.g. an inbound and outbound leg of a transferred call.
     */
    #[Api(optional: true)]
    public ?string $call_session_id;

    /**
     * State received from a command.
     */
    #[Api(optional: true)]
    public ?string $client_state;

    /**
     * Call Control App ID (formerly Telnyx connection ID) used in the call.
     */
    #[Api(optional: true)]
    public ?string $connection_id;

    /**
     * A short description explaning why the media streaming failed.
     */
    #[Api(optional: true)]
    public ?string $failure_reason;

    /**
     * Identifies the streaming.
     */
    #[Api(optional: true)]
    public ?string $stream_id;

    /**
     * Streaming parameters as they were originally given to the Call Control API.
     */
    #[Api(optional: true)]
    public ?StreamParams $stream_params;

    /**
     * The type of stream connection the stream is performing.
     *
     * @var value-of<StreamType>|null $stream_type
     */
    #[Api(enum: StreamType::class, optional: true)]
    public ?string $stream_type;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param StreamType|value-of<StreamType> $stream_type
     */
    public static function with(
        ?string $call_control_id = null,
        ?string $call_leg_id = null,
        ?string $call_session_id = null,
        ?string $client_state = null,
        ?string $connection_id = null,
        ?string $failure_reason = null,
        ?string $stream_id = null,
        ?StreamParams $stream_params = null,
        StreamType|string|null $stream_type = null,
    ): self {
        $obj = new self;

        null !== $call_control_id && $obj->call_control_id = $call_control_id;
        null !== $call_leg_id && $obj->call_leg_id = $call_leg_id;
        null !== $call_session_id && $obj->call_session_id = $call_session_id;
        null !== $client_state && $obj->client_state = $client_state;
        null !== $connection_id && $obj->connection_id = $connection_id;
        null !== $failure_reason && $obj->failure_reason = $failure_reason;
        null !== $stream_id && $obj->stream_id = $stream_id;
        null !== $stream_params && $obj->stream_params = $stream_params;
        null !== $stream_type && $obj['stream_type'] = $stream_type;

        return $obj;
    }

    /**
     * Call ID used to issue commands via Call Control API.
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
     * State received from a command.
     */
    public function withClientState(string $clientState): self
    {
        $obj = clone $this;
        $obj->client_state = $clientState;

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
     * A short description explaning why the media streaming failed.
     */
    public function withFailureReason(string $failureReason): self
    {
        $obj = clone $this;
        $obj->failure_reason = $failureReason;

        return $obj;
    }

    /**
     * Identifies the streaming.
     */
    public function withStreamID(string $streamID): self
    {
        $obj = clone $this;
        $obj->stream_id = $streamID;

        return $obj;
    }

    /**
     * Streaming parameters as they were originally given to the Call Control API.
     */
    public function withStreamParams(StreamParams $streamParams): self
    {
        $obj = clone $this;
        $obj->stream_params = $streamParams;

        return $obj;
    }

    /**
     * The type of stream connection the stream is performing.
     *
     * @param StreamType|value-of<StreamType> $streamType
     */
    public function withStreamType(StreamType|string $streamType): self
    {
        $obj = clone $this;
        $obj['stream_type'] = $streamType;

        return $obj;
    }
}
