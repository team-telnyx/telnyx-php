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
        $self = new self;

        null !== $portRequestID && $self['portRequestID'] = $portRequestID;
        null !== $subRequestID && $self['subRequestID'] = $subRequestID;

        return $self;
    }

    /**
     * Identifies the Port Request associated with the Porting Order.
     */
    public function withPortRequestID(string $portRequestID): self
    {
        $self = clone $this;
        $self['portRequestID'] = $portRequestID;

        return $self;
    }

    /**
     * Identifies the Sub Request associated with the Porting Order.
     */
    public function withSubRequestID(string $subRequestID): self
    {
        $self = clone $this;
        $self['subRequestID'] = $subRequestID;

        return $self;
    }
}
