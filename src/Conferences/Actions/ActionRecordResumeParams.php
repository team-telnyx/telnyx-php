<?php

declare(strict_types=1);

namespace Telnyx\Conferences\Actions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Resume conference recording.
 *
 * @see Telnyx\Services\Conferences\ActionsService::recordResume()
 *
 * @phpstan-type ActionRecordResumeParamsShape = array{
 *   commandID?: string|null,
 *   recordingID?: string|null,
 *   region?: null|ConferenceRegion|value-of<ConferenceRegion>,
 * }
 */
final class ActionRecordResumeParams implements BaseModel
{
    /** @use SdkModel<ActionRecordResumeParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     */
    #[Optional('command_id')]
    public ?string $commandID;

    /**
     * Use this field to resume specific recording.
     */
    #[Optional('recording_id')]
    public ?string $recordingID;

    /**
     * Region where the conference data is located. Defaults to the region defined in user's data locality settings (Europe or US).
     *
     * @var value-of<ConferenceRegion>|null $region
     */
    #[Optional(enum: ConferenceRegion::class)]
    public ?string $region;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ConferenceRegion|value-of<ConferenceRegion>|null $region
     */
    public static function with(
        ?string $commandID = null,
        ?string $recordingID = null,
        ConferenceRegion|string|null $region = null,
    ): self {
        $self = new self;

        null !== $commandID && $self['commandID'] = $commandID;
        null !== $recordingID && $self['recordingID'] = $recordingID;
        null !== $region && $self['region'] = $region;

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
     * Use this field to resume specific recording.
     */
    public function withRecordingID(string $recordingID): self
    {
        $self = clone $this;
        $self['recordingID'] = $recordingID;

        return $self;
    }

    /**
     * Region where the conference data is located. Defaults to the region defined in user's data locality settings (Europe or US).
     *
     * @param ConferenceRegion|value-of<ConferenceRegion> $region
     */
    public function withRegion(ConferenceRegion|string $region): self
    {
        $self = clone $this;
        $self['region'] = $region;

        return $self;
    }
}
