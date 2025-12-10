<?php

declare(strict_types=1);

namespace Telnyx\Services\Wireless;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Wireless\DetailRecordsReportsContract;
use Telnyx\Wireless\DetailRecordsReports\DetailRecordsReportDeleteResponse;
use Telnyx\Wireless\DetailRecordsReports\DetailRecordsReportGetResponse;
use Telnyx\Wireless\DetailRecordsReports\DetailRecordsReportListResponse;
use Telnyx\Wireless\DetailRecordsReports\DetailRecordsReportNewResponse;

final class DetailRecordsReportsService implements DetailRecordsReportsContract
{
    /**
     * @api
     */
    public DetailRecordsReportsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new DetailRecordsReportsRawService($client);
    }

    /**
     * @api
     *
     * Asynchronously create a report containing Wireless Detail Records (WDRs) for the SIM cards that consumed wireless data in the given time period.
     *
     * @param string $endTime ISO 8601 formatted date-time indicating the end time
     * @param string $startTime ISO 8601 formatted date-time indicating the start time
     *
     * @throws APIException
     */
    public function create(
        ?string $endTime = null,
        ?string $startTime = null,
        ?RequestOptions $requestOptions = null,
    ): DetailRecordsReportNewResponse {
        $params = Util::removeNulls(
            ['endTime' => $endTime, 'startTime' => $startTime]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns one specific WDR report
     *
     * @param string $id identifies the resource
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): DetailRecordsReportGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns the WDR Reports that match the given parameters.
     *
     * @param int $pageNumber the page number to load
     * @param int $pageSize the size of the page
     *
     * @throws APIException
     */
    public function list(
        int $pageNumber = 1,
        int $pageSize = 20,
        ?RequestOptions $requestOptions = null,
    ): DetailRecordsReportListResponse {
        $params = Util::removeNulls(
            ['pageNumber' => $pageNumber, 'pageSize' => $pageSize]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Deletes one specific WDR report.
     *
     * @param string $id identifies the resource
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): DetailRecordsReportDeleteResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
