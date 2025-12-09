<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPAssignments;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\GlobalIPAssignments\GlobalIPAssignmentUpdateParams\Body;
use Telnyx\Networks\InterfaceStatus;

/**
 * Update a Global IP assignment.
 *
 * @see Telnyx\Services\GlobalIPAssignmentsService::update()
 *
 * @phpstan-type GlobalIPAssignmentUpdateParamsShape = array{
 *   body: Body|array{
 *     id?: string|null,
 *     createdAt?: string|null,
 *     recordType?: string|null,
 *     updatedAt?: string|null,
 *     globalIPID?: string|null,
 *     isAnnounced?: bool|null,
 *     isConnected?: bool|null,
 *     isInMaintenance?: bool|null,
 *     status?: value-of<InterfaceStatus>|null,
 *     wireguardPeerID?: string|null,
 *   },
 * }
 */
final class GlobalIPAssignmentUpdateParams implements BaseModel
{
    /** @use SdkModel<GlobalIPAssignmentUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public Body $body;

    /**
     * `new GlobalIPAssignmentUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * GlobalIPAssignmentUpdateParams::with(body: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new GlobalIPAssignmentUpdateParams)->withBody(...)
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
     * @param Body|array{
     *   id?: string|null,
     *   createdAt?: string|null,
     *   recordType?: string|null,
     *   updatedAt?: string|null,
     *   globalIPID?: string|null,
     *   isAnnounced?: bool|null,
     *   isConnected?: bool|null,
     *   isInMaintenance?: bool|null,
     *   status?: value-of<InterfaceStatus>|null,
     *   wireguardPeerID?: string|null,
     * } $body
     */
    public static function with(Body|array $body): self
    {
        $self = new self;

        $self['body'] = $body;

        return $self;
    }

    /**
     * @param Body|array{
     *   id?: string|null,
     *   createdAt?: string|null,
     *   recordType?: string|null,
     *   updatedAt?: string|null,
     *   globalIPID?: string|null,
     *   isAnnounced?: bool|null,
     *   isConnected?: bool|null,
     *   isInMaintenance?: bool|null,
     *   status?: value-of<InterfaceStatus>|null,
     *   wireguardPeerID?: string|null,
     * } $body
     */
    public function withBody(Body|array $body): self
    {
        $self = clone $this;
        $self['body'] = $body;

        return $self;
    }
}
