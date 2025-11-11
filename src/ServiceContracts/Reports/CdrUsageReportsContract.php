<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Reports;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Reports\CdrUsageReports\CdrUsageReportFetchSyncParams;
use Telnyx\Reports\CdrUsageReports\CdrUsageReportFetchSyncResponse;
use Telnyx\RequestOptions;

interface CdrUsageReportsContract
{
    /**
     * @api
     *
     * @param array<mixed>|CdrUsageReportFetchSyncParams $params
     *
     * @throws APIException
     */
    public function fetchSync(
        array|CdrUsageReportFetchSyncParams $params,
        ?RequestOptions $requestOptions = null,
    ): CdrUsageReportFetchSyncResponse;
}
