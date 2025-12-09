<?php

declare(strict_types=1);

namespace Telnyx\PublicInternetGateways;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Create a new Public Internet Gateway.
 *
 * @see Telnyx\Services\PublicInternetGatewaysService::create()
 *
 * @phpstan-type PublicInternetGatewayCreateParamsShape = array{
 *   name?: string, networkID?: string, regionCode?: string
 * }
 */
final class PublicInternetGatewayCreateParams implements BaseModel
{
    /** @use SdkModel<PublicInternetGatewayCreateParamsShape> */
    use SdkModel;
    use SdkParams;

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
     * The region interface is deployed to.
     */
    #[Optional('region_code')]
    public ?string $regionCode;

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
        ?string $name = null,
        ?string $networkID = null,
        ?string $regionCode = null
    ): self {
        $self = new self;

        null !== $name && $self['name'] = $name;
        null !== $networkID && $self['networkID'] = $networkID;
        null !== $regionCode && $self['regionCode'] = $regionCode;

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
     * The region interface is deployed to.
     */
    public function withRegionCode(string $regionCode): self
    {
        $self = clone $this;
        $self['regionCode'] = $regionCode;

        return $self;
    }
}
