<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Calls\Actions\ActionStartForkingParams\StreamType;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Call forking allows you to stream the media from a call to a specific target in realtime.
 * This stream can be used to enable realtime audio analysis to support a
 * variety of use cases, including fraud detection, or the creation of AI-generated audio responses.
 * Requests must specify either the `target` attribute or the `rx` and `tx` attributes.
 *
 * **Expected Webhooks:**
 *
 * - `call.fork.started`
 * - `call.fork.stopped`
 *
 * @see Telnyx\Services\Calls\ActionsService::startForking()
 *
 * @phpstan-type ActionStartForkingParamsShape = array{
 *   clientState?: string|null,
 *   commandID?: string|null,
 *   rx?: string|null,
 *   streamType?: null|StreamType|value-of<StreamType>,
 *   tx?: string|null,
 * }
 */
final class ActionStartForkingParams implements BaseModel
{
    /** @use SdkModel<ActionStartForkingParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    #[Optional('client_state')]
    public ?string $clientState;

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     */
    #[Optional('command_id')]
    public ?string $commandID;

    /**
     * The network target, <udp:ip_address:port>, where the call's incoming RTP media packets should be forwarded.
     */
    #[Optional]
    public ?string $rx;

    /**
     * Optionally specify a media type to stream. If `decrypted` selected, Telnyx will decrypt incoming SIP media before forking to the target. `rx` and `tx` are required fields if `decrypted` selected.
     *
     * @var value-of<StreamType>|null $streamType
     */
    #[Optional('stream_type', enum: StreamType::class)]
    public ?string $streamType;

    /**
     * The network target, <udp:ip_address:port>, where the call's outgoing RTP media packets should be forwarded.
     */
    #[Optional]
    public ?string $tx;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param StreamType|value-of<StreamType> $streamType
     */
    public static function with(
        ?string $clientState = null,
        ?string $commandID = null,
        ?string $rx = null,
        StreamType|string|null $streamType = null,
        ?string $tx = null,
    ): self {
        $self = new self;

        null !== $clientState && $self['clientState'] = $clientState;
        null !== $commandID && $self['commandID'] = $commandID;
        null !== $rx && $self['rx'] = $rx;
        null !== $streamType && $self['streamType'] = $streamType;
        null !== $tx && $self['tx'] = $tx;

        return $self;
    }

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    public function withClientState(string $clientState): self
    {
        $self = clone $this;
        $self['clientState'] = $clientState;

        return $self;
    }

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     */
    public function withCommandID(string $commandID): self
    {
        $self = clone $this;
        $self['commandID'] = $commandID;

        return $self;
    }

    /**
     * The network target, <udp:ip_address:port>, where the call's incoming RTP media packets should be forwarded.
     */
    public function withRx(string $rx): self
    {
        $self = clone $this;
        $self['rx'] = $rx;

        return $self;
    }

    /**
     * Optionally specify a media type to stream. If `decrypted` selected, Telnyx will decrypt incoming SIP media before forking to the target. `rx` and `tx` are required fields if `decrypted` selected.
     *
     * @param StreamType|value-of<StreamType> $streamType
     */
    public function withStreamType(StreamType|string $streamType): self
    {
        $self = clone $this;
        $self['streamType'] = $streamType;

        return $self;
    }

    /**
     * The network target, <udp:ip_address:port>, where the call's outgoing RTP media packets should be forwarded.
     */
    public function withTx(string $tx): self
    {
        $self = clone $this;
        $self['tx'] = $tx;

        return $self;
    }
}
