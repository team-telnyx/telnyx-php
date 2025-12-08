<?php

declare(strict_types=1);

namespace Telnyx\WireguardPeers\WireguardPeerListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[wireguard_interface_id].
 *
 * @phpstan-type FilterShape = array{wireguard_interface_id?: string|null}
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * The id of the associated WireGuard interface to filter on.
     */
    #[Optional]
    public ?string $wireguard_interface_id;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $wireguard_interface_id = null): self
    {
        $obj = new self;

        null !== $wireguard_interface_id && $obj['wireguard_interface_id'] = $wireguard_interface_id;

        return $obj;
    }

    /**
     * The id of the associated WireGuard interface to filter on.
     */
    public function withWireguardInterfaceID(string $wireguardInterfaceID): self
    {
        $obj = clone $this;
        $obj['wireguard_interface_id'] = $wireguardInterfaceID;

        return $obj;
    }
}
