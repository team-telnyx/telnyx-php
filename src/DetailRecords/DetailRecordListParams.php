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
 *   filter?: null|Filter|FilterShape,
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
     * Filter records on a given record attribute and value. <br/>Example: filter[status]=delivered. <br/>Required: filter[record_type] must be specified. <br/>The valid filter fields depend on the record_type: filtering by a field that does not exist for the selected record_type is rejected with a 400 error. Call-control and sip-trunking records use started_at, finished_at and answered_at (they have no created_at); messaging records use created_at. To list the fields available for a record_type, use the /v2/detail_records/options endpoint.
     */
    #[Optional]
    public ?Filter $filter;

    #[Optional]
    public ?int $pageNumber;

    #[Optional]
    public ?int $pageSize;

    /**
     * Specifies the sort order for results. <br/>Example: sort=-created_at <br/>The valid sort fields depend on the record_type: sort by a field that does not exist for the selected record_type is rejected with a 400 error. Call-control and sip-trunking records use started_at, finished_at and answered_at (they have no created_at); messaging records use created_at. To list the fields available for a record_type, use the /v2/detail_records/options endpoint.
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
     * @param Filter|FilterShape|null $filter
     * @param list<string>|null $sort
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
     * Filter records on a given record attribute and value. <br/>Example: filter[status]=delivered. <br/>Required: filter[record_type] must be specified. <br/>The valid filter fields depend on the record_type: filtering by a field that does not exist for the selected record_type is rejected with a 400 error. Call-control and sip-trunking records use started_at, finished_at and answered_at (they have no created_at); messaging records use created_at. To list the fields available for a record_type, use the /v2/detail_records/options endpoint.
     *
     * @param Filter|FilterShape $filter
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
     * Specifies the sort order for results. <br/>Example: sort=-created_at <br/>The valid sort fields depend on the record_type: sort by a field that does not exist for the selected record_type is rejected with a 400 error. Call-control and sip-trunking records use started_at, finished_at and answered_at (they have no created_at); messaging records use created_at. To list the fields available for a record_type, use the /v2/detail_records/options endpoint.
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
