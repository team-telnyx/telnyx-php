<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\DetailRecords\DetailRecordListParams\Filter;
use Telnyx\DetailRecords\DetailRecordListParams\Page;
use Telnyx\DetailRecords\DetailRecordListResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface DetailRecordsContract
{
    /**
     * @api
     *
     * @param Filter $filter Filter records on a given record attribute and value. <br/>Example: filter[status]=delivered. <br/>Required: filter[record_type] must be specified.
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     * @param list<string> $sort Specifies the sort order for results. <br/>Example: sort=-created_at
     */
    public function list(
        $filter = omit,
        $page = omit,
        $sort = omit,
        ?RequestOptions $requestOptions = null,
    ): DetailRecordListResponse;
}
