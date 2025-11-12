<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Calls\Actions\ActionStopForkingParams\StreamType;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Stop forking a call.
 *
 * **Expected Webhooks:**
 *
 * - `call.fork.stopped`
 *
 * @see Telnyx\STAINLESS_FIXME_Calls\ActionsService::stopForking()
 *
 * @phpstan-type ActionStopForkingParamsShape = array{
 *   client_state?: string,
 *   command_id?: string,
 *   stream_type?: StreamType|value-of<StreamType>,
 * }
 */
final class ActionStopForkingParams implements BaseModel
{
    /** @use SdkModel<ActionStopForkingParamsShape> */
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
     * Optionally specify a `stream_type`. This should match the `stream_type` that was used in `fork_start` command to properly stop the fork.
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
        ?string $client_state = null,
        ?string $command_id = null,
        StreamType|string|null $stream_type = null,
    ): self {
        $obj = new self;

        null !== $client_state && $obj->client_state = $client_state;
        null !== $command_id && $obj->command_id = $command_id;
        null !== $stream_type && $obj['stream_type'] = $stream_type;

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
     * Optionally specify a `stream_type`. This should match the `stream_type` that was used in `fork_start` command to properly stop the fork.
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
