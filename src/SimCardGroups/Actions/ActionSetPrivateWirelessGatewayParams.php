<?php

declare(strict_types=1);

namespace Telnyx\SimCardGroups\Actions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new ActionSetPrivateWirelessGatewayParams); // set properties as needed
 * $client->simCardGroups.actions->setPrivateWirelessGateway(...$params->toArray());
 * ```
 * This action will asynchronously assign a provisioned Private Wireless Gateway to the SIM card group. Completing this operation defines that all SIM cards in the SIM card group will get their traffic controlled by the associated Private Wireless Gateway. This operation will also imply that new SIM cards assigned to a group will inherit its network definitions. If it's moved to a different group that doesn't have a Private Wireless Gateway, it'll use Telnyx's default mobile network configuration.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->simCardGroups.actions->setPrivateWirelessGateway(...$params->toArray());`
 *
 * @see Telnyx\SimCardGroups\Actions->setPrivateWirelessGateway
 *
 * @phpstan-type action_set_private_wireless_gateway_params = array{
 *   privateWirelessGatewayID: string
 * }
 */
final class ActionSetPrivateWirelessGatewayParams implements BaseModel
{
    /** @use SdkModel<action_set_private_wireless_gateway_params> */
    use SdkModel;
    use SdkParams;

    /**
     * The identification of the related Private Wireless Gateway resource.
     */
    #[Api('private_wireless_gateway_id')]
    public string $privateWirelessGatewayID;

    /**
     * `new ActionSetPrivateWirelessGatewayParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionSetPrivateWirelessGatewayParams::with(privateWirelessGatewayID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ActionSetPrivateWirelessGatewayParams)->withPrivateWirelessGatewayID(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(string $privateWirelessGatewayID): self
    {
        $obj = new self;

        $obj->privateWirelessGatewayID = $privateWirelessGatewayID;

        return $obj;
    }

    /**
     * The identification of the related Private Wireless Gateway resource.
     */
    public function withPrivateWirelessGatewayID(
        string $privateWirelessGatewayID
    ): self {
        $obj = clone $this;
        $obj->privateWirelessGatewayID = $privateWirelessGatewayID;

        return $obj;
    }
}
