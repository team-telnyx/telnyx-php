<?php

declare(strict_types=1);

namespace Telnyx\SimCardGroups\Actions;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * This action will asynchronously assign a provisioned Private Wireless Gateway to the SIM card group. Completing this operation defines that all SIM cards in the SIM card group will get their traffic controlled by the associated Private Wireless Gateway. This operation will also imply that new SIM cards assigned to a group will inherit its network definitions. If it's moved to a different group that doesn't have a Private Wireless Gateway, it'll use Telnyx's default mobile network configuration.
 *
 * @see Telnyx\Services\SimCardGroups\ActionsService::setPrivateWirelessGateway()
 *
 * @phpstan-type ActionSetPrivateWirelessGatewayParamsShape = array{
 *   privateWirelessGatewayID: string
 * }
 */
final class ActionSetPrivateWirelessGatewayParams implements BaseModel
{
    /** @use SdkModel<ActionSetPrivateWirelessGatewayParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The identification of the related Private Wireless Gateway resource.
     */
    #[Required('private_wireless_gateway_id')]
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
        $self = new self;

        $self['privateWirelessGatewayID'] = $privateWirelessGatewayID;

        return $self;
    }

    /**
     * The identification of the related Private Wireless Gateway resource.
     */
    public function withPrivateWirelessGatewayID(
        string $privateWirelessGatewayID
    ): self {
        $self = clone $this;
        $self['privateWirelessGatewayID'] = $privateWirelessGatewayID;

        return $self;
    }
}
