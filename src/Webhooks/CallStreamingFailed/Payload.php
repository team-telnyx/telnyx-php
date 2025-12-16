<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallStreamingFailed;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\CallStreamingFailed\Payload\StreamParams;
use Telnyx\Webhooks\CallStreamingFailed\Payload\StreamType;

/**
 * @phpstan-import-type StreamParamsShape from \Telnyx\Webhooks\CallStreamingFailed\Payload\StreamParams
 *
 * @phpstan-type PayloadShape = array{
 *   callControlID?: string|null,
 *   callLegID?: string|null,
 *   callSessionID?: string|null,
 *   clientState?: string|null,
 *   connectionID?: string|null,
 *   failureReason?: string|null,
 *   streamID?: string|null,
 *   streamParams?: null|StreamParams|StreamParamsShape,
 *   streamType?: null|StreamType|value-of<StreamType>,
 * }
 */
final class Payload implements BaseModel
{
    /** @use SdkModel<PayloadShape> */
    use SdkModel;

    /**
     * Call ID used to issue commands via Call Control API.
     */
    #[Optional('call_control_id')]
    public ?string $callControlID;

    /**
     * ID that is unique to the call and can be used to correlate webhook events.
     */
    #[Optional('call_leg_id')]
    public ?string $callLegID;

    /**
     * ID that is unique to the call session and can be used to correlate webhook events. Call session is a group of related call legs that logically belong to the same phone call, e.g. an inbound and outbound leg of a transferred call.
     */
    #[Optional('call_session_id')]
    public ?string $callSessionID;

    /**
     * State received from a command.
     */
    #[Optional('client_state')]
    public ?string $clientState;

    /**
     * Call Control App ID (formerly Telnyx connection ID) used in the call.
     */
    #[Optional('connection_id')]
    public ?string $connectionID;

    /**
     * A short description explaning why the media streaming failed.
     */
    #[Optional('failure_reason')]
    public ?string $failureReason;

    /**
     * Identifies the streaming.
     */
    #[Optional('stream_id')]
    public ?string $streamID;

    /**
     * Streaming parameters as they were originally given to the Call Control API.
     */
    #[Optional('stream_params')]
    public ?StreamParams $streamParams;

    /**
     * The type of stream connection the stream is performing.
     *
     * @var value-of<StreamType>|null $streamType
     */
    #[Optional('stream_type', enum: StreamType::class)]
    public ?string $streamType;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param StreamParamsShape $streamParams
     * @param StreamType|value-of<StreamType> $streamType
     */
    public static function with(
        ?string $callControlID = null,
        ?string $callLegID = null,
        ?string $callSessionID = null,
        ?string $clientState = null,
        ?string $connectionID = null,
        ?string $failureReason = null,
        ?string $streamID = null,
        StreamParams|array|null $streamParams = null,
        StreamType|string|null $streamType = null,
    ): self {
        $self = new self;

        null !== $callControlID && $self['callControlID'] = $callControlID;
        null !== $callLegID && $self['callLegID'] = $callLegID;
        null !== $callSessionID && $self['callSessionID'] = $callSessionID;
        null !== $clientState && $self['clientState'] = $clientState;
        null !== $connectionID && $self['connectionID'] = $connectionID;
        null !== $failureReason && $self['failureReason'] = $failureReason;
        null !== $streamID && $self['streamID'] = $streamID;
        null !== $streamParams && $self['streamParams'] = $streamParams;
        null !== $streamType && $self['streamType'] = $streamType;

        return $self;
    }

    /**
     * Call ID used to issue commands via Call Control API.
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
     * State received from a command.
     */
    public function withClientState(string $clientState): self
    {
        $self = clone $this;
        $self['clientState'] = $clientState;

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
     * A short description explaning why the media streaming failed.
     */
    public function withFailureReason(string $failureReason): self
    {
        $self = clone $this;
        $self['failureReason'] = $failureReason;

        return $self;
    }

    /**
     * Identifies the streaming.
     */
    public function withStreamID(string $streamID): self
    {
        $self = clone $this;
        $self['streamID'] = $streamID;

        return $self;
    }

    /**
     * Streaming parameters as they were originally given to the Call Control API.
     *
     * @param StreamParamsShape $streamParams
     */
    public function withStreamParams(StreamParams|array $streamParams): self
    {
        $self = clone $this;
        $self['streamParams'] = $streamParams;

        return $self;
    }

    /**
     * The type of stream connection the stream is performing.
     *
     * @param StreamType|value-of<StreamType> $streamType
     */
    public function withStreamType(StreamType|string $streamType): self
    {
        $self = clone $this;
        $self['streamType'] = $streamType;

        return $self;
    }
}
