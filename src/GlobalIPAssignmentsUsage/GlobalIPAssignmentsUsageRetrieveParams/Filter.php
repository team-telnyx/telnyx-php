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
 *   globalIPAssignmentID?: string|In,
 *   globalIPID?: string|\Telnyx\GlobalIPAssignmentsUsage\GlobalIPAssignmentsUsageRetrieveParams\Filter\GlobalIPID\In,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Filter by exact Global IP Assignment ID.
     */
    #[Api('global_ip_assignment_id', optional: true)]
    public string|In|null $globalIPAssignmentID;

    /**
     * Filter by exact Global IP ID.
     */
    #[Api('global_ip_id', optional: true)]
    public string|Filter\GlobalIPID\In|null $globalIPID;

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
        string|In|null $globalIPAssignmentID = null,
        string|Filter\GlobalIPID\In|null $globalIPID = null,
    ): self {
        $obj = new self;

        null !== $globalIPAssignmentID && $obj->globalIPAssignmentID = $globalIPAssignmentID;
        null !== $globalIPID && $obj->globalIPID = $globalIPID;

        return $obj;
    }

    /**
     * Filter by exact Global IP Assignment ID.
     */
    public function withGlobalIPAssignmentID(
        string|In $globalIPAssignmentID
    ): self {
        $obj = clone $this;
        $obj->globalIPAssignmentID = $globalIPAssignmentID;

        return $obj;
    }

    /**
     * Filter by exact Global IP ID.
     */
    public function withGlobalIPID(
        string|Filter\GlobalIPID\In $globalIPID,
    ): self {
        $obj = clone $this;
        $obj->globalIPID = $globalIPID;

        return $obj;
    }
}
