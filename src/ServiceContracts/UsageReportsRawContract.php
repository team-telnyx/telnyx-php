<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\UsageReports\UsageReportGetOptionsParams;
use Telnyx\UsageReports\UsageReportGetOptionsResponse;
use Telnyx\UsageReports\UsageReportListParams;

interface UsageReportsRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|UsageReportListParams $params
     *
     * @return BaseResponse<DefaultFlatPagination<array<string,mixed>>>
     *
     * @throws APIException
     */
    public function list(
        array|UsageReportListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|UsageReportGetOptionsParams $params
     *
     * @return BaseResponse<UsageReportGetOptionsResponse>
     *
     * @throws APIException
     */
    public function getOptions(
        array|UsageReportGetOptionsParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
