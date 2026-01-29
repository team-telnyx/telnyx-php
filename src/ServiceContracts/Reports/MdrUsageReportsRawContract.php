<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Reports;

use Telnyx\Core\Contracts\BaseResponse;
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

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface MdrUsageReportsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|MdrUsageReportCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MdrUsageReportNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|MdrUsageReportCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MdrUsageReportGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|MdrUsageReportListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<MdrUsageReport>>
     *
     * @throws APIException
     */
    public function list(
        array|MdrUsageReportListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MdrUsageReportDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|MdrUsageReportFetchSyncParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MdrUsageReportFetchSyncResponse>
     *
     * @throws APIException
     */
    public function fetchSync(
        array|MdrUsageReportFetchSyncParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
