<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Pause recording the call. Recording can be resumed via Resume recording command.
 *
 * **Expected Webhooks:**
 *
 * There are no webhooks associated with this command.
 *
 * @see Telnyx\Services\Calls\ActionsService::pauseRecording()
 *
 * @phpstan-type ActionPauseRecordingParamsShape = array{
 *   client_state?: string, command_id?: string, recording_id?: string
 * }
 */
final class ActionPauseRecordingParams implements BaseModel
{
    /** @use SdkModel<ActionPauseRecordingParamsShape> */
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
     * Uniquely identifies the resource.
     */
    #[Api(optional: true)]
    public ?string $recording_id;

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
        ?string $recording_id = null,
    ): self {
        $obj = new self;

        null !== $client_state && $obj->client_state = $client_state;
        null !== $command_id && $obj->command_id = $command_id;
        null !== $recording_id && $obj->recording_id = $recording_id;

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
     * Uniquely identifies the resource.
     */
    public function withRecordingID(string $recordingID): self
    {
        $obj = clone $this;
        $obj->recording_id = $recordingID;

        return $obj;
    }
}
