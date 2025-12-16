<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPAssignmentHealth;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\GlobalIPAssignmentHealth\GlobalIPAssignmentHealthRetrieveParams\Filter;

/**
 * Global IP Assignment Health Check Metrics.
 *
 * @see Telnyx\Services\GlobalIPAssignmentHealthService::retrieve()
 *
 * @phpstan-import-type FilterShape from \Telnyx\GlobalIPAssignmentHealth\GlobalIPAssignmentHealthRetrieveParams\Filter
 *
 * @phpstan-type GlobalIPAssignmentHealthRetrieveParamsShape = array{
 *   filter?: FilterShape|null
 * }
 */
final class GlobalIPAssignmentHealthRetrieveParams implements BaseModel
{
    /** @use SdkModel<GlobalIPAssignmentHealthRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[global_ip_id][in], filter[global_ip_assignment_id][in].
     */
    #[Optional]
    public ?Filter $filter;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param FilterShape $filter
     */
    public static function with(Filter|array|null $filter = null): self
    {
        $self = new self;

        null !== $filter && $self['filter'] = $filter;

        return $self;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[global_ip_id][in], filter[global_ip_assignment_id][in].
     *
     * @param FilterShape $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $self = clone $this;
        $self['filter'] = $filter;

        return $self;
    }
}
