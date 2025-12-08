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
 *     created_at?: string|null,
 *     record_type?: string|null,
 *     updated_at?: string|null,
 *     global_ip_id?: string|null,
 *     is_announced?: bool|null,
 *     is_connected?: bool|null,
 *     is_in_maintenance?: bool|null,
 *     status?: value-of<InterfaceStatus>|null,
 *     wireguard_peer_id?: string|null,
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
     *   created_at?: string|null,
     *   record_type?: string|null,
     *   updated_at?: string|null,
     *   global_ip_id?: string|null,
     *   is_announced?: bool|null,
     *   is_connected?: bool|null,
     *   is_in_maintenance?: bool|null,
     *   status?: value-of<InterfaceStatus>|null,
     *   wireguard_peer_id?: string|null,
     * } $body
     */
    public static function with(Body|array $body): self
    {
        $obj = new self;

        $obj['body'] = $body;

        return $obj;
    }

    /**
     * @param Body|array{
     *   id?: string|null,
     *   created_at?: string|null,
     *   record_type?: string|null,
     *   updated_at?: string|null,
     *   global_ip_id?: string|null,
     *   is_announced?: bool|null,
     *   is_connected?: bool|null,
     *   is_in_maintenance?: bool|null,
     *   status?: value-of<InterfaceStatus>|null,
     *   wireguard_peer_id?: string|null,
     * } $body
     */
    public function withBody(Body|array $body): self
    {
        $obj = clone $this;
        $obj['body'] = $body;

        return $obj;
    }
}
