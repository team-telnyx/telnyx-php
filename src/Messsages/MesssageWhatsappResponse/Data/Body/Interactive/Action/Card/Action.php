<?php

declare(strict_types=1);

namespace Telnyx\Messsages\MesssageWhatsappResponse\Data\Body\Interactive\Action\Card;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ActionShape = array{
 *   catalogID?: string|null, productRetailerID?: string|null
 * }
 */
final class Action implements BaseModel
{
    /** @use SdkModel<ActionShape> */
    use SdkModel;

    /**
     * the unique ID of the catalog.
     */
    #[Optional('catalog_id')]
    public ?string $catalogID;

    /**
     * the unique retailer ID of the product.
     */
    #[Optional('product_retailer_id')]
    public ?string $productRetailerID;

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
        ?string $catalogID = null,
        ?string $productRetailerID = null
    ): self {
        $self = new self;

        null !== $catalogID && $self['catalogID'] = $catalogID;
        null !== $productRetailerID && $self['productRetailerID'] = $productRetailerID;

        return $self;
    }

    /**
     * the unique ID of the catalog.
     */
    public function withCatalogID(string $catalogID): self
    {
        $self = clone $this;
        $self['catalogID'] = $catalogID;

        return $self;
    }

    /**
     * the unique retailer ID of the product.
     */
    public function withProductRetailerID(string $productRetailerID): self
    {
        $self = clone $this;
        $self['productRetailerID'] = $productRetailerID;

        return $self;
    }
}
