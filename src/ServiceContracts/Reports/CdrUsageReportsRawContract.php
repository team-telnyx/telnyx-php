<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Reports;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Reports\CdrUsageReports\CdrUsageReportFetchSyncParams;
use Telnyx\Reports\CdrUsageReports\CdrUsageReportFetchSyncResponse;
use Telnyx\RequestOptions;

interface CdrUsageReportsRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|CdrUsageReportFetchSyncParams $params
     *
     * @return BaseResponse<CdrUsageReportFetchSyncResponse>
     *
     * @throws APIException
     */
    public function fetchSync(
        array|CdrUsageReportFetchSyncParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
