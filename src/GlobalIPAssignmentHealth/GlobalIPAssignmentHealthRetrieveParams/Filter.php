<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPAssignmentHealth\GlobalIPAssignmentHealthRetrieveParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\GlobalIPAssignmentHealth\GlobalIPAssignmentHealthRetrieveParams\Filter\GlobalIPAssignmentID\In;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[global_ip_id][in], filter[global_ip_assignment_id][in].
 *
 * @phpstan-type FilterShape = array{
 *   global_ip_assignment_id?: string|null|In,
 *   global_ip_id?: string|null|\Telnyx\GlobalIPAssignmentHealth\GlobalIPAssignmentHealthRetrieveParams\Filter\GlobalIPID\In,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Filter by exact Global IP Assignment ID.
     */
    #[Optional]
    public string|In|null $global_ip_assignment_id;

    /**
     * Filter by exact Global IP ID.
     */
    #[Optional]
    public string|Filter\GlobalIPID\In|null $global_ip_id;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param string|In|array{in?: string|null} $global_ip_assignment_id
     * @param string|Filter\GlobalIPID\In|array{
     *   in?: string|null
     * } $global_ip_id
     */
    public static function with(
        string|In|array|null $global_ip_assignment_id = null,
        string|Filter\GlobalIPID\In|array|null $global_ip_id = null,
    ): self {
        $obj = new self;

        null !== $global_ip_assignment_id && $obj['global_ip_assignment_id'] = $global_ip_assignment_id;
        null !== $global_ip_id && $obj['global_ip_id'] = $global_ip_id;

        return $obj;
    }

    /**
     * Filter by exact Global IP Assignment ID.
     *
     * @param string|In|array{in?: string|null} $globalIPAssignmentID
     */
    public function withGlobalIPAssignmentID(
        string|In|array $globalIPAssignmentID
    ): self {
        $obj = clone $this;
        $obj['global_ip_assignment_id'] = $globalIPAssignmentID;

        return $obj;
    }

    /**
     * Filter by exact Global IP ID.
     *
     * @param string|Filter\GlobalIPID\In|array{
     *   in?: string|null
     * } $globalIPID
     */
    public function withGlobalIPID(
        string|Filter\GlobalIPID\In|array $globalIPID,
    ): self {
        $obj = clone $this;
        $obj['global_ip_id'] = $globalIPID;

        return $obj;
    }
}
