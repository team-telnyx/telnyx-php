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
 *   cost_code: string,
 *   created_at: \DateTimeInterface,
 *   is_public: bool,
 *   name: string,
 *   currency?: string|null,
 *   mrc_price?: float|null,
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
    #[Required]
    public string $cost_code;

    /**
     * Date the bundle was created.
     */
    #[Required]
    public \DateTimeInterface $created_at;

    /**
     * Available to all customers or only to specific customers.
     */
    #[Required]
    public bool $is_public;

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
    #[Optional]
    public ?float $mrc_price;

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
     *   id: ..., cost_code: ..., created_at: ..., is_public: ..., name: ...
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
        string $cost_code,
        \DateTimeInterface $created_at,
        bool $is_public,
        string $name,
        ?string $currency = null,
        ?float $mrc_price = null,
        ?string $slug = null,
        ?array $specs = null,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['cost_code'] = $cost_code;
        $obj['created_at'] = $created_at;
        $obj['is_public'] = $is_public;
        $obj['name'] = $name;

        null !== $currency && $obj['currency'] = $currency;
        null !== $mrc_price && $obj['mrc_price'] = $mrc_price;
        null !== $slug && $obj['slug'] = $slug;
        null !== $specs && $obj['specs'] = $specs;

        return $obj;
    }

    /**
     * Bundle's ID, this is used to identify the bundle in the API.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * Bundle's cost code, this is used to identify the bundle in the billing system.
     */
    public function withCostCode(string $costCode): self
    {
        $obj = clone $this;
        $obj['cost_code'] = $costCode;

        return $obj;
    }

    /**
     * Date the bundle was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    /**
     * Available to all customers or only to specific customers.
     */
    public function withIsPublic(bool $isPublic): self
    {
        $obj = clone $this;
        $obj['is_public'] = $isPublic;

        return $obj;
    }

    /**
     * Bundle's name, this is used to identify the bundle in the UI.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * Bundle's currency code.
     */
    public function withCurrency(string $currency): self
    {
        $obj = clone $this;
        $obj['currency'] = $currency;

        return $obj;
    }

    /**
     * Monthly recurring charge price.
     */
    public function withMrcPrice(float $mrcPrice): self
    {
        $obj = clone $this;
        $obj['mrc_price'] = $mrcPrice;

        return $obj;
    }

    /**
     * Slugified version of the bundle's name.
     */
    public function withSlug(string $slug): self
    {
        $obj = clone $this;
        $obj['slug'] = $slug;

        return $obj;
    }

    /**
     * @param list<string> $specs
     */
    public function withSpecs(array $specs): self
    {
        $obj = clone $this;
        $obj['specs'] = $specs;

        return $obj;
    }
}
