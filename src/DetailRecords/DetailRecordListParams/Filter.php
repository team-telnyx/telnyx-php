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
 * @phpstan-type filter_alias = array{
 *   recordType: value-of<RecordType>, dateRange?: value-of<DateRange>
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<filter_alias> */
    use SdkModel;

    /**
     * Filter by the given record type.
     *
     * @var value-of<RecordType> $recordType
     */
    #[Api('record_type', enum: RecordType::class)]
    public string $recordType;

    /**
     * Filter by the given user-friendly date range. You can specify one of the following enum values, or a dynamic one using this format: last_N_days.
     *
     * @var value-of<DateRange>|null $dateRange
     */
    #[Api('date_range', enum: DateRange::class, optional: true)]
    public ?string $dateRange;

    /**
     * `new Filter()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Filter::with(recordType: ...)
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
     * @param RecordType|value-of<RecordType> $recordType
     * @param DateRange|value-of<DateRange> $dateRange
     */
    public static function with(
        RecordType|string $recordType,
        DateRange|string|null $dateRange = null
    ): self {
        $obj = new self;

        $obj->recordType = $recordType instanceof RecordType ? $recordType->value : $recordType;

        null !== $dateRange && $obj->dateRange = $dateRange instanceof DateRange ? $dateRange->value : $dateRange;

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
        $obj->recordType = $recordType instanceof RecordType ? $recordType->value : $recordType;

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
        $obj->dateRange = $dateRange instanceof DateRange ? $dateRange->value : $dateRange;

        return $obj;
    }
}
