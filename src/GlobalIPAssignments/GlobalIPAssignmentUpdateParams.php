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
 * @phpstan-type GlobalIPAssignmentUpdateParamsShape = array{
 *   globalIPAssignmentUpdateRequest: GlobalIPAssignmentUpdateRequest|array{
 *     id?: string|null,
 *     createdAt?: string|null,
 *     recordType?: string|null,
 *     updatedAt?: string|null,
 *     globalIPID?: string|null,
 *     wireguardPeerID?: string|null,
 *   },
 * }
 */
final class GlobalIPAssignmentUpdateParams implements BaseModel
{
    /** @use SdkModel<GlobalIPAssignmentUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required('globalIpAssignmentUpdateRequest')]
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
     * @param GlobalIPAssignmentUpdateRequest|array{
     *   id?: string|null,
     *   createdAt?: string|null,
     *   recordType?: string|null,
     *   updatedAt?: string|null,
     *   globalIPID?: string|null,
     *   wireguardPeerID?: string|null,
     * } $globalIPAssignmentUpdateRequest
     */
    public static function with(
        GlobalIPAssignmentUpdateRequest|array $globalIPAssignmentUpdateRequest
    ): self {
        $self = new self;

        $self['globalIPAssignmentUpdateRequest'] = $globalIPAssignmentUpdateRequest;

        return $self;
    }

    /**
     * @param GlobalIPAssignmentUpdateRequest|array{
     *   id?: string|null,
     *   createdAt?: string|null,
     *   recordType?: string|null,
     *   updatedAt?: string|null,
     *   globalIPID?: string|null,
     *   wireguardPeerID?: string|null,
     * } $globalIPAssignmentUpdateRequest
     */
    public function withGlobalIPAssignmentUpdateRequest(
        GlobalIPAssignmentUpdateRequest|array $globalIPAssignmentUpdateRequest
    ): self {
        $self = clone $this;
        $self['globalIPAssignmentUpdateRequest'] = $globalIPAssignmentUpdateRequest;

        return $self;
    }
}
