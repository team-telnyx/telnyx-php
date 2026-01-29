<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\UsageReports\NumberLookup;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type TelcoDataAggregationShape = array{
 *   currency?: string|null,
 *   totalCost?: float|null,
 *   totalDips?: int|null,
 *   type?: string|null,
 * }
 */
final class TelcoDataAggregation implements BaseModel
{
    /** @use SdkModel<TelcoDataAggregationShape> */
    use SdkModel;

    /**
     * Currency code.
     */
    #[Optional]
    public ?string $currency;

    /**
     * Total cost for this aggregation.
     */
    #[Optional('total_cost')]
    public ?float $totalCost;

    /**
     * Total number of lookups performed.
     */
    #[Optional('total_dips')]
    public ?int $totalDips;

    /**
     * Type of telco data lookup.
     */
    #[Optional]
    public ?string $type;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $currency = null,
        ?float $totalCost = null,
        ?int $totalDips = null,
        ?string $type = null,
    ): self {
        $self = new self;

        null !== $currency && $self['currency'] = $currency;
        null !== $totalCost && $self['totalCost'] = $totalCost;
        null !== $totalDips && $self['totalDips'] = $totalDips;
        null !== $type && $self['type'] = $type;

        return $self;
    }

    /**
     * Currency code.
     */
    public function withCurrency(string $currency): self
    {
        $self = clone $this;
        $self['currency'] = $currency;

        return $self;
    }

    /**
     * Total cost for this aggregation.
     */
    public function withTotalCost(float $totalCost): self
    {
        $self = clone $this;
        $self['totalCost'] = $totalCost;

        return $self;
    }

    /**
     * Total number of lookups performed.
     */
    public function withTotalDips(int $totalDips): self
    {
        $self = clone $this;
        $self['totalDips'] = $totalDips;

        return $self;
    }

    /**
     * Type of telco data lookup.
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
