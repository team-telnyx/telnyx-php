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
 * $params = (new ActionStopRecordingParams); // set properties as needed
 * $client->calls.actions->stopRecording(...$params->toArray());
 * ```
 * Stop recording the call.
 *
 * **Expected Webhooks (see [callback schema](https://developers.telnyx.com/api/call-control/stop-call-recording#callbacks) below):**
 *
 * - `call.recording.saved`
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->calls.actions->stopRecording(...$params->toArray());`
 *
 * @see Telnyx\Calls\Actions->stopRecording
 *
 * @phpstan-type action_stop_recording_params = array{
 *   clientState?: string, commandID?: string, recordingID?: string
 * }
 */
final class ActionStopRecordingParams implements BaseModel
{
    /** @use SdkModel<action_stop_recording_params> */
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
     * Uniquely identifies the resource.
     */
    #[Api('recording_id', optional: true)]
    public ?string $recordingID;

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
        ?string $recordingID = null,
    ): self {
        $obj = new self;

        null !== $clientState && $obj->clientState = $clientState;
        null !== $commandID && $obj->commandID = $commandID;
        null !== $recordingID && $obj->recordingID = $recordingID;

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
     * Uniquely identifies the resource.
     */
    public function withRecordingID(string $recordingID): self
    {
        $obj = clone $this;
        $obj->recordingID = $recordingID;

        return $obj;
    }
}
