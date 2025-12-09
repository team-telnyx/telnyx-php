<?php

declare(strict_types=1);

namespace Telnyx\WireguardPeers\WireguardPeerListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[wireguard_interface_id].
 *
 * @phpstan-type FilterShape = array{wireguardInterfaceID?: string|null}
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * The id of the associated WireGuard interface to filter on.
     */
    #[Optional('wireguard_interface_id')]
    public ?string $wireguardInterfaceID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $wireguardInterfaceID = null): self
    {
        $self = new self;

        null !== $wireguardInterfaceID && $self['wireguardInterfaceID'] = $wireguardInterfaceID;

        return $self;
    }

    /**
     * The id of the associated WireGuard interface to filter on.
     */
    public function withWireguardInterfaceID(string $wireguardInterfaceID): self
    {
        $self = clone $this;
        $self['wireguardInterfaceID'] = $wireguardInterfaceID;

        return $self;
    }
}
