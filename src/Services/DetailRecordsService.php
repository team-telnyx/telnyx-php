<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\DetailRecords\DetailRecordListParams;
use Telnyx\DetailRecords\DetailRecordListParams\Filter;
use Telnyx\DetailRecords\DetailRecordListParams\Page;
use Telnyx\DetailRecords\DetailRecordListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\DetailRecordsContract;

use const Telnyx\Core\OMIT as omit;

final class DetailRecordsService implements DetailRecordsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Search for any detail record across the Telnyx Platform
     *
     * @param Filter $filter Filter records on a given record attribute and value. <br/>Example: filter[status]=delivered. <br/>Required: filter[record_type] must be specified.
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     * @param list<string> $sort Specifies the sort order for results. <br/>Example: sort=-created_at
     *
     * @return DetailRecordListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        $filter = omit,
        $page = omit,
        $sort = omit,
        ?RequestOptions $requestOptions = null,
    ): DetailRecordListResponse {
        $params = ['filter' => $filter, 'page' => $page, 'sort' => $sort];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return DetailRecordListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): DetailRecordListResponse {
        [$parsed, $options] = DetailRecordListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'detail_records',
            query: $parsed,
            options: $options,
            convert: DetailRecordListResponse::class,
        );
    }
}
