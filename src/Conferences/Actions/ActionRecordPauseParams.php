<?php

declare(strict_types=1);

namespace Telnyx\Conferences\Actions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Pause conference recording.
 *
 * @see Telnyx\Conferences\Actions->recordPause
 *
 * @phpstan-type action_record_pause_params = array{
 *   commandID?: string, recordingID?: string
 * }
 */
final class ActionRecordPauseParams implements BaseModel
{
    /** @use SdkModel<action_record_pause_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     */
    #[Api('command_id', optional: true)]
    public ?string $commandID;

    /**
     * Use this field to pause specific recording.
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
        ?string $commandID = null,
        ?string $recordingID = null
    ): self {
        $obj = new self;

        null !== $commandID && $obj->commandID = $commandID;
        null !== $recordingID && $obj->recordingID = $recordingID;

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
     * Use this field to pause specific recording.
     */
    public function withRecordingID(string $recordingID): self
    {
        $obj = clone $this;
        $obj->recordingID = $recordingID;

        return $obj;
    }
}
