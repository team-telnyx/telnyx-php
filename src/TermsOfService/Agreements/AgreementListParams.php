<?php

declare(strict_types=1);

namespace Telnyx\TermsOfService\Agreements;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\TermsOfService\Agreements\AgreementListParams\ProductType;

/**
 * Returns the Terms of Service agreements the authenticated user has on file. Each entry records the version agreed to and when. Most users only have one agreement per product, but if the ToS is updated and the user re-agrees a new entry is added.
 *
 * Results are paginated with the standard `page[number]` / `page[size]` parameters; the response uses the standard `{data, meta}` JSON:API envelope.
 *
 * By default this returns agreements for **all** products the user has agreed to. Pass the `product_type` query parameter to scope the result to a single product.
 *
 * @see Telnyx\Services\TermsOfService\AgreementsService::list()
 *
 * @phpstan-type AgreementListParamsShape = array{
 *   pageNumber?: int|null,
 *   pageSize?: int|null,
 *   productType?: null|ProductType|value-of<ProductType>,
 * }
 */
final class AgreementListParams implements BaseModel
{
    /** @use SdkModel<AgreementListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * 1-based page number. Out-of-range values return an empty page with correct meta.
     */
    #[Optional]
    public ?int $pageNumber;

    /**
     * Items per page. Maximum 250; values above are clamped to 250.
     */
    #[Optional]
    public ?int $pageSize;

    /**
     * Optional filter. Omit to list the user's agreements for **every** product (branded_calling and number_reputation); pass a value to return only that product's agreements.
     *
     * @var value-of<ProductType>|null $productType
     */
    #[Optional(enum: ProductType::class)]
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
     * @param ProductType|value-of<ProductType>|null $productType
     */
    public static function with(
        ?int $pageNumber = null,
        ?int $pageSize = null,
        ProductType|string|null $productType = null,
    ): self {
        $self = new self;

        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;
        null !== $productType && $self['productType'] = $productType;

        return $self;
    }

    /**
     * 1-based page number. Out-of-range values return an empty page with correct meta.
     */
    public function withPageNumber(int $pageNumber): self
    {
        $self = clone $this;
        $self['pageNumber'] = $pageNumber;

        return $self;
    }

    /**
     * Items per page. Maximum 250; values above are clamped to 250.
     */
    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * Optional filter. Omit to list the user's agreements for **every** product (branded_calling and number_reputation); pass a value to return only that product's agreements.
     *
     * @param ProductType|value-of<ProductType> $productType
     */
    public function withProductType(ProductType|string $productType): self
    {
        $self = clone $this;
        $self['productType'] = $productType;

        return $self;
    }
}
