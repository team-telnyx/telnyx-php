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
        $obj = new self;

        null !== $name && $obj['name'] = $name;
        null !== $networkID && $obj['networkID'] = $networkID;
        null !== $regionCode && $obj['regionCode'] = $regionCode;

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

    /**
     * The id of the network associated with the interface.
     */
    public function withNetworkID(string $networkID): self
    {
        $obj = clone $this;
        $obj['networkID'] = $networkID;

        return $obj;
    }

    /**
     * The region interface is deployed to.
     */
    public function withRegionCode(string $regionCode): self
    {
        $obj = clone $this;
        $obj['regionCode'] = $regionCode;

        return $obj;
    }
}
