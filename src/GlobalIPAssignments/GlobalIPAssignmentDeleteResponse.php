<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPAssignments;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Networks\InterfaceStatus;

/**
 * @phpstan-type GlobalIPAssignmentDeleteResponseShape = array{
 *   data?: GlobalIPAssignment|null
 * }
 */
final class GlobalIPAssignmentDeleteResponse implements BaseModel
{
    /** @use SdkModel<GlobalIPAssignmentDeleteResponseShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?GlobalIPAssignment $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param GlobalIPAssignment|array{
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
     * } $data
     */
    public static function with(GlobalIPAssignment|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param GlobalIPAssignment|array{
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
     * } $data
     */
    public function withData(GlobalIPAssignment|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
