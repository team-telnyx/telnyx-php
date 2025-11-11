<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPAssignmentsUsage\GlobalIPAssignmentsUsageRetrieveParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\GlobalIPAssignmentsUsage\GlobalIPAssignmentsUsageRetrieveParams\Filter\GlobalIPAssignmentID\In;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[global_ip_assignment_id][in], filter[global_ip_id][in].
 *
 * @phpstan-type FilterShape = array{
 *   global_ip_assignment_id?: string|null|In,
 *   global_ip_id?: string|null|\Telnyx\GlobalIPAssignmentsUsage\GlobalIPAssignmentsUsageRetrieveParams\Filter\GlobalIPID\In,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Filter by exact Global IP Assignment ID.
     */
    #[Api(optional: true)]
    public string|In|null $global_ip_assignment_id;

    /**
     * Filter by exact Global IP ID.
     */
    #[Api(optional: true)]
    public string|Filter\GlobalIPID\In|null $global_ip_id;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        string|In|null $global_ip_assignment_id = null,
        string|Filter\GlobalIPID\In|null $global_ip_id = null,
    ): self {
        $obj = new self;

        null !== $global_ip_assignment_id && $obj->global_ip_assignment_id = $global_ip_assignment_id;
        null !== $global_ip_id && $obj->global_ip_id = $global_ip_id;

        return $obj;
    }

    /**
     * Filter by exact Global IP Assignment ID.
     */
    public function withGlobalIPAssignmentID(
        string|In $globalIPAssignmentID
    ): self {
        $obj = clone $this;
        $obj->global_ip_assignment_id = $globalIPAssignmentID;

        return $obj;
    }

    /**
     * Filter by exact Global IP ID.
     */
    public function withGlobalIPID(
        string|Filter\GlobalIPID\In $globalIPID,
    ): self {
        $obj = clone $this;
        $obj->global_ip_id = $globalIPID;

        return $obj;
    }
}
