<?php

declare(strict_types=1);

namespace Telnyx\WireguardInterfaces\WireguardInterfaceListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[network_id].
 *
 * @phpstan-type FilterShape = array{network_id?: string|null}
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * The associated network id to filter on.
     */
    #[Optional]
    public ?string $network_id;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $network_id = null): self
    {
        $obj = new self;

        null !== $network_id && $obj['network_id'] = $network_id;

        return $obj;
    }

    /**
     * The associated network id to filter on.
     */
    public function withNetworkID(string $networkID): self
    {
        $obj = clone $this;
        $obj['network_id'] = $networkID;

        return $obj;
    }
}
