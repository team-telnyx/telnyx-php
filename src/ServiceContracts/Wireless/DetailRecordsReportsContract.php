<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Wireless;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Wireless\DetailRecordsReports\DetailRecordsReportDeleteResponse;
use Telnyx\Wireless\DetailRecordsReports\DetailRecordsReportGetResponse;
use Telnyx\Wireless\DetailRecordsReports\DetailRecordsReportListResponse;
use Telnyx\Wireless\DetailRecordsReports\DetailRecordsReportNewResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface DetailRecordsReportsContract
{
    /**
     * @api
     *
     * @param string $endTime ISO 8601 formatted date-time indicating the end time
     * @param string $startTime ISO 8601 formatted date-time indicating the start time
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        ?string $endTime = null,
        ?string $startTime = null,
        RequestOptions|array|null $requestOptions = null,
    ): DetailRecordsReportNewResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): DetailRecordsReportGetResponse;

    /**
     * @api
     *
     * @param int $pageNumber the page number to load
     * @param int $pageSize the size of the page
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        int $pageNumber = 1,
        int $pageSize = 20,
        RequestOptions|array|null $requestOptions = null,
    ): DetailRecordsReportListResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): DetailRecordsReportDeleteResponse;
}
