<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Wireless;

use Telnyx\RequestOptions;
use Telnyx\Wireless\DetailRecordsReports\DetailRecordsReportDeleteResponse;
use Telnyx\Wireless\DetailRecordsReports\DetailRecordsReportGetResponse;
use Telnyx\Wireless\DetailRecordsReports\DetailRecordsReportListResponse;
use Telnyx\Wireless\DetailRecordsReports\DetailRecordsReportNewResponse;

use const Telnyx\Core\OMIT as omit;

interface DetailRecordsReportsContract
{
    /**
     * @api
     *
     * @param string $endTime ISO 8601 formatted date-time indicating the end time
     * @param string $startTime ISO 8601 formatted date-time indicating the start time
     */
    public function create(
        $endTime = omit,
        $startTime = omit,
        ?RequestOptions $requestOptions = null,
    ): DetailRecordsReportNewResponse;

    /**
     * @api
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): DetailRecordsReportGetResponse;

    /**
     * @api
     *
     * @param int $pageNumber the page number to load
     * @param int $pageSize the size of the page
     */
    public function list(
        $pageNumber = omit,
        $pageSize = omit,
        ?RequestOptions $requestOptions = null,
    ): DetailRecordsReportListResponse;

    /**
     * @api
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): DetailRecordsReportDeleteResponse;
}
