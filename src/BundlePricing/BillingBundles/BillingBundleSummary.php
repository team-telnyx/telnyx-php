<?php

declare(strict_types=1);

namespace Telnyx\BundlePricing\BillingBundles;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type BillingBundleSummaryShape = array{
 *   id: string,
 *   costCode: string,
 *   createdAt: \DateTimeInterface,
 *   isPublic: bool,
 *   name: string,
 *   currency?: string|null,
 *   mrcPrice?: float|null,
 *   slug?: string|null,
 *   specs?: list<string>|null,
 * }
 */
final class BillingBundleSummary implements BaseModel
{
    /** @use SdkModel<BillingBundleSummaryShape> */
    use SdkModel;

    /**
     * Bundle's ID, this is used to identify the bundle in the API.
     */
    #[Required]
    public string $id;

    /**
     * Bundle's cost code, this is used to identify the bundle in the billing system.
     */
    #[Required('cost_code')]
    public string $costCode;

    /**
     * Date the bundle was created.
     */
    #[Required('created_at')]
    public \DateTimeInterface $createdAt;

    /**
     * Available to all customers or only to specific customers.
     */
    #[Required('is_public')]
    public bool $isPublic;

    /**
     * Bundle's name, this is used to identify the bundle in the UI.
     */
    #[Required]
    public string $name;

    /**
     * Bundle's currency code.
     */
    #[Optional]
    public ?string $currency;

    /**
     * Monthly recurring charge price.
     */
    #[Optional('mrc_price')]
    public ?float $mrcPrice;

    /**
     * Slugified version of the bundle's name.
     */
    #[Optional]
    public ?string $slug;

    /** @var list<string>|null $specs */
    #[Optional(list: 'string')]
    public ?array $specs;

    /**
     * `new BillingBundleSummary()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BillingBundleSummary::with(
     *   id: ..., costCode: ..., createdAt: ..., isPublic: ..., name: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BillingBundleSummary)
     *   ->withID(...)
     *   ->withCostCode(...)
     *   ->withCreatedAt(...)
     *   ->withIsPublic(...)
     *   ->withName(...)
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
     * @param list<string> $specs
     */
    public static function with(
        string $id,
        string $costCode,
        \DateTimeInterface $createdAt,
        bool $isPublic,
        string $name,
        ?string $currency = null,
        ?float $mrcPrice = null,
        ?string $slug = null,
        ?array $specs = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['costCode'] = $costCode;
        $self['createdAt'] = $createdAt;
        $self['isPublic'] = $isPublic;
        $self['name'] = $name;

        null !== $currency && $self['currency'] = $currency;
        null !== $mrcPrice && $self['mrcPrice'] = $mrcPrice;
        null !== $slug && $self['slug'] = $slug;
        null !== $specs && $self['specs'] = $specs;

        return $self;
    }

    /**
     * Bundle's ID, this is used to identify the bundle in the API.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Bundle's cost code, this is used to identify the bundle in the billing system.
     */
    public function withCostCode(string $costCode): self
    {
        $self = clone $this;
        $self['costCode'] = $costCode;

        return $self;
    }

    /**
     * Date the bundle was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Available to all customers or only to specific customers.
     */
    public function withIsPublic(bool $isPublic): self
    {
        $self = clone $this;
        $self['isPublic'] = $isPublic;

        return $self;
    }

    /**
     * Bundle's name, this is used to identify the bundle in the UI.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Bundle's currency code.
     */
    public function withCurrency(string $currency): self
    {
        $self = clone $this;
        $self['currency'] = $currency;

        return $self;
    }

    /**
     * Monthly recurring charge price.
     */
    public function withMrcPrice(float $mrcPrice): self
    {
        $self = clone $this;
        $self['mrcPrice'] = $mrcPrice;

        return $self;
    }

    /**
     * Slugified version of the bundle's name.
     */
    public function withSlug(string $slug): self
    {
        $self = clone $this;
        $self['slug'] = $slug;

        return $self;
    }

    /**
     * @param list<string> $specs
     */
    public function withSpecs(array $specs): self
    {
        $self = clone $this;
        $self['specs'] = $specs;

        return $self;
    }
}
