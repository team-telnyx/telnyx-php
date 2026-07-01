<?php

declare(strict_types=1);

namespace Telnyx\TermsOfService\TermsOfServiceGetInfoResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\TermsOfService\Agreements\TosProductType;

/**
 * @phpstan-type AgreementShape = array{
 *   currentVersion?: string|null,
 *   description?: string|null,
 *   effectiveDate?: string|null,
 *   productType?: null|TosProductType|value-of<TosProductType>,
 *   termsURL?: string|null,
 * }
 */
final class Agreement implements BaseModel
{
    /** @use SdkModel<AgreementShape> */
    use SdkModel;

    #[Optional('current_version')]
    public ?string $currentVersion;

    #[Optional]
    public ?string $description;

    #[Optional('effective_date')]
    public ?string $effectiveDate;

    /**
     * Telnyx product the Terms of Service apply to.
     *
     * @var value-of<TosProductType>|null $productType
     */
    #[Optional('product_type', enum: TosProductType::class)]
    public ?string $productType;

    #[Optional('terms_url')]
    public ?string $termsURL;

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
    public static function with(
        ?string $currentVersion = null,
        ?string $description = null,
        ?string $effectiveDate = null,
        TosProductType|string|null $productType = null,
        ?string $termsURL = null,
    ): self {
        $self = new self;

        null !== $currentVersion && $self['currentVersion'] = $currentVersion;
        null !== $description && $self['description'] = $description;
        null !== $effectiveDate && $self['effectiveDate'] = $effectiveDate;
        null !== $productType && $self['productType'] = $productType;
        null !== $termsURL && $self['termsURL'] = $termsURL;

        return $self;
    }

    public function withCurrentVersion(string $currentVersion): self
    {
        $self = clone $this;
        $self['currentVersion'] = $currentVersion;

        return $self;
    }

    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    public function withEffectiveDate(string $effectiveDate): self
    {
        $self = clone $this;
        $self['effectiveDate'] = $effectiveDate;

        return $self;
    }

    /**
     * Telnyx product the Terms of Service apply to.
     *
     * @param TosProductType|value-of<TosProductType> $productType
     */
    public function withProductType(TosProductType|string $productType): self
    {
        $self = clone $this;
        $self['productType'] = $productType;

        return $self;
    }

    public function withTermsURL(string $termsURL): self
    {
        $self = clone $this;
        $self['termsURL'] = $termsURL;

        return $self;
    }
}
