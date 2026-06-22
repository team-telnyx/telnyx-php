<?php

declare(strict_types=1);

namespace Telnyx\TermsOfService;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\TermsOfService\Agreements\TosProductType;

/**
 * Returns the available Terms of Service agreements (product, current version, terms URL, effective date). Omit `product_type` to return all products; pass it to scope to one.
 *
 * @see Telnyx\Services\TermsOfServiceService::retrieveInfo()
 *
 * @phpstan-type TermsOfServiceRetrieveInfoParamsShape = array{
 *   productType?: null|TosProductType|value-of<TosProductType>
 * }
 */
final class TermsOfServiceRetrieveInfoParams implements BaseModel
{
    /** @use SdkModel<TermsOfServiceRetrieveInfoParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Optional product filter. Omit to return info for all products.
     *
     * @var value-of<TosProductType>|null $productType
     */
    #[Optional(enum: TosProductType::class)]
    public ?string $productType;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param TosProductType|value-of<TosProductType>|null $productType
     */
    public static function with(TosProductType|string|null $productType = null): self
    {
        $self = new self;

        null !== $productType && $self['productType'] = $productType;

        return $self;
    }

    /**
     * Optional product filter. Omit to return info for all products.
     *
     * @param TosProductType|value-of<TosProductType> $productType
     */
    public function withProductType(TosProductType|string $productType): self
    {
        $self = clone $this;
        $self['productType'] = $productType;

        return $self;
    }
}
