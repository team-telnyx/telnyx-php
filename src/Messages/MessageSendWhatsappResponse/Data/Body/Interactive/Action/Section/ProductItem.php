<?php

declare(strict_types=1);

namespace Telnyx\Messages\MessageSendWhatsappResponse\Data\Body\Interactive\Action\Section;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ProductItemShape = array{productRetailerID?: string|null}
 */
final class ProductItem implements BaseModel
{
    /** @use SdkModel<ProductItemShape> */
    use SdkModel;

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
    public static function with(?string $productRetailerID = null): self
    {
        $self = new self;

        null !== $productRetailerID && $self['productRetailerID'] = $productRetailerID;

        return $self;
    }

    public function withProductRetailerID(string $productRetailerID): self
    {
        $self = clone $this;
        $self['productRetailerID'] = $productRetailerID;

        return $self;
    }
}
