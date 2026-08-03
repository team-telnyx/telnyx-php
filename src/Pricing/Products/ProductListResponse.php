<?php

declare(strict_types=1);

namespace Telnyx\Pricing\Products;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ProductListResponseShape = array{
 *   description: string, name: string, slug: string
 * }
 */
final class ProductListResponse implements BaseModel
{
    /** @use SdkModel<ProductListResponseShape> */
    use SdkModel;

    /**
     * Human-readable description of the product.
     */
    #[Required]
    public string $description;

    /**
     * Display name of the product.
     */
    #[Required]
    public string $name;

    /**
     * Product identifier used in the per-product pricing endpoint.
     */
    #[Required]
    public string $slug;

    /**
     * `new ProductListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ProductListResponse::with(description: ..., name: ..., slug: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ProductListResponse)->withDescription(...)->withName(...)->withSlug(...)
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
    public static function with(
        string $description,
        string $name,
        string $slug
    ): self {
        $self = new self;

        $self['description'] = $description;
        $self['name'] = $name;
        $self['slug'] = $slug;

        return $self;
    }

    /**
     * Human-readable description of the product.
     */
    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    /**
     * Display name of the product.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Product identifier used in the per-product pricing endpoint.
     */
    public function withSlug(string $slug): self
    {
        $self = clone $this;
        $self['slug'] = $slug;

        return $self;
    }
}
