<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\MessagingProfileMetrics\MessagingProfileMetricListParams;
use Telnyx\MessagingProfileMetrics\MessagingProfileMetricListResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface MessagingProfileMetricsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|MessagingProfileMetricListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessagingProfileMetricListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|MessagingProfileMetricListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
