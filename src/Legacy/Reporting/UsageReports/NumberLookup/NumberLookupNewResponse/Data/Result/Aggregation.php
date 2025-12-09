<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\UsageReports\NumberLookup\NumberLookupNewResponse\Data\Result;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type AggregationShape = array{
 *   currency?: string|null,
 *   totalCost?: float|null,
 *   totalDips?: int|null,
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
        $obj = new self;

        null !== $currency && $obj['currency'] = $currency;
        null !== $totalCost && $obj['totalCost'] = $totalCost;
        null !== $totalDips && $obj['totalDips'] = $totalDips;
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
        $obj['totalCost'] = $totalCost;

        return $obj;
    }

    /**
     * Total number of lookups performed.
     */
    public function withTotalDips(int $totalDips): self
    {
        $obj = clone $this;
        $obj['totalDips'] = $totalDips;

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
