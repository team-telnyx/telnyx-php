<?php

declare(strict_types=1);

namespace Telnyx\BundlePricing\BillingBundles\BillingBundleGetResponse\Data;

use Telnyx\BundlePricing\BillingBundles\BillingBundleGetResponse\Data\BundleLimit\Direction;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type BundleLimitShape = array{
 *   id: string,
 *   createdAt: string,
 *   metric: string,
 *   service: string,
 *   updatedAt: string,
 *   billingService?: string|null,
 *   country?: string|null,
 *   countryCode?: int|null,
 *   countryISO?: string|null,
 *   direction?: null|Direction|value-of<Direction>,
 *   limit?: int|null,
 *   rate?: string|null,
 *   types?: list<string>|null,
 * }
 */
final class BundleLimit implements BaseModel
{
    /** @use SdkModel<BundleLimitShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required('created_at')]
    public string $createdAt;

    #[Required]
    public string $metric;

    #[Required]
    public string $service;

    #[Required('updated_at')]
    public string $updatedAt;

    #[Optional('billing_service')]
    public ?string $billingService;

    /**
     * @deprecated Use country_iso instead
     *
     * Use country_iso instead
     */
    #[Optional]
    public ?string $country;

    #[Optional('country_code')]
    public ?int $countryCode;

    #[Optional('country_iso')]
    public ?string $countryISO;

    /**
     * An enumeration.
     *
     * @var value-of<Direction>|null $direction
     */
    #[Optional(enum: Direction::class)]
    public ?string $direction;

    #[Optional]
    public ?int $limit;

    #[Optional]
    public ?string $rate;

    /** @var list<string>|null $types */
    #[Optional(list: 'string')]
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
     * @param Direction|value-of<Direction>|null $direction
     * @param list<string>|null $types
     */
    public static function with(
        string $id,
        string $createdAt,
        string $metric,
        string $service,
        string $updatedAt,
        ?string $billingService = null,
        ?string $country = null,
        ?int $countryCode = null,
        ?string $countryISO = null,
        Direction|string|null $direction = null,
        ?int $limit = null,
        ?string $rate = null,
        ?array $types = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['createdAt'] = $createdAt;
        $self['metric'] = $metric;
        $self['service'] = $service;
        $self['updatedAt'] = $updatedAt;

        null !== $billingService && $self['billingService'] = $billingService;
        null !== $country && $self['country'] = $country;
        null !== $countryCode && $self['countryCode'] = $countryCode;
        null !== $countryISO && $self['countryISO'] = $countryISO;
        null !== $direction && $self['direction'] = $direction;
        null !== $limit && $self['limit'] = $limit;
        null !== $rate && $self['rate'] = $rate;
        null !== $types && $self['types'] = $types;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withMetric(string $metric): self
    {
        $self = clone $this;
        $self['metric'] = $metric;

        return $self;
    }

    public function withService(string $service): self
    {
        $self = clone $this;
        $self['service'] = $service;

        return $self;
    }

    public function withUpdatedAt(string $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    public function withBillingService(string $billingService): self
    {
        $self = clone $this;
        $self['billingService'] = $billingService;

        return $self;
    }

    /**
     * Use country_iso instead.
     */
    public function withCountry(string $country): self
    {
        $self = clone $this;
        $self['country'] = $country;

        return $self;
    }

    public function withCountryCode(int $countryCode): self
    {
        $self = clone $this;
        $self['countryCode'] = $countryCode;

        return $self;
    }

    public function withCountryISO(string $countryISO): self
    {
        $self = clone $this;
        $self['countryISO'] = $countryISO;

        return $self;
    }

    /**
     * An enumeration.
     *
     * @param Direction|value-of<Direction> $direction
     */
    public function withDirection(Direction|string $direction): self
    {
        $self = clone $this;
        $self['direction'] = $direction;

        return $self;
    }

    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    public function withRate(string $rate): self
    {
        $self = clone $this;
        $self['rate'] = $rate;

        return $self;
    }

    /**
     * @param list<string> $types
     */
    public function withTypes(array $types): self
    {
        $self = clone $this;
        $self['types'] = $types;

        return $self;
    }
}
