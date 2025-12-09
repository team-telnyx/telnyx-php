<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PortingOrderGetSubRequestResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   portRequestID?: string|null, subRequestID?: string|null
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Identifies the Port Request associated with the Porting Order.
     */
    #[Optional('port_request_id')]
    public ?string $portRequestID;

    /**
     * Identifies the Sub Request associated with the Porting Order.
     */
    #[Optional('sub_request_id')]
    public ?string $subRequestID;

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
        ?string $portRequestID = null,
        ?string $subRequestID = null
    ): self {
        $obj = new self;

        null !== $portRequestID && $obj['portRequestID'] = $portRequestID;
        null !== $subRequestID && $obj['subRequestID'] = $subRequestID;

        return $obj;
    }

    /**
     * Identifies the Port Request associated with the Porting Order.
     */
    public function withPortRequestID(string $portRequestID): self
    {
        $obj = clone $this;
        $obj['portRequestID'] = $portRequestID;

        return $obj;
    }

    /**
     * Identifies the Sub Request associated with the Porting Order.
     */
    public function withSubRequestID(string $subRequestID): self
    {
        $obj = clone $this;
        $obj['subRequestID'] = $subRequestID;

        return $obj;
    }
}
