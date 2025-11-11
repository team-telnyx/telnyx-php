<?php

declare(strict_types=1);

namespace Telnyx\PublicInternetGateways;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Create a new Public Internet Gateway.
 *
 * @see Telnyx\PublicInternetGateways->create
 *
 * @phpstan-type PublicInternetGatewayCreateParamsShape = array{
 *   name?: string, network_id?: string, region_code?: string
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
    #[Api(optional: true)]
    public ?string $name;

    /**
     * The id of the network associated with the interface.
     */
    #[Api(optional: true)]
    public ?string $network_id;

    /**
     * The region the interface should be deployed to.
     */
    #[Api(optional: true)]
    public ?string $region_code;

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
        ?string $network_id = null,
        ?string $region_code = null
    ): self {
        $obj = new self;

        null !== $name && $obj->name = $name;
        null !== $network_id && $obj->network_id = $network_id;
        null !== $region_code && $obj->region_code = $region_code;

        return $obj;
    }

    /**
     * A user specified name for the interface.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * The id of the network associated with the interface.
     */
    public function withNetworkID(string $networkID): self
    {
        $obj = clone $this;
        $obj->network_id = $networkID;

        return $obj;
    }

    /**
     * The region the interface should be deployed to.
     */
    public function withRegionCode(string $regionCode): self
    {
        $obj = clone $this;
        $obj->region_code = $regionCode;

        return $obj;
    }
}
