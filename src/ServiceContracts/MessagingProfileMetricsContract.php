<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\MessagingProfileMetrics\MessagingProfileMetricListParams\TimeFrame;
use Telnyx\MessagingProfileMetrics\MessagingProfileMetricListResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface MessagingProfileMetricsContract
{
    /**
     * @api
     *
     * @param TimeFrame|value-of<TimeFrame> $timeFrame the time frame for metrics
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        TimeFrame|string $timeFrame = '24h',
        RequestOptions|array|null $requestOptions = null,
    ): MessagingProfileMetricListResponse;
}
