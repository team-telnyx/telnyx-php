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
 *   bundleLimits: list<BundleLimit>,
 *   costCode: string,
 *   createdAt: \DateTimeInterface,
 *   isPublic: bool,
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

    /** @var list<BundleLimit> $bundleLimits */
    #[Required('bundle_limits', list: BundleLimit::class)]
    public array $bundleLimits;

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
     *   bundleLimits: ...,
     *   costCode: ...,
     *   createdAt: ...,
     *   isPublic: ...,
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
     *   createdAt: \DateTimeInterface,
     *   metric: string,
     *   service: string,
     *   updatedAt: \DateTimeInterface,
     *   billingService?: string|null,
     *   country?: string|null,
     *   countryCode?: int|null,
     *   countryISO?: string|null,
     *   direction?: value-of<Direction>|null,
     *   limit?: int|null,
     *   rate?: string|null,
     *   types?: list<string>|null,
     * }> $bundleLimits
     */
    public static function with(
        string $id,
        bool $active,
        array $bundleLimits,
        string $costCode,
        \DateTimeInterface $createdAt,
        bool $isPublic,
        string $name,
        ?string $slug = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['active'] = $active;
        $self['bundleLimits'] = $bundleLimits;
        $self['costCode'] = $costCode;
        $self['createdAt'] = $createdAt;
        $self['isPublic'] = $isPublic;
        $self['name'] = $name;

        null !== $slug && $self['slug'] = $slug;

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
     * If that bundle is active or not.
     */
    public function withActive(bool $active): self
    {
        $self = clone $this;
        $self['active'] = $active;

        return $self;
    }

    /**
     * @param list<BundleLimit|array{
     *   id: string,
     *   createdAt: \DateTimeInterface,
     *   metric: string,
     *   service: string,
     *   updatedAt: \DateTimeInterface,
     *   billingService?: string|null,
     *   country?: string|null,
     *   countryCode?: int|null,
     *   countryISO?: string|null,
     *   direction?: value-of<Direction>|null,
     *   limit?: int|null,
     *   rate?: string|null,
     *   types?: list<string>|null,
     * }> $bundleLimits
     */
    public function withBundleLimits(array $bundleLimits): self
    {
        $self = clone $this;
        $self['bundleLimits'] = $bundleLimits;

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
     * Slugified version of the bundle's name.
     */
    public function withSlug(string $slug): self
    {
        $self = clone $this;
        $self['slug'] = $slug;

        return $self;
    }
}
