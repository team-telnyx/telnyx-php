<?php

declare(strict_types=1);

namespace Telnyx\Rcs\Brands\BrandCreateParams;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Rcs\Brands\BrandCreateParams\Contacts\Brand;

/**
 * Named business contacts. Use the `brand` key for the required BRAND contact.
 *
 * @phpstan-import-type BrandShape from \Telnyx\Rcs\Brands\BrandCreateParams\Contacts\Brand
 *
 * @phpstan-type ContactsShape = array{brand: Brand|BrandShape}
 */
final class Contacts implements BaseModel
{
    /** @use SdkModel<ContactsShape> */
    use SdkModel;

    #[Required]
    public Brand $brand;

    /**
     * `new Contacts()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Contacts::with(brand: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Contacts)->withBrand(...)
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
     * @param Brand|BrandShape $brand
     */
    public static function with(Brand|array $brand): self
    {
        $self = new self;

        $self['brand'] = $brand;

        return $self;
    }

    /**
     * @param Brand|BrandShape $brand
     */
    public function withBrand(Brand|array $brand): self
    {
        $self = clone $this;
        $self['brand'] = $brand;

        return $self;
    }
}
