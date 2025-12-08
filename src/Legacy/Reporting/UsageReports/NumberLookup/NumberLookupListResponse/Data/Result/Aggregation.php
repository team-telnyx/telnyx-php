<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\UsageReports\NumberLookup\NumberLookupListResponse\Data\Result;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type AggregationShape = array{
 *   currency?: string|null,
 *   total_cost?: float|null,
 *   total_dips?: int|null,
 *   type?: string|null,
 * }
 */
final class Aggregation implements BaseModel
{
    /** @use SdkModel<AggregationShape> */
    use SdkModel;

    /**
     * Currency code.
     */
    #[Optional]
    public ?string $currency;

    /**
     * Total cost for this aggregation.
     */
    #[Optional]
    public ?float $total_cost;

    /**
     * Total number of lookups performed.
     */
    #[Optional]
    public ?int $total_dips;

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
        ?float $total_cost = null,
        ?int $total_dips = null,
        ?string $type = null,
    ): self {
        $obj = new self;

        null !== $currency && $obj['currency'] = $currency;
        null !== $total_cost && $obj['total_cost'] = $total_cost;
        null !== $total_dips && $obj['total_dips'] = $total_dips;
        null !== $type && $obj['type'] = $type;

        return $obj;
    }

    /**
     * Currency code.
     */
    public function withCurrency(string $currency): self
    {
        $obj = clone $this;
        $obj['currency'] = $currency;

        return $obj;
    }

    /**
     * Total cost for this aggregation.
     */
    public function withTotalCost(float $totalCost): self
    {
        $obj = clone $this;
        $obj['total_cost'] = $totalCost;

        return $obj;
    }

    /**
     * Total number of lookups performed.
     */
    public function withTotalDips(int $totalDips): self
    {
        $obj = clone $this;
        $obj['total_dips'] = $totalDips;

        return $obj;
    }

    /**
     * Type of telco data lookup.
     */
    public function withType(string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }
}
