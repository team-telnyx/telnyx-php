<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\UsageReports\NumberLookup\NumberLookupListResponse\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Legacy\Reporting\UsageReports\NumberLookup\NumberLookupListResponse\Data\Result\Aggregation;

/**
 * @phpstan-type ResultShape = array{
 *   aggregations?: list<Aggregation>|null,
 *   record_type?: string|null,
 *   user_id?: string|null,
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
    #[Api(list: Aggregation::class, optional: true)]
    public ?array $aggregations;

    /**
     * Record type identifier.
     */
    #[Api(optional: true)]
    public ?string $record_type;

    /**
     * User ID.
     */
    #[Api(optional: true)]
    public ?string $user_id;

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
     *   total_cost?: float|null,
     *   total_dips?: int|null,
     *   type?: string|null,
     * }> $aggregations
     */
    public static function with(
        ?array $aggregations = null,
        ?string $record_type = null,
        ?string $user_id = null,
    ): self {
        $obj = new self;

        null !== $aggregations && $obj['aggregations'] = $aggregations;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $user_id && $obj['user_id'] = $user_id;

        return $obj;
    }

    /**
     * List of aggregations by lookup type.
     *
     * @param list<Aggregation|array{
     *   currency?: string|null,
     *   total_cost?: float|null,
     *   total_dips?: int|null,
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
        $obj['record_type'] = $recordType;

        return $obj;
    }

    /**
     * User ID.
     */
    public function withUserID(string $userID): self
    {
        $obj = clone $this;
        $obj['user_id'] = $userID;

        return $obj;
    }
}
