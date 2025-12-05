<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PortingOrderGetSubRequestResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   port_request_id?: string|null, sub_request_id?: string|null
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Identifies the Port Request associated with the Porting Order.
     */
    #[Api(optional: true)]
    public ?string $port_request_id;

    /**
     * Identifies the Sub Request associated with the Porting Order.
     */
    #[Api(optional: true)]
    public ?string $sub_request_id;

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
        ?string $port_request_id = null,
        ?string $sub_request_id = null
    ): self {
        $obj = new self;

        null !== $port_request_id && $obj['port_request_id'] = $port_request_id;
        null !== $sub_request_id && $obj['sub_request_id'] = $sub_request_id;

        return $obj;
    }

    /**
     * Identifies the Port Request associated with the Porting Order.
     */
    public function withPortRequestID(string $portRequestID): self
    {
        $obj = clone $this;
        $obj['port_request_id'] = $portRequestID;

        return $obj;
    }

    /**
     * Identifies the Sub Request associated with the Porting Order.
     */
    public function withSubRequestID(string $subRequestID): self
    {
        $obj = clone $this;
        $obj['sub_request_id'] = $subRequestID;

        return $obj;
    }
}
