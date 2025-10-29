<?php

declare(strict_types=1);

namespace Telnyx\PrivateWirelessGateways;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type PrivateWirelessGatewayGetResponseShape = array{
 *   data?: PrivateWirelessGateway
 * }
 */
final class PrivateWirelessGatewayGetResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<PrivateWirelessGatewayGetResponseShape> */
    use SdkModel;

    use SdkResponse;

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
