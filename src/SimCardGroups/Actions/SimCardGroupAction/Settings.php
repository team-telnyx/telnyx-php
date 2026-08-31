<?php

declare(strict_types=1);

namespace Telnyx\SimCardGroups\Actions\SimCardGroupAction;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * A JSON object representation of the action params.
 *
 * @phpstan-type SettingsShape = array{
 *   privateWirelessGatewayID?: string|null, wirelessBlocklistID?: string|null
 * }
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

    /**
     * The identification of the related Wireless Blocklist resource.
     */
    #[Optional('wireless_blocklist_id')]
    public ?string $wirelessBlocklistID;

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
        ?string $privateWirelessGatewayID = null,
        ?string $wirelessBlocklistID = null
    ): self {
        $self = new self;

        null !== $privateWirelessGatewayID && $self['privateWirelessGatewayID'] = $privateWirelessGatewayID;
        null !== $wirelessBlocklistID && $self['wirelessBlocklistID'] = $wirelessBlocklistID;

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

    /**
     * The identification of the related Wireless Blocklist resource.
     */
    public function withWirelessBlocklistID(string $wirelessBlocklistID): self
    {
        $self = clone $this;
        $self['wirelessBlocklistID'] = $wirelessBlocklistID;

        return $self;
    }
}
