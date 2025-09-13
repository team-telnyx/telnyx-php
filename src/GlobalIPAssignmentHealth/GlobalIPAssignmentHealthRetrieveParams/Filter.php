<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPAssignmentHealth\GlobalIPAssignmentHealthRetrieveParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\GlobalIPAssignmentHealth\GlobalIPAssignmentHealthRetrieveParams\Filter\GlobalIPAssignmentID\In;
use Telnyx\GlobalIPAssignmentHealth\GlobalIPAssignmentHealthRetrieveParams\Filter\GlobalIPID\In as In1;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[global_ip_id][in], filter[global_ip_assignment_id][in].
 *
 * @phpstan-type filter_alias = array{
 *   globalIPAssignmentID?: string|In, globalIPID?: string|In1
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<filter_alias> */
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
    public string|In1|null $globalIPID;

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
        string|In1|null $globalIPID = null
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
    public function withGlobalIPID(string|In1 $globalIPID): self
    {
        $obj = clone $this;
        $obj->globalIPID = $globalIPID;

        return $obj;
    }
}
