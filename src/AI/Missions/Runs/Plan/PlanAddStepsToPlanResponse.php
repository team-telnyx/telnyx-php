<?php

declare(strict_types=1);

namespace Telnyx\AI\Missions\Runs\Plan;

use Telnyx\AI\Missions\Runs\Plan\PlanAddStepsToPlanResponse\Data;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type DataShape from \Telnyx\AI\Missions\Runs\Plan\PlanAddStepsToPlanResponse\Data
 *
 * @phpstan-type PlanAddStepsToPlanResponseShape = array{
 *   data: list<Data|DataShape>
 * }
 */
final class PlanAddStepsToPlanResponse implements BaseModel
{
    /** @use SdkModel<PlanAddStepsToPlanResponseShape> */
    use SdkModel;

    /** @var list<Data> $data */
    #[Required(list: Data::class)]
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
     * @param list<Data|DataShape> $data
     */
    public static function with(array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param list<Data|DataShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
