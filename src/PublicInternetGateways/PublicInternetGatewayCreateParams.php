<?php

declare(strict_types=1);

namespace Telnyx\PublicInternetGateways;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new PublicInternetGatewayCreateParams); // set properties as needed
 * $client->publicInternetGateways->create(...$params->toArray());
 * ```
 * Create a new Public Internet Gateway.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->publicInternetGateways->create(...$params->toArray());`
 *
 * @see Telnyx\PublicInternetGateways->create
 *
 * @phpstan-type public_internet_gateway_create_params = array{
 *   name?: string, networkID?: string, regionCode?: string
 * }
 */
final class PublicInternetGatewayCreateParams implements BaseModel
{
    /** @use SdkModel<public_internet_gateway_create_params> */
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
    #[Api('network_id', optional: true)]
    public ?string $networkID;

    /**
     * The region the interface should be deployed to.
     */
    #[Api('region_code', optional: true)]
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

        null !== $name && $obj->name = $name;
        null !== $networkID && $obj->networkID = $networkID;
        null !== $regionCode && $obj->regionCode = $regionCode;

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
        $obj->networkID = $networkID;

        return $obj;
    }

    /**
     * The region the interface should be deployed to.
     */
    public function withRegionCode(string $regionCode): self
    {
        $obj = clone $this;
        $obj->regionCode = $regionCode;

        return $obj;
    }
}
