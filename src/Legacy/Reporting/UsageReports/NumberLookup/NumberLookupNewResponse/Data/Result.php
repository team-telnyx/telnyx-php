<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\UsageReports\NumberLookup\NumberLookupNewResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Legacy\Reporting\UsageReports\NumberLookup\NumberLookupNewResponse\Data\Result\Aggregation;

/**
 * @phpstan-type ResultShape = array{
 *   aggregations?: list<Aggregation>|null,
 *   recordType?: string|null,
 *   userID?: string|null,
 * }
 */
final class Result implements BaseModel
{
    /** @use SdkModel<ResultShape> */
    use SdkModel;

    /**
     * List of aggregations by lookup type.
     *
     * @var list<Aggregation>|null $aggregations
     */
    #[Optional(list: Aggregation::class)]
    public ?array $aggregations;

    /**
     * Record type identifier.
     */
    #[Optional('record_type')]
    public ?string $recordType;

    /**
     * User ID.
     */
    #[Optional('user_id')]
    public ?string $userID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Aggregation|array{
     *   currency?: string|null,
     *   totalCost?: float|null,
     *   totalDips?: int|null,
     *   type?: string|null,
     * }> $aggregations
     */
    public static function with(
        ?array $aggregations = null,
        ?string $recordType = null,
        ?string $userID = null
    ): self {
        $obj = new self;

        null !== $aggregations && $obj['aggregations'] = $aggregations;
        null !== $recordType && $obj['recordType'] = $recordType;
        null !== $userID && $obj['userID'] = $userID;

        return $obj;
    }

    /**
     * List of aggregations by lookup type.
     *
     * @param list<Aggregation|array{
     *   currency?: string|null,
     *   totalCost?: float|null,
     *   totalDips?: int|null,
     *   type?: string|null,
     * }> $aggregations
     */
    public function withAggregations(array $aggregations): self
    {
        $obj = clone $this;
        $obj['aggregations'] = $aggregations;

        return $obj;
    }

    /**
     * Record type identifier.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['recordType'] = $recordType;

        return $obj;
    }

    /**
     * User ID.
     */
    public function withUserID(string $userID): self
    {
        $obj = clone $this;
        $obj['userID'] = $userID;

        return $obj;
    }
}
