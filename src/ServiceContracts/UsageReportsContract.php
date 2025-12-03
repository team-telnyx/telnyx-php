<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\UsageReports\UsageReportGetOptionsParams;
use Telnyx\UsageReports\UsageReportGetOptionsResponse;
use Telnyx\UsageReports\UsageReportListParams;

interface UsageReportsContract
{
    /**
     * @api
     *
     * @param array<mixed>|UsageReportListParams $params
     *
     * @return DefaultFlatPagination<array<string,mixed>>
     *
     * @throws APIException
     */
    public function list(
        array|UsageReportListParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultFlatPagination;

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
