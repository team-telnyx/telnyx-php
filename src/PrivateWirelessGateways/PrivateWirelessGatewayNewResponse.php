<?php

declare(strict_types=1);

namespace Telnyx\PrivateWirelessGateways;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type WirelessPrivateWirelessGatewayShape from \Telnyx\PrivateWirelessGateways\WirelessPrivateWirelessGateway
 *
 * @phpstan-type PrivateWirelessGatewayNewResponseShape = array{
 *   data?: null|WirelessPrivateWirelessGateway|WirelessPrivateWirelessGatewayShape
 * }
 */
final class PrivateWirelessGatewayNewResponse implements BaseModel
{
    /** @use SdkModel<PrivateWirelessGatewayNewResponseShape> */
    use SdkModel;

    #[Optional]
    public ?WirelessPrivateWirelessGateway $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param WirelessPrivateWirelessGateway|WirelessPrivateWirelessGatewayShape|null $data
     */
    public static function with(
        WirelessPrivateWirelessGateway|array|null $data = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param WirelessPrivateWirelessGateway|WirelessPrivateWirelessGatewayShape $data
     */
    public function withData(WirelessPrivateWirelessGateway|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
