<?php

declare(strict_types=1);

namespace Telnyx\DetailRecords;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\DetailRecords\DetailRecordListParams\Filter;

/**
 * Search for any detail record across the Telnyx Platform.
 *
 * @see Telnyx\Services\DetailRecordsService::list()
 *
 * @phpstan-import-type FilterShape from \Telnyx\DetailRecords\DetailRecordListParams\Filter
 *
 * @phpstan-type DetailRecordListParamsShape = array{
 *   filter?: FilterShape|null,
 *   pageNumber?: int|null,
 *   pageSize?: int|null,
 *   sort?: list<string>|null,
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

    #[Optional]
    public ?int $pageNumber;

    #[Optional]
    public ?int $pageSize;

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
     * @param FilterShape $filter
     * @param list<string> $sort
     */
    public static function with(
        Filter|array|null $filter = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        ?array $sort = null,
    ): self {
        $self = new self;

        null !== $filter && $self['filter'] = $filter;
        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;
        null !== $sort && $self['sort'] = $sort;

        return $self;
    }

    /**
     * Filter records on a given record attribute and value. <br/>Example: filter[status]=delivered. <br/>Required: filter[record_type] must be specified.
     *
     * @param FilterShape $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $self = clone $this;
        $self['filter'] = $filter;

        return $self;
    }

    public function withPageNumber(int $pageNumber): self
    {
        $self = clone $this;
        $self['pageNumber'] = $pageNumber;

        return $self;
    }

    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * Specifies the sort order for results. <br/>Example: sort=-created_at.
     *
     * @param list<string> $sort
     */
    public function withSort(array $sort): self
    {
        $self = clone $this;
        $self['sort'] = $sort;

        return $self;
    }
}
