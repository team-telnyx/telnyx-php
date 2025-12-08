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
 * }
 */
final class BundleLimit implements BaseModel
{
    /** @use SdkModel<BundleLimitShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required]
    public \DateTimeInterface $created_at;

    #[Required]
    public string $metric;

    #[Required]
    public string $service;

    #[Required]
    public \DateTimeInterface $updated_at;

    #[Optional]
    public ?string $billing_service;

    /**
     * @deprecated
     *
     * Use country_iso instead
     */
    #[Optional]
    public ?string $country;

    #[Optional]
    public ?int $country_code;

    #[Optional]
    public ?string $country_iso;

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
     *   id: ..., created_at: ..., metric: ..., service: ..., updated_at: ...
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
        \DateTimeInterface $created_at,
        string $metric,
        string $service,
        \DateTimeInterface $updated_at,
        ?string $billing_service = null,
        ?string $country = null,
        ?int $country_code = null,
        ?string $country_iso = null,
        Direction|string|null $direction = null,
        ?int $limit = null,
        ?string $rate = null,
        ?array $types = null,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['created_at'] = $created_at;
        $obj['metric'] = $metric;
        $obj['service'] = $service;
        $obj['updated_at'] = $updated_at;

        null !== $billing_service && $obj['billing_service'] = $billing_service;
        null !== $country && $obj['country'] = $country;
        null !== $country_code && $obj['country_code'] = $country_code;
        null !== $country_iso && $obj['country_iso'] = $country_iso;
        null !== $direction && $obj['direction'] = $direction;
        null !== $limit && $obj['limit'] = $limit;
        null !== $rate && $obj['rate'] = $rate;
        null !== $types && $obj['types'] = $types;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    public function withMetric(string $metric): self
    {
        $obj = clone $this;
        $obj['metric'] = $metric;

        return $obj;
    }

    public function withService(string $service): self
    {
        $obj = clone $this;
        $obj['service'] = $service;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updated_at'] = $updatedAt;

        return $obj;
    }

    public function withBillingService(string $billingService): self
    {
        $obj = clone $this;
        $obj['billing_service'] = $billingService;

        return $obj;
    }

    /**
     * Use country_iso instead.
     */
    public function withCountry(string $country): self
    {
        $obj = clone $this;
        $obj['country'] = $country;

        return $obj;
    }

    public function withCountryCode(int $countryCode): self
    {
        $obj = clone $this;
        $obj['country_code'] = $countryCode;

        return $obj;
    }

    public function withCountryISO(string $countryISO): self
    {
        $obj = clone $this;
        $obj['country_iso'] = $countryISO;

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
        $obj['limit'] = $limit;

        return $obj;
    }

    public function withRate(string $rate): self
    {
        $obj = clone $this;
        $obj['rate'] = $rate;

        return $obj;
    }

    /**
     * @param list<string> $types
     */
    public function withTypes(array $types): self
    {
        $obj = clone $this;
        $obj['types'] = $types;

        return $obj;
    }
}
