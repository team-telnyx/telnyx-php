<?php

declare(strict_types=1);

namespace Telnyx\AI\Missions\Runs\Plan;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Get the plan (all steps) for a run.
 *
 * @see Telnyx\Services\AI\Missions\Runs\PlanService::retrieve()
 *
 * @phpstan-type PlanRetrieveParamsShape = array{missionID: string}
 */
final class PlanRetrieveParams implements BaseModel
{
    /** @use SdkModel<PlanRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $missionID;

    /**
     * `new PlanRetrieveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PlanRetrieveParams::with(missionID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PlanRetrieveParams)->withMissionID(...)
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
