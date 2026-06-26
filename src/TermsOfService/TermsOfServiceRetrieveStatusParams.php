<?php

declare(strict_types=1);

namespace Telnyx\TermsOfService;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\TermsOfService\Agreements\TosProductType;

/**
 * Returns whether the authenticated user has agreed to the current Terms of Service for the product given by `product_type`. Used during onboarding to decide whether to prompt the user with the ToS dialog before continuing.
 *
 * `agreement_required: true` means the user has not yet agreed (or has agreed to an outdated version) and must agree before using that product's endpoints.
 *
 * @see Telnyx\Services\TermsOfServiceService::retrieveStatus()
 *
 * @phpstan-type TermsOfServiceRetrieveStatusParamsShape = array{
 *   productType?: null|TosProductType|value-of<TosProductType>
 * }
 */
final class TermsOfServiceRetrieveStatusParams implements BaseModel
{
    /** @use SdkModel<TermsOfServiceRetrieveStatusParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Which product's ToS to check. Defaults to `branded_calling`.
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
     * Which product's ToS to check. Defaults to `branded_calling`.
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
