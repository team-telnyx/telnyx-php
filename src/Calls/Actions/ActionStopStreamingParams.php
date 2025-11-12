<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Stop streaming a call to a WebSocket.
 *
 * **Expected Webhooks:**
 *
 * - `streaming.stopped`
 *
 * @see Telnyx\Services\Calls\ActionsService::stopStreaming()
 *
 * @phpstan-type ActionStopStreamingParamsShape = array{
 *   client_state?: string, command_id?: string, stream_id?: string
 * }
 */
final class ActionStopStreamingParams implements BaseModel
{
    /** @use SdkModel<ActionStopStreamingParamsShape> */
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
     * Identifies the stream. If the `stream_id` is not provided the command stops all streams associated with a given `call_control_id`.
     */
    #[Api(optional: true)]
    public ?string $stream_id;

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
        ?string $client_state = null,
        ?string $command_id = null,
        ?string $stream_id = null,
    ): self {
        $obj = new self;

        null !== $client_state && $obj->client_state = $client_state;
        null !== $command_id && $obj->command_id = $command_id;
        null !== $stream_id && $obj->stream_id = $stream_id;

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
     * Identifies the stream. If the `stream_id` is not provided the command stops all streams associated with a given `call_control_id`.
     */
    public function withStreamID(string $streamID): self
    {
        $obj = clone $this;
        $obj->stream_id = $streamID;

        return $obj;
    }
}
