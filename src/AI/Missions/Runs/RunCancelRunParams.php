<?php

declare(strict_types=1);

namespace Telnyx\AI\Missions\Runs;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Cancel a running or paused run.
 *
 * @see Telnyx\Services\AI\Missions\RunsService::cancelRun()
 *
 * @phpstan-type RunCancelRunParamsShape = array{missionID: string}
 */
final class RunCancelRunParams implements BaseModel
{
    /** @use SdkModel<RunCancelRunParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $missionID;

    /**
     * `new RunCancelRunParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RunCancelRunParams::with(missionID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RunCancelRunParams)->withMissionID(...)
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
