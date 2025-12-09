<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPAssignmentsUsage;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\GlobalIPAssignmentsUsage\GlobalIPAssignmentsUsageRetrieveParams\Filter;
use Telnyx\GlobalIPAssignmentsUsage\GlobalIPAssignmentsUsageRetrieveParams\Filter\GlobalIPAssignmentID\In;

/**
 * Global IP Assignment Usage Metrics.
 *
 * @see Telnyx\Services\GlobalIPAssignmentsUsageService::retrieve()
 *
 * @phpstan-type GlobalIPAssignmentsUsageRetrieveParamsShape = array{
 *   filter?: Filter|array{
 *     globalIPAssignmentID?: string|null|In,
 *     globalIPID?: string|null|\Telnyx\GlobalIPAssignmentsUsage\GlobalIPAssignmentsUsageRetrieveParams\Filter\GlobalIPID\In,
 *   },
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
     *   globalIPAssignmentID?: string|In|null,
     *   globalIPID?: string|Filter\GlobalIPID\In|null,
     * } $filter
     */
    public static function with(Filter|array|null $filter = null): self
    {
        $self = new self;

        null !== $filter && $self['filter'] = $filter;

        return $self;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[global_ip_assignment_id][in], filter[global_ip_id][in].
     *
     * @param Filter|array{
     *   globalIPAssignmentID?: string|In|null,
     *   globalIPID?: string|Filter\GlobalIPID\In|null,
     * } $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $self = clone $this;
        $self['filter'] = $filter;

        return $self;
    }
}
