<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPAssignments;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentUpdateParams\GlobalIPAssignmentUpdateRequest;

/**
 * Update a Global IP assignment.
 *
 * @see Telnyx\Services\GlobalIPAssignmentsService::update()
 *
 * @phpstan-import-type GlobalIPAssignmentUpdateRequestShape from \Telnyx\GlobalIPAssignments\GlobalIPAssignmentUpdateParams\GlobalIPAssignmentUpdateRequest
 *
 * @phpstan-type GlobalIPAssignmentUpdateParamsShape = array{
 *   globalIPAssignmentUpdateRequest: GlobalIPAssignmentUpdateRequestShape
 * }
 */
final class GlobalIPAssignmentUpdateParams implements BaseModel
{
    /** @use SdkModel<GlobalIPAssignmentUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public GlobalIPAssignmentUpdateRequest $globalIPAssignmentUpdateRequest;

    /**
     * `new GlobalIPAssignmentUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * GlobalIPAssignmentUpdateParams::with(globalIPAssignmentUpdateRequest: ...)
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
     *
     * @param GlobalIPAssignmentUpdateRequestShape $globalIPAssignmentUpdateRequest
     */
    public static function with(
        GlobalIPAssignmentUpdateRequest|array $globalIPAssignmentUpdateRequest
    ): self {
        $self = new self;

        $self['globalIPAssignmentUpdateRequest'] = $globalIPAssignmentUpdateRequest;

        return $self;
    }

    /**
     * @param GlobalIPAssignmentUpdateRequestShape $globalIPAssignmentUpdateRequest
     */
    public function withGlobalIPAssignmentUpdateRequest(
        GlobalIPAssignmentUpdateRequest|array $globalIPAssignmentUpdateRequest
    ): self {
        $self = clone $this;
        $self['globalIPAssignmentUpdateRequest'] = $globalIPAssignmentUpdateRequest;

        return $self;
    }
}
