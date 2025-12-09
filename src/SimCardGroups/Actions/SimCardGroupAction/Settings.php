<?php

declare(strict_types=1);

namespace Telnyx\SimCardGroups\Actions\SimCardGroupAction;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * A JSON object representation of the action params.
 *
 * @phpstan-type SettingsShape = array{privateWirelessGatewayID?: string|null}
 */
final class Settings implements BaseModel
{
    /** @use SdkModel<SettingsShape> */
    use SdkModel;

    /**
     * The identification of the related Private Wireless Gateway resource.
     */
    #[Optional('private_wireless_gateway_id')]
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
        $self = new self;

        null !== $privateWirelessGatewayID && $self['privateWirelessGatewayID'] = $privateWirelessGatewayID;

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
