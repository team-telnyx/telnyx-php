<?php

declare(strict_types=1);

namespace Telnyx\PrivateWirelessGateways;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PrivateWirelessGatewayShape from \Telnyx\PrivateWirelessGateways\PrivateWirelessGateway
 *
 * @phpstan-type PrivateWirelessGatewayDeleteResponseShape = array{
 *   data?: null|PrivateWirelessGateway|PrivateWirelessGatewayShape
 * }
 */
final class PrivateWirelessGatewayDeleteResponse implements BaseModel
{
    /** @use SdkModel<PrivateWirelessGatewayDeleteResponseShape> */
    use SdkModel;

    #[Optional]
    public ?PrivateWirelessGateway $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param PrivateWirelessGateway|PrivateWirelessGatewayShape|null $data
     */
    public static function with(PrivateWirelessGateway|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param PrivateWirelessGateway|PrivateWirelessGatewayShape $data
     */
    public function withData(PrivateWirelessGateway|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
