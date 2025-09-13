<?php

declare(strict_types=1);

namespace Telnyx\BundlePricing\BillingBundles;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type billing_bundle_summary = array{
 *   id: string,
 *   costCode: string,
 *   createdAt: \DateTimeInterface,
 *   isPublic: bool,
 *   name: string,
 *   currency?: string,
 *   mrcPrice?: float,
 *   slug?: string,
 *   specs?: list<string>,
 * }
 */
final class BillingBundleSummary implements BaseModel
{
    /** @use SdkModel<billing_bundle_summary> */
    use SdkModel;

    /**
     * Bundle's ID, this is used to identify the bundle in the API.
     */
    #[Api]
    public string $id;

    /**
     * Bundle's cost code, this is used to identify the bundle in the billing system.
     */
    #[Api('cost_code')]
    public string $costCode;

    /**
     * Date the bundle was created.
     */
    #[Api('created_at')]
    public \DateTimeInterface $createdAt;

    /**
     * Available to all customers or only to specific customers.
     */
    #[Api('is_public')]
    public bool $isPublic;

    /**
     * Bundle's name, this is used to identify the bundle in the UI.
     */
    #[Api]
    public string $name;

    /**
     * Bundle's currency code.
     */
    #[Api(optional: true)]
    public ?string $currency;

    /**
     * Monthly recurring charge price.
     */
    #[Api('mrc_price', optional: true)]
    public ?float $mrcPrice;

    /**
     * Slugified version of the bundle's name.
     */
    #[Api(optional: true)]
    public ?string $slug;

    /** @var list<string>|null $specs */
    #[Api(list: 'string', optional: true)]
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
        $obj = new self;

        $obj->id = $id;
        $obj->costCode = $costCode;
        $obj->createdAt = $createdAt;
        $obj->isPublic = $isPublic;
        $obj->name = $name;

        null !== $currency && $obj->currency = $currency;
        null !== $mrcPrice && $obj->mrcPrice = $mrcPrice;
        null !== $slug && $obj->slug = $slug;
        null !== $specs && $obj->specs = $specs;

        return $obj;
    }

    /**
     * Bundle's ID, this is used to identify the bundle in the API.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * Bundle's cost code, this is used to identify the bundle in the billing system.
     */
    public function withCostCode(string $costCode): self
    {
        $obj = clone $this;
        $obj->costCode = $costCode;

        return $obj;
    }

    /**
     * Date the bundle was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * Available to all customers or only to specific customers.
     */
    public function withIsPublic(bool $isPublic): self
    {
        $obj = clone $this;
        $obj->isPublic = $isPublic;

        return $obj;
    }

    /**
     * Bundle's name, this is used to identify the bundle in the UI.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * Bundle's currency code.
     */
    public function withCurrency(string $currency): self
    {
        $obj = clone $this;
        $obj->currency = $currency;

        return $obj;
    }

    /**
     * Monthly recurring charge price.
     */
    public function withMrcPrice(float $mrcPrice): self
    {
        $obj = clone $this;
        $obj->mrcPrice = $mrcPrice;

        return $obj;
    }

    /**
     * Slugified version of the bundle's name.
     */
    public function withSlug(string $slug): self
    {
        $obj = clone $this;
        $obj->slug = $slug;

        return $obj;
    }

    /**
     * @param list<string> $specs
     */
    public function withSpecs(array $specs): self
    {
        $obj = clone $this;
        $obj->specs = $specs;

        return $obj;
    }
}
