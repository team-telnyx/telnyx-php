<?php

declare(strict_types=1);

namespace Telnyx\AI\Missions\Runs\Plan;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PlanStepDataShape from \Telnyx\AI\Missions\Runs\Plan\PlanStepData
 *
 * @phpstan-type PlanStepResponseShape = array{
 *   data: PlanStepData|PlanStepDataShape
 * }
 */
final class PlanStepResponse implements BaseModel
{
    /** @use SdkModel<PlanStepResponseShape> */
    use SdkModel;

    #[Required]
    public PlanStepData $data;

    /**
     * `new PlanStepResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PlanStepResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PlanStepResponse)->withData(...)
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
     * @param PlanStepData|PlanStepDataShape $data
     */
    public static function with(PlanStepData|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param PlanStepData|PlanStepDataShape $data
     */
    public function withData(PlanStepData|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
