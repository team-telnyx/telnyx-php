<?php

declare(strict_types=1);

namespace Telnyx\TermsOfService\TermsOfServiceGetStatusResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\TermsOfService\Agreements\TosProductType;

/**
 * Whether the calling user has agreed to a product's current Terms of Service. The `user_id` is intentionally omitted on this public surface.
 *
 * @phpstan-type DataShape = array{
 *   agreementRequired: bool,
 *   currentTermsVersion: string,
 *   hasAgreed: bool,
 *   productType: TosProductType|value-of<TosProductType>,
 *   agreedAt?: \DateTimeInterface|null,
 *   agreedVersion?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * `true` when the user must agree to the latest version before using the product. Equivalent to `!has_agreed`.
     */
    #[Required('agreement_required')]
    public bool $agreementRequired;

    /**
     * Latest published version of the ToS for this product.
     */
    #[Required('current_terms_version')]
    public string $currentTermsVersion;

    /**
     * `true` if the user has agreed to the latest version.
     */
    #[Required('has_agreed')]
    public bool $hasAgreed;

    /**
     * Telnyx product the Terms of Service apply to.
     *
     * @var value-of<TosProductType> $productType
     */
    #[Required('product_type', enum: TosProductType::class)]
    public string $productType;

    #[Optional('agreed_at', nullable: true)]
    public ?\DateTimeInterface $agreedAt;

    /**
     * Version the user previously agreed to (may be older than `current_terms_version`). `null` if the user has never agreed.
     */
    #[Optional('agreed_version', nullable: true)]
    public ?string $agreedVersion;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(
     *   agreementRequired: ...,
     *   currentTermsVersion: ...,
     *   hasAgreed: ...,
     *   productType: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)
     *   ->withAgreementRequired(...)
     *   ->withCurrentTermsVersion(...)
     *   ->withHasAgreed(...)
     *   ->withProductType(...)
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
     * @param TosProductType|value-of<TosProductType> $productType
     */
    public static function with(
        bool $agreementRequired,
        string $currentTermsVersion,
        bool $hasAgreed,
        TosProductType|string $productType,
        ?\DateTimeInterface $agreedAt = null,
        ?string $agreedVersion = null,
    ): self {
        $self = new self;

        $self['agreementRequired'] = $agreementRequired;
        $self['currentTermsVersion'] = $currentTermsVersion;
        $self['hasAgreed'] = $hasAgreed;
        $self['productType'] = $productType;

        null !== $agreedAt && $self['agreedAt'] = $agreedAt;
        null !== $agreedVersion && $self['agreedVersion'] = $agreedVersion;

        return $self;
    }

    /**
     * `true` when the user must agree to the latest version before using the product. Equivalent to `!has_agreed`.
     */
    public function withAgreementRequired(bool $agreementRequired): self
    {
        $self = clone $this;
        $self['agreementRequired'] = $agreementRequired;

        return $self;
    }

    /**
     * Latest published version of the ToS for this product.
     */
    public function withCurrentTermsVersion(string $currentTermsVersion): self
    {
        $self = clone $this;
        $self['currentTermsVersion'] = $currentTermsVersion;

        return $self;
    }

    /**
     * `true` if the user has agreed to the latest version.
     */
    public function withHasAgreed(bool $hasAgreed): self
    {
        $self = clone $this;
        $self['hasAgreed'] = $hasAgreed;

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

    public function withAgreedAt(?\DateTimeInterface $agreedAt): self
    {
        $self = clone $this;
        $self['agreedAt'] = $agreedAt;

        return $self;
    }

    /**
     * Version the user previously agreed to (may be older than `current_terms_version`). `null` if the user has never agreed.
     */
    public function withAgreedVersion(?string $agreedVersion): self
    {
        $self = clone $this;
        $self['agreedVersion'] = $agreedVersion;

        return $self;
    }
}
