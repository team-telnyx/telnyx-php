<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\CloudfsCursorPagination;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DialMetrics\DialMetricListParams;
use Telnyx\DialMetrics\DialMetricListResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface DialMetricsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|DialMetricListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CloudfsCursorPagination<DialMetricListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|DialMetricListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
