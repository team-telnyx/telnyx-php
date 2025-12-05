<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPAssignmentsUsage\GlobalIPAssignmentsUsageGetResponse\Data\GlobalIPAssignment;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type WireguardPeerShape = array{
 *   ip_address?: string|null, name?: string|null
 * }
 */
final class WireguardPeer implements BaseModel
{
    /** @use SdkModel<WireguardPeerShape> */
    use SdkModel;

    /**
     * The IP address of the interface.
     */
    #[Api(optional: true)]
    public ?string $ip_address;

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
        ?string $ip_address = null,
        ?string $name = null
    ): self {
        $obj = new self;

        null !== $ip_address && $obj['ip_address'] = $ip_address;
        null !== $name && $obj['name'] = $name;

        return $obj;
    }

    /**
     * The IP address of the interface.
     */
    public function withIPAddress(string $ipAddress): self
    {
        $obj = clone $this;
        $obj['ip_address'] = $ipAddress;

        return $obj;
    }

    /**
     * A user specified name for the interface.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }
}
