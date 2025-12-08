<?php

declare(strict_types=1);

namespace Telnyx\BundlePricing\BillingBundles\BillingBundleGetResponse;

use Telnyx\BundlePricing\BillingBundles\BillingBundleGetResponse\Data\BundleLimit;
use Telnyx\BundlePricing\BillingBundles\BillingBundleGetResponse\Data\BundleLimit\Direction;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   id: string,
 *   active: bool,
 *   bundle_limits: list<BundleLimit>,
 *   cost_code: string,
 *   created_at: \DateTimeInterface,
 *   is_public: bool,
 *   name: string,
 *   slug?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Bundle's ID, this is used to identify the bundle in the API.
     */
    #[Required]
    public string $id;

    /**
     * If that bundle is active or not.
     */
    #[Required]
    public bool $active;

    /** @var list<BundleLimit> $bundle_limits */
    #[Required(list: BundleLimit::class)]
    public array $bundle_limits;

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
     * Slugified version of the bundle's name.
     */
    #[Optional]
    public ?string $slug;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(
     *   id: ...,
     *   active: ...,
     *   bundle_limits: ...,
     *   cost_code: ...,
     *   created_at: ...,
     *   is_public: ...,
     *   name: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)
     *   ->withID(...)
     *   ->withActive(...)
     *   ->withBundleLimits(...)
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
     * @param list<BundleLimit|array{
     *   id: string,
     *   created_at: \DateTimeInterface,
     *   metric: string,
     *   service: string,
     *   updated_at: \DateTimeInterface,
     *   billing_service?: string|null,
     *   country?: string|null,
     *   country_code?: int|null,
     *   country_iso?: string|null,
     *   direction?: value-of<Direction>|null,
     *   limit?: int|null,
     *   rate?: string|null,
     *   types?: list<string>|null,
     * }> $bundle_limits
     */
    public static function with(
        string $id,
        bool $active,
        array $bundle_limits,
        string $cost_code,
        \DateTimeInterface $created_at,
        bool $is_public,
        string $name,
        ?string $slug = null,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['active'] = $active;
        $obj['bundle_limits'] = $bundle_limits;
        $obj['cost_code'] = $cost_code;
        $obj['created_at'] = $created_at;
        $obj['is_public'] = $is_public;
        $obj['name'] = $name;

        null !== $slug && $obj['slug'] = $slug;

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
     * If that bundle is active or not.
     */
    public function withActive(bool $active): self
    {
        $obj = clone $this;
        $obj['active'] = $active;

        return $obj;
    }

    /**
     * @param list<BundleLimit|array{
     *   id: string,
     *   created_at: \DateTimeInterface,
     *   metric: string,
     *   service: string,
     *   updated_at: \DateTimeInterface,
     *   billing_service?: string|null,
     *   country?: string|null,
     *   country_code?: int|null,
     *   country_iso?: string|null,
     *   direction?: value-of<Direction>|null,
     *   limit?: int|null,
     *   rate?: string|null,
     *   types?: list<string>|null,
     * }> $bundleLimits
     */
    public function withBundleLimits(array $bundleLimits): self
    {
        $obj = clone $this;
        $obj['bundle_limits'] = $bundleLimits;

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
     * Slugified version of the bundle's name.
     */
    public function withSlug(string $slug): self
    {
        $obj = clone $this;
        $obj['slug'] = $slug;

        return $obj;
    }
}
