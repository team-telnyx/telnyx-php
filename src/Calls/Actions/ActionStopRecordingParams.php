<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Stop recording the call.
 *
 * **Expected Webhooks:**
 *
 * - `call.recording.saved`
 *
 * @see Telnyx\Services\Calls\ActionsService::stopRecording()
 *
 * @phpstan-type ActionStopRecordingParamsShape = array{
 *   clientState?: string, commandID?: string, recordingID?: string
 * }
 */
final class ActionStopRecordingParams implements BaseModel
{
    /** @use SdkModel<ActionStopRecordingParamsShape> */
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
     * Uniquely identifies the resource.
     */
    #[Optional('recording_id')]
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
        $self = new self;

        null !== $clientState && $self['clientState'] = $clientState;
        null !== $commandID && $self['commandID'] = $commandID;
        null !== $recordingID && $self['recordingID'] = $recordingID;

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
     * Uniquely identifies the resource.
     */
    public function withRecordingID(string $recordingID): self
    {
        $self = clone $this;
        $self['recordingID'] = $recordingID;

        return $self;
    }
}
