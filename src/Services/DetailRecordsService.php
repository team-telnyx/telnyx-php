<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
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
use Telnyx\ServiceContracts\DetailRecordsContract;

/**
 * Detail Records operations.
 *
 * @phpstan-import-type FilterShape from \Telnyx\DetailRecords\DetailRecordListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class DetailRecordsService implements DetailRecordsContract
{
    /**
     * @api
     */
    public DetailRecordsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new DetailRecordsRawService($client);
    }

    /**
     * @api
     *
     * Search for any detail record across the Telnyx Platform
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
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            [
                'filter' => $filter,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
                'sort' => $sort,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
