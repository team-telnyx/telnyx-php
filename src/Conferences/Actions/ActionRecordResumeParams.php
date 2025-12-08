<?php

declare(strict_types=1);

namespace Telnyx\Conferences\Actions;

use Telnyx\Conferences\Actions\ActionRecordResumeParams\Region;
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
 *   command_id?: string, recording_id?: string, region?: Region|value-of<Region>
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
    #[Optional]
    public ?string $command_id;

    /**
     * Use this field to resume specific recording.
     */
    #[Optional]
    public ?string $recording_id;

    /**
     * Region where the conference data is located. Defaults to the region defined in user's data locality settings (Europe or US).
     *
     * @var value-of<Region>|null $region
     */
    #[Optional(enum: Region::class)]
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
     * @param Region|value-of<Region> $region
     */
    public static function with(
        ?string $command_id = null,
        ?string $recording_id = null,
        Region|string|null $region = null,
    ): self {
        $obj = new self;

        null !== $command_id && $obj['command_id'] = $command_id;
        null !== $recording_id && $obj['recording_id'] = $recording_id;
        null !== $region && $obj['region'] = $region;

        return $obj;
    }

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     */
    public function withCommandID(string $commandID): self
    {
        $obj = clone $this;
        $obj['command_id'] = $commandID;

        return $obj;
    }

    /**
     * Use this field to resume specific recording.
     */
    public function withRecordingID(string $recordingID): self
    {
        $obj = clone $this;
        $obj['recording_id'] = $recordingID;

        return $obj;
    }

    /**
     * Region where the conference data is located. Defaults to the region defined in user's data locality settings (Europe or US).
     *
     * @param Region|value-of<Region> $region
     */
    public function withRegion(Region|string $region): self
    {
        $obj = clone $this;
        $obj['region'] = $region;

        return $obj;
    }
}
