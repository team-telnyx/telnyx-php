<?php

declare(strict_types=1);

namespace Telnyx\DetailRecords\DetailRecordListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\DetailRecords\DetailRecordListParams\Filter\DateRange;
use Telnyx\DetailRecords\DetailRecordListParams\Filter\RecordType;

/**
 * Filter records on a given record attribute and value. <br/>Example: filter[status]=delivered. <br/>Required: filter[record_type] must be specified.
 *
 * @phpstan-type FilterShape = array{
 *   record_type: value-of<RecordType>, date_range?: value-of<DateRange>|null
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Filter by the given record type.
     *
     * @var value-of<RecordType> $record_type
     */
    #[Api(enum: RecordType::class)]
    public string $record_type;

    /**
     * Filter by the given user-friendly date range. You can specify one of the following enum values, or a dynamic one using this format: last_N_days.
     *
     * @var value-of<DateRange>|null $date_range
     */
    #[Api(enum: DateRange::class, optional: true)]
    public ?string $date_range;

    /**
     * `new Filter()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Filter::with(record_type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Filter)->withRecordType(...)
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
     * @param RecordType|value-of<RecordType> $record_type
     * @param DateRange|value-of<DateRange> $date_range
     */
    public static function with(
        RecordType|string $record_type,
        DateRange|string|null $date_range = null
    ): self {
        $obj = new self;

        $obj['record_type'] = $record_type;

        null !== $date_range && $obj['date_range'] = $date_range;

        return $obj;
    }

    /**
     * Filter by the given record type.
     *
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(RecordType|string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }

    /**
     * Filter by the given user-friendly date range. You can specify one of the following enum values, or a dynamic one using this format: last_N_days.
     *
     * @param DateRange|value-of<DateRange> $dateRange
     */
    public function withDateRange(DateRange|string $dateRange): self
    {
        $obj = clone $this;
        $obj['date_range'] = $dateRange;

        return $obj;
    }
}
