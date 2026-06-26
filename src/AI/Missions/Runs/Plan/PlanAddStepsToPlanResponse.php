<?php

declare(strict_types=1);

namespace Telnyx\AI\Missions\Runs\Plan;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PlanStepDataShape from \Telnyx\AI\Missions\Runs\Plan\PlanStepData
 *
 * @phpstan-type PlanAddStepsToPlanResponseShape = array{
 *   data: list<PlanStepData|PlanStepDataShape>
 * }
 */
final class PlanAddStepsToPlanResponse implements BaseModel
{
    /** @use SdkModel<PlanAddStepsToPlanResponseShape> */
    use SdkModel;

    /** @var list<PlanStepData> $data */
    #[Required(list: PlanStepData::class)]
    public array $data;

    /**
     * `new PlanAddStepsToPlanResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PlanAddStepsToPlanResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PlanAddStepsToPlanResponse)->withData(...)
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
     * @param list<PlanStepData|PlanStepDataShape> $data
     */
    public static function with(array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param list<PlanStepData|PlanStepDataShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
