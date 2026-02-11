<?php

declare(strict_types=1);

namespace Telnyx\AI\Missions\Runs\Plan;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Get details of a specific plan step.
 *
 * @see Telnyx\Services\AI\Missions\Runs\PlanService::getStepDetails()
 *
 * @phpstan-type PlanGetStepDetailsParamsShape = array{
 *   missionID: string, runID: string
 * }
 */
final class PlanGetStepDetailsParams implements BaseModel
{
    /** @use SdkModel<PlanGetStepDetailsParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $missionID;

    #[Required]
    public string $runID;

    /**
     * `new PlanGetStepDetailsParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PlanGetStepDetailsParams::with(missionID: ..., runID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PlanGetStepDetailsParams)->withMissionID(...)->withRunID(...)
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
    public static function with(string $missionID, string $runID): self
    {
        $self = new self;

        $self['missionID'] = $missionID;
        $self['runID'] = $runID;

        return $self;
    }

    public function withMissionID(string $missionID): self
    {
        $self = clone $this;
        $self['missionID'] = $missionID;

        return $self;
    }

    public function withRunID(string $runID): self
    {
        $self = clone $this;
        $self['runID'] = $runID;

        return $self;
    }
}
