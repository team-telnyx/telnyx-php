<?php

declare(strict_types=1);

namespace Telnyx\Pricing\Products;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Pricing\Products\ProductGetResponse\Data;

/**
 * @phpstan-import-type DataShape from \Telnyx\Pricing\Products\ProductGetResponse\Data
 * @phpstan-import-type PricingPaginationMetaShape from \Telnyx\Pricing\Products\PricingPaginationMeta
 *
 * @phpstan-type ProductGetResponseShape = array{
 *   data: list<Data|DataShape>,
 *   meta: PricingPaginationMeta|PricingPaginationMetaShape,
 * }
 */
final class ProductGetResponse implements BaseModel
{
    /** @use SdkModel<ProductGetResponseShape> */
    use SdkModel;

    /** @var list<Data> $data */
    #[Required(list: Data::class)]
    public array $data;

    #[Required]
    public PricingPaginationMeta $meta;

    /**
     * `new ProductGetResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ProductGetResponse::with(data: ..., meta: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ProductGetResponse)->withData(...)->withMeta(...)
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
     *
     * @param list<Data|DataShape> $data
     * @param PricingPaginationMeta|PricingPaginationMetaShape $meta
     */
    public static function with(
        array $data,
        PricingPaginationMeta|array $meta
    ): self {
        $self = new self;

        $self['data'] = $data;
        $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param list<Data|DataShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * @param PricingPaginationMeta|PricingPaginationMetaShape $meta
     */
    public function withMeta(PricingPaginationMeta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
