<?php

declare(strict_types=1);

namespace Telnyx\DetailRecords;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\DetailRecords\DetailRecordListParams\Filter;

/**
 * Search for any detail record across the Telnyx Platform.
 *
 * @see Telnyx\Services\DetailRecordsService::list()
 *
 * @phpstan-type DetailRecordListParamsShape = array{
 *   filter?: Filter, page_number_?: int, page_size_?: int, sort?: list<string>
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
    #[Api(optional: true)]
    public ?Filter $filter;

    #[Api(optional: true)]
    public ?int $page_number_;

    #[Api(optional: true)]
    public ?int $page_size_;

    /**
     * Specifies the sort order for results. <br/>Example: sort=-created_at.
     *
     * @var list<string>|null $sort
     */
    #[Api(list: 'string', optional: true)]
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
     * @param list<string> $sort
     */
    public static function with(
        ?Filter $filter = null,
        ?int $page_number_ = null,
        ?int $page_size_ = null,
        ?array $sort = null,
    ): self {
        $obj = new self;

        null !== $filter && $obj->filter = $filter;
        null !== $page_number_ && $obj->page_number_ = $page_number_;
        null !== $page_size_ && $obj->page_size_ = $page_size_;
        null !== $sort && $obj->sort = $sort;

        return $obj;
    }

    /**
     * Filter records on a given record attribute and value. <br/>Example: filter[status]=delivered. <br/>Required: filter[record_type] must be specified.
     */
    public function withFilter(Filter $filter): self
    {
        $obj = clone $this;
        $obj->filter = $filter;

        return $obj;
    }

    public function withPageNumber(int $pageNumber): self
    {
        $obj = clone $this;
        $obj->page_number_ = $pageNumber;

        return $obj;
    }

    public function withPageSize(int $pageSize): self
    {
        $obj = clone $this;
        $obj->page_size_ = $pageSize;

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
        $obj->sort = $sort;

        return $obj;
    }
}
