<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPAssignmentsUsage;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\GlobalIPAssignmentsUsage\GlobalIPAssignmentsUsageRetrieveParams\Filter;

/**
 * Global IP Assignment Usage Metrics.
 *
 * @see Telnyx\GlobalIPAssignmentsUsage->retrieve
 *
 * @phpstan-type GlobalIPAssignmentsUsageRetrieveParamsShape = array{
 *   filter?: Filter
 * }
 */
final class GlobalIPAssignmentsUsageRetrieveParams implements BaseModel
{
    /** @use SdkModel<GlobalIPAssignmentsUsageRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[global_ip_assignment_id][in], filter[global_ip_id][in].
     */
    #[Api(optional: true)]
    public ?Filter $filter;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?Filter $filter = null): self
    {
        $obj = new self;

        null !== $filter && $obj->filter = $filter;

        return $obj;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[global_ip_assignment_id][in], filter[global_ip_id][in].
     */
    public function withFilter(Filter $filter): self
    {
        $obj = clone $this;
        $obj->filter = $filter;

        return $obj;
    }
}
