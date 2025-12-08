<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPAssignmentHealth;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\GlobalIPAssignmentHealth\GlobalIPAssignmentHealthRetrieveParams\Filter;
use Telnyx\GlobalIPAssignmentHealth\GlobalIPAssignmentHealthRetrieveParams\Filter\GlobalIPAssignmentID\In;

/**
 * Global IP Assignment Health Check Metrics.
 *
 * @see Telnyx\Services\GlobalIPAssignmentHealthService::retrieve()
 *
 * @phpstan-type GlobalIPAssignmentHealthRetrieveParamsShape = array{
 *   filter?: Filter|array{
 *     global_ip_assignment_id?: string|null|In,
 *     global_ip_id?: string|null|\Telnyx\GlobalIPAssignmentHealth\GlobalIPAssignmentHealthRetrieveParams\Filter\GlobalIPID\In,
 *   },
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
     * @param Filter|array{
     *   global_ip_assignment_id?: string|In|null,
     *   global_ip_id?: string|Filter\GlobalIPID\In|null,
     * } $filter
     */
    public static function with(Filter|array|null $filter = null): self
    {
        $obj = new self;

        null !== $filter && $obj['filter'] = $filter;

        return $obj;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[global_ip_id][in], filter[global_ip_assignment_id][in].
     *
     * @param Filter|array{
     *   global_ip_assignment_id?: string|In|null,
     *   global_ip_id?: string|Filter\GlobalIPID\In|null,
     * } $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $obj = clone $this;
        $obj['filter'] = $filter;

        return $obj;
    }
}
