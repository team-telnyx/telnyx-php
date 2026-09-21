<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
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
     * @param Filter|FilterShape $filter Filter records on a given record attribute and value. <br/>Example: filter[status]=delivered. <br/>Required: filter[record_type] must be specified. <br/>The valid filter fields depend on the record_type: filtering by a field that does not exist for the selected record_type is rejected with a 400 error. Call-control and sip-trunking records use started_at, finished_at and answered_at (they have no created_at); messaging records use created_at. To list the fields available for a record_type, use the /v2/detail_records/options endpoint.
     * @param list<string> $sort Specifies the sort order for results. <br/>Example: sort=-created_at <br/>The valid sort fields depend on the record_type: sort by a field that does not exist for the selected record_type is rejected with a 400 error. Call-control and sip-trunking records use started_at, finished_at and answered_at (they have no created_at); messaging records use created_at. To list the fields available for a record_type, use the /v2/detail_records/options endpoint.
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
        $params = array_filter(
            [
                'filter' => $filter ?? Omitted::VALUE,
                'pageNumber' => $pageNumber ?? Omitted::VALUE,
                'pageSize' => $pageSize ?? Omitted::VALUE,
                'sort' => $sort ?? Omitted::VALUE,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
