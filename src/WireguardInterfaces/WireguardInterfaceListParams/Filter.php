<?php

declare(strict_types=1);

namespace Telnyx\WireguardInterfaces\WireguardInterfaceListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[network_id].
 *
 * @phpstan-type FilterShape = array{networkID?: string|null}
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * The associated network id to filter on.
     */
    #[Optional('network_id')]
    public ?string $networkID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $networkID = null): self
    {
        $obj = new self;

        null !== $networkID && $obj['networkID'] = $networkID;

        return $obj;
    }

    /**
     * The associated network id to filter on.
     */
    public function withNetworkID(string $networkID): self
    {
        $obj = clone $this;
        $obj['networkID'] = $networkID;

        return $obj;
    }
}
