<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\UsageReports\UsageReportGetOptionsParams;
use Telnyx\UsageReports\UsageReportGetOptionsResponse;
use Telnyx\UsageReports\UsageReportListParams;
use Telnyx\UsageReports\UsageReportListResponse;

interface UsageReportsContract
{
    /**
     * @api
     *
     * @param array<mixed>|UsageReportListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|UsageReportListParams $params,
        ?RequestOptions $requestOptions = null,
    ): UsageReportListResponse;

    /**
     * @api
     *
     * @param array<mixed>|UsageReportGetOptionsParams $params
     *
     * @throws APIException
     */
    public function getOptions(
        array|UsageReportGetOptionsParams $params,
        ?RequestOptions $requestOptions = null,
    ): UsageReportGetOptionsResponse;
}
