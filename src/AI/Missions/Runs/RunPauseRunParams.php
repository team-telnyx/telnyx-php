<?php

declare(strict_types=1);

namespace Telnyx\AI\Missions\Runs;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Pause a running run.
 *
 * @see Telnyx\Services\AI\Missions\RunsService::pauseRun()
 *
 * @phpstan-type RunPauseRunParamsShape = array{missionID: string}
 */
final class RunPauseRunParams implements BaseModel
{
    /** @use SdkModel<RunPauseRunParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $missionID;

    /**
     * `new RunPauseRunParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RunPauseRunParams::with(missionID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RunPauseRunParams)->withMissionID(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(string $missionID): self
    {
        $self = new self;

        $self['missionID'] = $missionID;

        return $self;
    }

    public function withMissionID(string $missionID): self
    {
        $self = clone $this;
        $self['missionID'] = $missionID;

        return $self;
    }
}
