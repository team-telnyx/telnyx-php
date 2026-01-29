<?php

declare(strict_types=1);

namespace Telnyx\SimCardOrderPreview;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Preview SIM card order purchases.
 *
 * @see Telnyx\Services\SimCardOrderPreviewService::preview()
 *
 * @phpstan-type SimCardOrderPreviewPreviewParamsShape = array{
 *   addressID: string, quantity: int
 * }
 */
final class SimCardOrderPreviewPreviewParams implements BaseModel
{
    /** @use SdkModel<SimCardOrderPreviewPreviewParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Uniquely identifies the address for the order.
     */
    #[Required('address_id')]
    public string $addressID;

    /**
     * The amount of SIM cards that the user would like to purchase in the SIM card order.
     */
    #[Required]
    public int $quantity;

    /**
     * `new SimCardOrderPreviewPreviewParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SimCardOrderPreviewPreviewParams::with(addressID: ..., quantity: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SimCardOrderPreviewPreviewParams)->withAddressID(...)->withQuantity(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(string $addressID, int $quantity): self
    {
        $self = new self;

        $self['addressID'] = $addressID;
        $self['quantity'] = $quantity;

        return $self;
    }

    /**
     * Uniquely identifies the address for the order.
     */
    public function withAddressID(string $addressID): self
    {
        $self = clone $this;
        $self['addressID'] = $addressID;

        return $self;
    }

    /**
     * The amount of SIM cards that the user would like to purchase in the SIM card order.
     */
    public function withQuantity(int $quantity): self
    {
        $self = clone $this;
        $self['quantity'] = $quantity;

        return $self;
    }
}
