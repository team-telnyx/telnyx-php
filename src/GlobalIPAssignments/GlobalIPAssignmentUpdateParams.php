<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPAssignments;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentUpdateParams\GlobalIPAssignmentUpdateRequest;

/**
 * Update a Global IP assignment.
 *
 * @see Telnyx\Services\GlobalIPAssignmentsService::update()
 *
 * @phpstan-type GlobalIPAssignmentUpdateParamsShape = array{
 *   globalIpAssignmentUpdateRequest: GlobalIPAssignmentUpdateRequest
 * }
 */
final class GlobalIPAssignmentUpdateParams implements BaseModel
{
    /** @use SdkModel<GlobalIPAssignmentUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public GlobalIPAssignmentUpdateRequest $globalIpAssignmentUpdateRequest;

    /**
     * `new GlobalIPAssignmentUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * GlobalIPAssignmentUpdateParams::with(globalIpAssignmentUpdateRequest: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new GlobalIPAssignmentUpdateParams)->withGlobalIPAssignmentUpdateRequest(...)
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
     */
    public static function with(
        GlobalIPAssignmentUpdateRequest $globalIpAssignmentUpdateRequest
    ): self {
        $obj = new self;

        $obj->globalIpAssignmentUpdateRequest = $globalIpAssignmentUpdateRequest;

        return $obj;
    }

    public function withGlobalIPAssignmentUpdateRequest(
        GlobalIPAssignmentUpdateRequest $globalIPAssignmentUpdateRequest
    ): self {
        $obj = clone $this;
        $obj->globalIpAssignmentUpdateRequest = $globalIPAssignmentUpdateRequest;

        return $obj;
    }
}
