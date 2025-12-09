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
        $self = new self;

        null !== $networkID && $self['networkID'] = $networkID;

        return $self;
    }

    /**
     * The associated network id to filter on.
     */
    public function withNetworkID(string $networkID): self
    {
        $self = clone $this;
        $self['networkID'] = $networkID;

        return $self;
    }
}
