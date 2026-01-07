<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Reports;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Reports\CdrUsageReports\CdrUsageReportFetchSyncParams;
use Telnyx\Reports\CdrUsageReports\CdrUsageReportFetchSyncResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface CdrUsageReportsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|CdrUsageReportFetchSyncParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CdrUsageReportFetchSyncResponse>
     *
     * @throws APIException
     */
    public function fetchSync(
        array|CdrUsageReportFetchSyncParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
