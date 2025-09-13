<?php

declare(strict_types=1);

namespace Telnyx\SimCardGroups\Actions\SimCardGroupAction;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * A JSON object representation of the action params.
 *
 * @phpstan-type settings_alias = array{privateWirelessGatewayID?: string}
 */
final class Settings implements BaseModel
{
    /** @use SdkModel<settings_alias> */
    use SdkModel;

    /**
     * The identification of the related Private Wireless Gateway resource.
     */
    #[Api('private_wireless_gateway_id', optional: true)]
    public ?string $privateWirelessGatewayID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $privateWirelessGatewayID = null): self
    {
        $obj = new self;

        null !== $privateWirelessGatewayID && $obj->privateWirelessGatewayID = $privateWirelessGatewayID;

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
