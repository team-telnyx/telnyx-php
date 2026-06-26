<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\MessagingProfileMetrics\MessagingProfileMetricListParams\TimeFrame;
use Telnyx\MessagingProfileMetrics\MessagingProfileMetricListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MessagingProfileMetricsContract;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class MessagingProfileMetricsService implements MessagingProfileMetricsContract
{
    /**
     * @api
     */
    public MessagingProfileMetricsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new MessagingProfileMetricsRawService($client);
    }

    /**
     * @api
     *
     * List high-level metrics for all messaging profiles belonging to the authenticated user.
     *
     * @param TimeFrame|value-of<TimeFrame> $timeFrame the time frame for metrics
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        TimeFrame|string $timeFrame = '24h',
        RequestOptions|array|null $requestOptions = null,
    ): MessagingProfileMetricListResponse {
        $params = Util::removeNulls(['timeFrame' => $timeFrame]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
