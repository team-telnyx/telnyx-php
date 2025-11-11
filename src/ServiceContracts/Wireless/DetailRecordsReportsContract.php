<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Wireless;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Wireless\DetailRecordsReports\DetailRecordsReportCreateParams;
use Telnyx\Wireless\DetailRecordsReports\DetailRecordsReportDeleteResponse;
use Telnyx\Wireless\DetailRecordsReports\DetailRecordsReportGetResponse;
use Telnyx\Wireless\DetailRecordsReports\DetailRecordsReportListParams;
use Telnyx\Wireless\DetailRecordsReports\DetailRecordsReportListResponse;
use Telnyx\Wireless\DetailRecordsReports\DetailRecordsReportNewResponse;

interface DetailRecordsReportsContract
{
    /**
     * @api
     *
     * @param array<mixed>|DetailRecordsReportCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|DetailRecordsReportCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): DetailRecordsReportNewResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): DetailRecordsReportGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|DetailRecordsReportListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|DetailRecordsReportListParams $params,
        ?RequestOptions $requestOptions = null,
    ): DetailRecordsReportListResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): DetailRecordsReportDeleteResponse;
}
