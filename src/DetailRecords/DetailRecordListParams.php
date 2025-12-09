<?php

declare(strict_types=1);

namespace Telnyx\DetailRecords;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\DetailRecords\DetailRecordListParams\Filter;
use Telnyx\DetailRecords\DetailRecordListParams\Filter\DateRange;
use Telnyx\DetailRecords\DetailRecordListParams\Filter\RecordType;
use Telnyx\DetailRecords\DetailRecordListParams\Page;

/**
 * Search for any detail record across the Telnyx Platform.
 *
 * @see Telnyx\Services\DetailRecordsService::list()
 *
 * @phpstan-type DetailRecordListParamsShape = array{
 *   filter?: Filter|array{
 *     recordType: value-of<RecordType>, dateRange?: value-of<DateRange>|null
 *   },
 *   page?: Page|array{number?: int|null, size?: int|null},
 *   sort?: list<string>,
 * }
 */
final class DetailRecordListParams implements BaseModel
{
    /** @use SdkModel<DetailRecordListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Filter records on a given record attribute and value. <br/>Example: filter[status]=delivered. <br/>Required: filter[record_type] must be specified.
     */
    #[Optional]
    public ?Filter $filter;

    /**
     * Consolidated page parameter (deepObject style). Originally: page[number], page[size].
     */
    #[Optional]
    public ?Page $page;

    /**
     * Specifies the sort order for results. <br/>Example: sort=-created_at.
     *
     * @var list<string>|null $sort
     */
    #[Optional(list: 'string')]
    public ?array $sort;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Filter|array{
     *   recordType: value-of<RecordType>, dateRange?: value-of<DateRange>|null
     * } $filter
     * @param Page|array{number?: int|null, size?: int|null} $page
     * @param list<string> $sort
     */
    public static function with(
        Filter|array|null $filter = null,
        Page|array|null $page = null,
        ?array $sort = null
    ): self {
        $obj = new self;

        null !== $filter && $obj['filter'] = $filter;
        null !== $page && $obj['page'] = $page;
        null !== $sort && $obj['sort'] = $sort;

        return $obj;
    }

    /**
     * Filter records on a given record attribute and value. <br/>Example: filter[status]=delivered. <br/>Required: filter[record_type] must be specified.
     *
     * @param Filter|array{
     *   recordType: value-of<RecordType>, dateRange?: value-of<DateRange>|null
     * } $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $obj = clone $this;
        $obj['filter'] = $filter;

        return $obj;
    }

    /**
     * Consolidated page parameter (deepObject style). Originally: page[number], page[size].
     *
     * @param Page|array{number?: int|null, size?: int|null} $page
     */
    public function withPage(Page|array $page): self
    {
        $obj = clone $this;
        $obj['page'] = $page;

        return $obj;
    }

    /**
     * Specifies the sort order for results. <br/>Example: sort=-created_at.
     *
     * @param list<string> $sort
     */
    public function withSort(array $sort): self
    {
        $obj = clone $this;
        $obj['sort'] = $sort;

        return $obj;
    }
}
