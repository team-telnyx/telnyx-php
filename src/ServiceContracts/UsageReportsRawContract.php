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

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface UsageReportsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|UsageReportListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<array<string,mixed>>>
     *
     * @throws APIException
     */
    public function list(
        array|UsageReportListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|UsageReportGetOptionsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UsageReportGetOptionsResponse>
     *
     * @throws APIException
     */
    public function getOptions(
        array|UsageReportGetOptionsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
