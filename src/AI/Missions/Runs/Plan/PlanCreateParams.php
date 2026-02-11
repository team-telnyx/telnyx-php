<?php

declare(strict_types=1);

namespace Telnyx\AI\Missions\Runs\Plan;

use Telnyx\AI\Missions\Runs\Plan\PlanCreateParams\Step;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Create the initial plan for a run.
 *
 * @see Telnyx\Services\AI\Missions\Runs\PlanService::create()
 *
 * @phpstan-import-type StepShape from \Telnyx\AI\Missions\Runs\Plan\PlanCreateParams\Step
 *
 * @phpstan-type PlanCreateParamsShape = array{
 *   missionID: string, steps: list<Step|StepShape>
 * }
 */
final class PlanCreateParams implements BaseModel
{
    /** @use SdkModel<PlanCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $missionID;

    /** @var list<Step> $steps */
    #[Required(list: Step::class)]
    public array $steps;

    /**
     * `new PlanCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PlanCreateParams::with(missionID: ..., steps: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PlanCreateParams)->withMissionID(...)->withSteps(...)
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
     *
     * @param list<Step|StepShape> $steps
     */
    public static function with(string $missionID, array $steps): self
    {
        $self = new self;

        $self['missionID'] = $missionID;
        $self['steps'] = $steps;

        return $self;
    }

    public function withMissionID(string $missionID): self
    {
        $self = clone $this;
        $self['missionID'] = $missionID;

        return $self;
    }

    /**
     * @param list<Step|StepShape> $steps
     */
    public function withSteps(array $steps): self
    {
        $self = clone $this;
        $self['steps'] = $steps;

        return $self;
    }
}
