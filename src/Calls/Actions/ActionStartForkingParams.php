<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Calls\Actions\ActionStartForkingParams\StreamType;
use Telnyx\Core\Attributes\Api;
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
 * @see Telnyx\Calls\Actions->startForking
 *
 * @phpstan-type ActionStartForkingParamsShape = array{
 *   client_state?: string,
 *   command_id?: string,
 *   rx?: string,
 *   stream_type?: StreamType|value-of<StreamType>,
 *   tx?: string,
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
    #[Api(optional: true)]
    public ?string $client_state;

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     */
    #[Api(optional: true)]
    public ?string $command_id;

    /**
     * The network target, <udp:ip_address:port>, where the call's incoming RTP media packets should be forwarded.
     */
    #[Api(optional: true)]
    public ?string $rx;

    /**
     * Optionally specify a media type to stream. If `decrypted` selected, Telnyx will decrypt incoming SIP media before forking to the target. `rx` and `tx` are required fields if `decrypted` selected.
     *
     * @var value-of<StreamType>|null $stream_type
     */
    #[Api(enum: StreamType::class, optional: true)]
    public ?string $stream_type;

    /**
     * The network target, <udp:ip_address:port>, where the call's outgoing RTP media packets should be forwarded.
     */
    #[Api(optional: true)]
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
     * @param StreamType|value-of<StreamType> $stream_type
     */
    public static function with(
        ?string $client_state = null,
        ?string $command_id = null,
        ?string $rx = null,
        StreamType|string|null $stream_type = null,
        ?string $tx = null,
    ): self {
        $obj = new self;

        null !== $client_state && $obj->client_state = $client_state;
        null !== $command_id && $obj->command_id = $command_id;
        null !== $rx && $obj->rx = $rx;
        null !== $stream_type && $obj['stream_type'] = $stream_type;
        null !== $tx && $obj->tx = $tx;

        return $obj;
    }

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    public function withClientState(string $clientState): self
    {
        $obj = clone $this;
        $obj->client_state = $clientState;

        return $obj;
    }

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     */
    public function withCommandID(string $commandID): self
    {
        $obj = clone $this;
        $obj->command_id = $commandID;

        return $obj;
    }

    /**
     * The network target, <udp:ip_address:port>, where the call's incoming RTP media packets should be forwarded.
     */
    public function withRx(string $rx): self
    {
        $obj = clone $this;
        $obj->rx = $rx;

        return $obj;
    }

    /**
     * Optionally specify a media type to stream. If `decrypted` selected, Telnyx will decrypt incoming SIP media before forking to the target. `rx` and `tx` are required fields if `decrypted` selected.
     *
     * @param StreamType|value-of<StreamType> $streamType
     */
    public function withStreamType(StreamType|string $streamType): self
    {
        $obj = clone $this;
        $obj['stream_type'] = $streamType;

        return $obj;
    }

    /**
     * The network target, <udp:ip_address:port>, where the call's outgoing RTP media packets should be forwarded.
     */
    public function withTx(string $tx): self
    {
        $obj = clone $this;
        $obj->tx = $tx;

        return $obj;
    }
}
