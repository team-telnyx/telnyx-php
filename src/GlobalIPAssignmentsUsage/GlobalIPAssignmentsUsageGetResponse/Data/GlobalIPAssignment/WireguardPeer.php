<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPAssignmentsUsage\GlobalIPAssignmentsUsageGetResponse\Data\GlobalIPAssignment;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type WireguardPeerShape = array{
 *   ipAddress?: string|null, name?: string|null
 * }
 */
final class WireguardPeer implements BaseModel
{
    /** @use SdkModel<WireguardPeerShape> */
    use SdkModel;

    /**
     * The IP address of the interface.
     */
    #[Optional('ip_address')]
    public ?string $ipAddress;

    /**
     * A user specified name for the interface.
     */
    #[Optional]
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
        $self = new self;

        null !== $ipAddress && $self['ipAddress'] = $ipAddress;
        null !== $name && $self['name'] = $name;

        return $self;
    }

    /**
     * The IP address of the interface.
     */
    public function withIPAddress(string $ipAddress): self
    {
        $self = clone $this;
        $self['ipAddress'] = $ipAddress;

        return $self;
    }

    /**
     * A user specified name for the interface.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
