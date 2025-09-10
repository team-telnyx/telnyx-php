<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new ActionStopStreamingParams); // set properties as needed
 * $client->calls.actions->stopStreaming(...$params->toArray());
 * ```
 * Stop streaming a call to a WebSocket.
 *
 * **Expected Webhooks (see [callback schema](https://developers.telnyx.com/api/call-control/stop-call-streaming#callbacks) below):**
 *
 * - `streaming.stopped`
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->calls.actions->stopStreaming(...$params->toArray());`
 *
 * @see Telnyx\Calls\Actions->stopStreaming
 *
 * @phpstan-type action_stop_streaming_params = array{
 *   clientState?: string, commandID?: string, streamID?: string
 * }
 */
final class ActionStopStreamingParams implements BaseModel
{
    /** @use SdkModel<action_stop_streaming_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    #[Api('client_state', optional: true)]
    public ?string $clientState;

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     */
    #[Api('command_id', optional: true)]
    public ?string $commandID;

    /**
     * Identifies the stream. If the `stream_id` is not provided the command stops all streams associated with a given `call_control_id`.
     */
    #[Api('stream_id', optional: true)]
    public ?string $streamID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $clientState = null,
        ?string $commandID = null,
        ?string $streamID = null,
    ): self {
        $obj = new self;

        null !== $clientState && $obj->clientState = $clientState;
        null !== $commandID && $obj->commandID = $commandID;
        null !== $streamID && $obj->streamID = $streamID;

        return $obj;
    }

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    public function withClientState(string $clientState): self
    {
        $obj = clone $this;
        $obj->clientState = $clientState;

        return $obj;
    }

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     */
    public function withCommandID(string $commandID): self
    {
        $obj = clone $this;
        $obj->commandID = $commandID;

        return $obj;
    }

    /**
     * Identifies the stream. If the `stream_id` is not provided the command stops all streams associated with a given `call_control_id`.
     */
    public function withStreamID(string $streamID): self
    {
        $obj = clone $this;
        $obj->streamID = $streamID;

        return $obj;
    }
}
