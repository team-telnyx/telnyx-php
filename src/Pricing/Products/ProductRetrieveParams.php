<?php

declare(strict_types=1);

namespace Telnyx\Pricing\Products;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Returns pricing entries for a single product. Most products return standard rate entries with fields like rate, unit, country_iso, direction, and tiers. Inference products return model-specific fields (model, input_rate, output_rate, cached_input_rate) with tiered pricing. Some products use rate decks (pricing_type: rate_deck) where rates are determined dynamically.
 *
 * @see Telnyx\Services\Pricing\ProductsService::retrieve()
 *
 * @phpstan-type ProductRetrieveParamsShape = array{
 *   pageNumber?: int|null, pageSize?: int|null
 * }
 */
final class ProductRetrieveParams implements BaseModel
{
    /** @use SdkModel<ProductRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Page number (1-based).
     */
    #[Optional]
    public ?int $pageNumber;

    /**
     * Number of items per page (max 100).
     */
    #[Optional]
    public ?int $pageSize;

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
        ?int $pageNumber = null,
        ?int $pageSize = null
    ): self {
        $self = new self;

        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * Page number (1-based).
     */
    public function withPageNumber(int $pageNumber): self
    {
        $self = clone $this;
        $self['pageNumber'] = $pageNumber;

        return $self;
    }

    /**
     * Number of items per page (max 100).
     */
    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }
}
