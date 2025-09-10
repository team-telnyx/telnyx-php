<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPAssignmentsUsage\GlobalIPAssignmentsUsageGetResponse\Data\GlobalIPAssignment;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type wireguard_peer = array{
 *   ipAddress?: string|null, name?: string|null
 * }
 */
final class WireguardPeer implements BaseModel
{
    /** @use SdkModel<wireguard_peer> */
    use SdkModel;

    /**
     * The IP address of the interface.
     */
    #[Api('ip_address', optional: true)]
    public ?string $ipAddress;

    /**
     * A user specified name for the interface.
     */
    #[Api(optional: true)]
    public ?string $name;

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
        ?string $ipAddress = null,
        ?string $name = null
    ): self {
        $obj = new self;

        null !== $ipAddress && $obj->ipAddress = $ipAddress;
        null !== $name && $obj->name = $name;

        return $obj;
    }

    /**
     * The IP address of the interface.
     */
    public function withIPAddress(string $ipAddress): self
    {
        $obj = clone $this;
        $obj->ipAddress = $ipAddress;

        return $obj;
    }

    /**
     * A user specified name for the interface.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }
}
