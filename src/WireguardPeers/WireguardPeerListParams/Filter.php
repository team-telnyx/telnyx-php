<?php

declare(strict_types=1);

namespace Telnyx\WireguardPeers\WireguardPeerListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[wireguard_interface_id].
 *
 * @phpstan-type filter_alias = array{wireguardInterfaceID?: string|null}
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<filter_alias> */
    use SdkModel;

    /**
     * The id of the associated WireGuard interface to filter on.
     */
    #[Api('wireguard_interface_id', optional: true)]
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
        $obj = new self;

        null !== $wireguardInterfaceID && $obj->wireguardInterfaceID = $wireguardInterfaceID;

        return $obj;
    }

    /**
     * The id of the associated WireGuard interface to filter on.
     */
    public function withWireguardInterfaceID(string $wireguardInterfaceID): self
    {
        $obj = clone $this;
        $obj->wireguardInterfaceID = $wireguardInterfaceID;

        return $obj;
    }
}
