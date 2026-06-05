<?php

declare(strict_types=1);

namespace Telnyx\TermsOfService;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\TermsOfService\TermsOfServiceStatusParams\ProductType;

/**
 * Returns whether the authenticated user has agreed to the current Number Reputation Terms of Service. Used during onboarding to decide whether to prompt the user with the ToS dialog before continuing.
 *
 * The `agreement_required: true` value means the user has not yet agreed (or has agreed to an outdated version) and must call `POST /terms_of_service/number_reputation/agree` before they can use the Number Reputation endpoints on an enterprise.
 *
 * @see Telnyx\Services\TermsOfServiceService::status()
 *
 * @phpstan-type TermsOfServiceStatusParamsShape = array{
 *   productType?: null|ProductType|value-of<ProductType>
 * }
 */
final class TermsOfServiceStatusParams implements BaseModel
{
    /** @use SdkModel<TermsOfServiceStatusParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Which product's ToS to check. Defaults to `branded_calling`; pass `number_reputation` to check the Number Reputation Terms of Service.
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
    public static function with(ProductType|string|null $productType = null): self
    {
        $self = new self;

        null !== $productType && $self['productType'] = $productType;

        return $self;
    }

    /**
     * Which product's ToS to check. Defaults to `branded_calling`; pass `number_reputation` to check the Number Reputation Terms of Service.
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
