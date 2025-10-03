<?php

declare(strict_types=1);

namespace Telnyx\BundlePricing\BillingBundles\BillingBundleGetResponse\Data;

use Telnyx\BundlePricing\BillingBundles\BillingBundleGetResponse\Data\BundleLimit\Direction;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type bundle_limit = array{
 *   id: string,
 *   createdAt: \DateTimeInterface,
 *   metric: string,
 *   service: string,
 *   updatedAt: \DateTimeInterface,
 *   billingService?: string,
 *   country?: string,
 *   countryCode?: int,
 *   countryISO?: string,
 *   direction?: value-of<Direction>,
 *   limit?: int,
 *   rate?: string,
 *   types?: list<string>,
 * }
 */
final class BundleLimit implements BaseModel
{
    /** @use SdkModel<bundle_limit> */
    use SdkModel;

    #[Api]
    public string $id;

    #[Api('created_at')]
    public \DateTimeInterface $createdAt;

    #[Api]
    public string $metric;

    #[Api]
    public string $service;

    #[Api('updated_at')]
    public \DateTimeInterface $updatedAt;

    #[Api('billing_service', optional: true)]
    public ?string $billingService;

    /**
     * @deprecated
     *
     * Use country_iso instead
     */
    #[Api(optional: true)]
    public ?string $country;

    #[Api('country_code', optional: true)]
    public ?int $countryCode;

    #[Api('country_iso', optional: true)]
    public ?string $countryISO;

    /**
     * An enumeration.
     *
     * @var value-of<Direction>|null $direction
     */
    #[Api(enum: Direction::class, optional: true)]
    public ?string $direction;

    #[Api(optional: true)]
    public ?int $limit;

    #[Api(optional: true)]
    public ?string $rate;

    /** @var list<string>|null $types */
    #[Api(list: 'string', optional: true)]
    public ?array $types;

    /**
     * `new BundleLimit()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BundleLimit::with(
     *   id: ..., createdAt: ..., metric: ..., service: ..., updatedAt: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BundleLimit)
     *   ->withID(...)
     *   ->withCreatedAt(...)
     *   ->withMetric(...)
     *   ->withService(...)
     *   ->withUpdatedAt(...)
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
     * @param Direction|value-of<Direction> $direction
     * @param list<string> $types
     */
    public static function with(
        string $id,
        \DateTimeInterface $createdAt,
        string $metric,
        string $service,
        \DateTimeInterface $updatedAt,
        ?string $billingService = null,
        ?string $country = null,
        ?int $countryCode = null,
        ?string $countryISO = null,
        Direction|string|null $direction = null,
        ?int $limit = null,
        ?string $rate = null,
        ?array $types = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->createdAt = $createdAt;
        $obj->metric = $metric;
        $obj->service = $service;
        $obj->updatedAt = $updatedAt;

        null !== $billingService && $obj->billingService = $billingService;
        null !== $country && $obj->country = $country;
        null !== $countryCode && $obj->countryCode = $countryCode;
        null !== $countryISO && $obj->countryISO = $countryISO;
        null !== $direction && $obj['direction'] = $direction;
        null !== $limit && $obj->limit = $limit;
        null !== $rate && $obj->rate = $rate;
        null !== $types && $obj->types = $types;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    public function withMetric(string $metric): self
    {
        $obj = clone $this;
        $obj->metric = $metric;

        return $obj;
    }

    public function withService(string $service): self
    {
        $obj = clone $this;
        $obj->service = $service;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    public function withBillingService(string $billingService): self
    {
        $obj = clone $this;
        $obj->billingService = $billingService;

        return $obj;
    }

    /**
     * Use country_iso instead.
     */
    public function withCountry(string $country): self
    {
        $obj = clone $this;
        $obj->country = $country;

        return $obj;
    }

    public function withCountryCode(int $countryCode): self
    {
        $obj = clone $this;
        $obj->countryCode = $countryCode;

        return $obj;
    }

    public function withCountryISO(string $countryISO): self
    {
        $obj = clone $this;
        $obj->countryISO = $countryISO;

        return $obj;
    }

    /**
     * An enumeration.
     *
     * @param Direction|value-of<Direction> $direction
     */
    public function withDirection(Direction|string $direction): self
    {
        $obj = clone $this;
        $obj['direction'] = $direction;

        return $obj;
    }

    public function withLimit(int $limit): self
    {
        $obj = clone $this;
        $obj->limit = $limit;

        return $obj;
    }

    public function withRate(string $rate): self
    {
        $obj = clone $this;
        $obj->rate = $rate;

        return $obj;
    }

    /**
     * @param list<string> $types
     */
    public function withTypes(array $types): self
    {
        $obj = clone $this;
        $obj->types = $types;

        return $obj;
    }
}
