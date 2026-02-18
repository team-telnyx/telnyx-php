<?php

declare(strict_types=1);

namespace Telnyx\AI\Missions\Runs\Plan;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PlanStepDataShape from \Telnyx\AI\Missions\Runs\Plan\PlanStepData
 *
 * @phpstan-type PlanGetResponseShape = array{
 *   data: list<PlanStepData|PlanStepDataShape>
 * }
 */
final class PlanGetResponse implements BaseModel
{
    /** @use SdkModel<PlanGetResponseShape> */
    use SdkModel;

    /** @var list<PlanStepData> $data */
    #[Required(list: PlanStepData::class)]
    public array $data;

    /**
     * `new PlanGetResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PlanGetResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PlanGetResponse)->withData(...)
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
