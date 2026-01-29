<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\DetailRecords\DetailRecordListParams\Filter;
use Telnyx\DetailRecords\DetailRecordListResponse\AmdDetailRecord;
use Telnyx\DetailRecords\DetailRecordListResponse\ConferenceDetailRecord;
use Telnyx\DetailRecords\DetailRecordListResponse\ConferenceParticipantDetailRecord;
use Telnyx\DetailRecords\DetailRecordListResponse\MediaStorageDetailRecord;
use Telnyx\DetailRecords\DetailRecordListResponse\MessageDetailRecord;
use Telnyx\DetailRecords\DetailRecordListResponse\SimCardUsageDetailRecord;
use Telnyx\DetailRecords\DetailRecordListResponse\VerifyDetailRecord;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type FilterShape from \Telnyx\DetailRecords\DetailRecordListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface DetailRecordsContract
{
    /**
     * @api
     *
     * @param Filter|FilterShape $filter Filter records on a given record attribute and value. <br/>Example: filter[status]=delivered. <br/>Required: filter[record_type] must be specified.
     * @param list<string> $sort Specifies the sort order for results. <br/>Example: sort=-created_at
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<MessageDetailRecord|ConferenceDetailRecord|ConferenceParticipantDetailRecord|AmdDetailRecord|VerifyDetailRecord|SimCardUsageDetailRecord|MediaStorageDetailRecord,>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        ?array $sort = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;
}
