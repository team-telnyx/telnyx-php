<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Reports;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\Reports\MdrUsageReports\MdrUsageReport;
use Telnyx\Reports\MdrUsageReports\MdrUsageReportCreateParams;
use Telnyx\Reports\MdrUsageReports\MdrUsageReportDeleteResponse;
use Telnyx\Reports\MdrUsageReports\MdrUsageReportFetchSyncParams;
use Telnyx\Reports\MdrUsageReports\MdrUsageReportFetchSyncResponse;
use Telnyx\Reports\MdrUsageReports\MdrUsageReportGetResponse;
use Telnyx\Reports\MdrUsageReports\MdrUsageReportListParams;
use Telnyx\Reports\MdrUsageReports\MdrUsageReportNewResponse;
use Telnyx\RequestOptions;

interface MdrUsageReportsContract
{
    /**
     * @api
     *
     * @param array<mixed>|MdrUsageReportCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|MdrUsageReportCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): MdrUsageReportNewResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): MdrUsageReportGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|MdrUsageReportListParams $params
     *
     * @return DefaultFlatPagination<MdrUsageReport>
     *
     * @throws APIException
     */
    public function list(
        array|MdrUsageReportListParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): MdrUsageReportDeleteResponse;

    /**
     * @api
     *
     * @param array<mixed>|MdrUsageReportFetchSyncParams $params
     *
     * @throws APIException
     */
    public function fetchSync(
        array|MdrUsageReportFetchSyncParams $params,
        ?RequestOptions $requestOptions = null,
    ): MdrUsageReportFetchSyncResponse;
}
