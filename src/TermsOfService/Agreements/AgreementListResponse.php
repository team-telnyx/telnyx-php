<?php

declare(strict_types=1);

namespace Telnyx\TermsOfService\Agreements;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\TermsOfService\Agreements\AgreementListResponse\ProductType;

/**
 * A recorded user agreement to a product's Terms of Service. The `user_id` is intentionally NOT echoed back on this public surface — the caller already knows their own identity.
 *
 * @phpstan-type AgreementListResponseShape = array{
 *   id?: string|null,
 *   agreedAt?: \DateTimeInterface|null,
 *   createdAt?: \DateTimeInterface|null,
 *   productType?: null|ProductType|value-of<ProductType>,
 *   termsVersion?: string|null,
 *   version?: string|null,
 * }
 */
final class AgreementListResponse implements BaseModel
{
    /** @use SdkModel<AgreementListResponseShape> */
    use SdkModel;

    #[Optional]
    public ?string $id;

    #[Optional('agreed_at')]
    public ?\DateTimeInterface $agreedAt;

    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * Telnyx product the Terms of Service apply to.
     *
     * @var value-of<ProductType>|null $productType
     */
    #[Optional('product_type', enum: ProductType::class)]
    public ?string $productType;

    #[Optional('terms_version')]
    public ?string $termsVersion;

    /**
     * Convenience alias of `terms_version`. Both keys are present on every response.
     */
    #[Optional]
    public ?string $version;

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
        ?string $id = null,
        ?\DateTimeInterface $agreedAt = null,
        ?\DateTimeInterface $createdAt = null,
        ProductType|string|null $productType = null,
        ?string $termsVersion = null,
        ?string $version = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $agreedAt && $self['agreedAt'] = $agreedAt;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $productType && $self['productType'] = $productType;
        null !== $termsVersion && $self['termsVersion'] = $termsVersion;
        null !== $version && $self['version'] = $version;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withAgreedAt(\DateTimeInterface $agreedAt): self
    {
        $self = clone $this;
        $self['agreedAt'] = $agreedAt;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Telnyx product the Terms of Service apply to.
     *
     * @param ProductType|value-of<ProductType> $productType
     */
    public function withProductType(ProductType|string $productType): self
    {
        $self = clone $this;
        $self['productType'] = $productType;

        return $self;
    }

    public function withTermsVersion(string $termsVersion): self
    {
        $self = clone $this;
        $self['termsVersion'] = $termsVersion;

        return $self;
    }

    /**
     * Convenience alias of `terms_version`. Both keys are present on every response.
     */
    public function withVersion(string $version): self
    {
        $self = clone $this;
        $self['version'] = $version;

        return $self;
    }
}
