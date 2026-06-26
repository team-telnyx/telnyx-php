<?php

declare(strict_types=1);

namespace Telnyx\TermsOfService\Agreements;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * A recorded user agreement to a product's Terms of Service. The `user_id` is intentionally NOT echoed back on this public surface - the caller already knows their own identity.
 *
 * @phpstan-type TosAgreementShape = array{
 *   id?: string|null,
 *   agreedAt?: \DateTimeInterface|null,
 *   createdAt?: \DateTimeInterface|null,
 *   productType?: null|TosProductType|value-of<TosProductType>,
 *   termsVersion?: string|null,
 *   version?: string|null,
 * }
 */
final class TosAgreement implements BaseModel
{
    /** @use SdkModel<TosAgreementShape> */
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
     * @var value-of<TosProductType>|null $productType
     */
    #[Optional('product_type', enum: TosProductType::class)]
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
     * @param TosProductType|value-of<TosProductType>|null $productType
     */
    public static function with(
        ?string $id = null,
        ?\DateTimeInterface $agreedAt = null,
        ?\DateTimeInterface $createdAt = null,
        TosProductType|string|null $productType = null,
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
     * @param TosProductType|value-of<TosProductType> $productType
     */
    public function withProductType(TosProductType|string $productType): self
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
