<?php

declare(strict_types=1);

namespace Telnyx\AI\Missions\Runs\Plan;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PlanStepDataShape from \Telnyx\AI\Missions\Runs\Plan\PlanStepData
 *
 * @phpstan-type PlanNewResponseShape = array{
 *   data: list<PlanStepData|PlanStepDataShape>
 * }
 */
final class PlanNewResponse implements BaseModel
{
    /** @use SdkModel<PlanNewResponseShape> */
    use SdkModel;

    /** @var list<PlanStepData> $data */
    #[Required(list: PlanStepData::class)]
    public array $data;

    /**
     * `new PlanNewResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PlanNewResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PlanNewResponse)->withData(...)
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
