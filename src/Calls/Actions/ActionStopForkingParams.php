<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Calls\Actions\ActionStopForkingParams\StreamType;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new ActionStopForkingParams); // set properties as needed
 * $client->calls.actions->stopForking(...$params->toArray());
 * ```
 * Stop forking a call.
 *
 * **Expected Webhooks (see [callback schema](https://developers.telnyx.com/api/call-control/stop-call-fork#callbacks) below):**
 *
 * - `call.fork.stopped`
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->calls.actions->stopForking(...$params->toArray());`
 *
 * @see Telnyx\Calls\Actions->stopForking
 *
 * @phpstan-type action_stop_forking_params = array{
 *   clientState?: string,
 *   commandID?: string,
 *   streamType?: StreamType|value-of<StreamType>,
 * }
 */
final class ActionStopForkingParams implements BaseModel
{
    /** @use SdkModel<action_stop_forking_params> */
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
     * Optionally specify a `stream_type`. This should match the `stream_type` that was used in `fork_start` command to properly stop the fork.
     *
     * @var value-of<StreamType>|null $streamType
     */
    #[Api('stream_type', enum: StreamType::class, optional: true)]
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
     * @param StreamType|value-of<StreamType> $streamType
     */
    public static function with(
        ?string $clientState = null,
        ?string $commandID = null,
        StreamType|string|null $streamType = null,
    ): self {
        $obj = new self;

        null !== $clientState && $obj->clientState = $clientState;
        null !== $commandID && $obj->commandID = $commandID;
        null !== $streamType && $obj->streamType = $streamType instanceof StreamType ? $streamType->value : $streamType;

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
     * Optionally specify a `stream_type`. This should match the `stream_type` that was used in `fork_start` command to properly stop the fork.
     *
     * @param StreamType|value-of<StreamType> $streamType
     */
    public function withStreamType(StreamType|string $streamType): self
    {
        $obj = clone $this;
        $obj->streamType = $streamType instanceof StreamType ? $streamType->value : $streamType;

        return $obj;
    }
}
