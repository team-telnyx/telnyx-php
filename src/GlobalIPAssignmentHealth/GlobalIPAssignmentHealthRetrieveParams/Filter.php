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
 *   globalIPAssignmentID?: string|null|In,
 *   globalIPID?: string|null|\Telnyx\GlobalIPAssignmentHealth\GlobalIPAssignmentHealthRetrieveParams\Filter\GlobalIPID\In,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Filter by exact Global IP Assignment ID.
     */
    #[Optional('global_ip_assignment_id')]
    public string|In|null $globalIPAssignmentID;

    /**
     * Filter by exact Global IP ID.
     */
    #[Optional('global_ip_id')]
    public string|Filter\GlobalIPID\In|null $globalIPID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param string|In|array{in?: string|null} $globalIPAssignmentID
     * @param string|Filter\GlobalIPID\In|array{
     *   in?: string|null
     * } $globalIPID
     */
    public static function with(
        string|In|array|null $globalIPAssignmentID = null,
        string|Filter\GlobalIPID\In|array|null $globalIPID = null,
    ): self {
        $obj = new self;

        null !== $globalIPAssignmentID && $obj['globalIPAssignmentID'] = $globalIPAssignmentID;
        null !== $globalIPID && $obj['globalIPID'] = $globalIPID;

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
        $obj['globalIPAssignmentID'] = $globalIPAssignmentID;

        return $obj;
    }

    /**
     * Filter by exact Global IP ID.
     *
     * @param string|Filter\GlobalIPID\In|array{
     *   in?: string|null
     * } $globalIPID
     */
    public function withGlobalIpid(
        string|Filter\GlobalIPID\In|array $globalIPID,
    ): self {
        $obj = clone $this;
        $obj['globalIPID'] = $globalIPID;

        return $obj;
    }
}
