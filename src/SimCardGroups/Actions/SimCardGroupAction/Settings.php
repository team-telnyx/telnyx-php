<?php

declare(strict_types=1);

namespace Telnyx\SimCardGroups\Actions\SimCardGroupAction;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * A JSON object representation of the action params.
 *
 * @phpstan-type SettingsShape = array{private_wireless_gateway_id?: string|null}
 */
final class Settings implements BaseModel
{
    /** @use SdkModel<SettingsShape> */
    use SdkModel;

    /**
     * The identification of the related Private Wireless Gateway resource.
     */
    #[Optional]
    public ?string $private_wireless_gateway_id;

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
        ?string $private_wireless_gateway_id = null
    ): self {
        $obj = new self;

        null !== $private_wireless_gateway_id && $obj['private_wireless_gateway_id'] = $private_wireless_gateway_id;

        return $obj;
    }

    /**
     * The identification of the related Private Wireless Gateway resource.
     */
    public function withPrivateWirelessGatewayID(
        string $privateWirelessGatewayID
    ): self {
        $obj = clone $this;
        $obj['private_wireless_gateway_id'] = $privateWirelessGatewayID;

        return $obj;
    }
}
