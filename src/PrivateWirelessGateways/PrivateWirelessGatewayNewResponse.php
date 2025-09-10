<?php

declare(strict_types=1);

namespace Telnyx\PrivateWirelessGateways;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type private_wireless_gateway_new_response = array{
 *   data?: PrivateWirelessGateway|null
 * }
 */
final class PrivateWirelessGatewayNewResponse implements BaseModel
{
    /** @use SdkModel<private_wireless_gateway_new_response> */
    use SdkModel;

    #[Api(optional: true)]
    public ?PrivateWirelessGateway $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?PrivateWirelessGateway $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(PrivateWirelessGateway $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
