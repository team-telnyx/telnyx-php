<?php

declare(strict_types=1);

namespace Telnyx\PublicInternetGateways;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Networks\InterfaceStatus;

/**
 * @phpstan-type NetworkInterfaceShape = array{
 *   name?: string|null,
 *   networkID?: string|null,
 *   status?: value-of<InterfaceStatus>|null,
 * }
 */
final class NetworkInterface implements BaseModel
{
    /** @use SdkModel<NetworkInterfaceShape> */
    use SdkModel;

    /**
     * A user specified name for the interface.
     */
    #[Optional]
    public ?string $name;

    /**
     * The id of the network associated with the interface.
     */
    #[Optional('network_id')]
    public ?string $networkID;

    /**
     * The current status of the interface deployment.
     *
     * @var value-of<InterfaceStatus>|null $status
     */
    #[Optional(enum: InterfaceStatus::class)]
    public ?string $status;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param InterfaceStatus|value-of<InterfaceStatus> $status
     */
    public static function with(
        ?string $name = null,
        ?string $networkID = null,
        InterfaceStatus|string|null $status = null,
    ): self {
        $self = new self;

        null !== $name && $self['name'] = $name;
        null !== $networkID && $self['networkID'] = $networkID;
        null !== $status && $self['status'] = $status;

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

    /**
     * The id of the network associated with the interface.
     */
    public function withNetworkID(string $networkID): self
    {
        $self = clone $this;
        $self['networkID'] = $networkID;

        return $self;
    }

    /**
     * The current status of the interface deployment.
     *
     * @param InterfaceStatus|value-of<InterfaceStatus> $status
     */
    public function withStatus(InterfaceStatus|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
