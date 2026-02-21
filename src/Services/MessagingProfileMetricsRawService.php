<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\MessagingProfileMetrics\MessagingProfileMetricListParams;
use Telnyx\MessagingProfileMetrics\MessagingProfileMetricListParams\TimeFrame;
use Telnyx\MessagingProfileMetrics\MessagingProfileMetricListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MessagingProfileMetricsRawContract;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class MessagingProfileMetricsRawService implements MessagingProfileMetricsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * List high-level metrics for all messaging profiles belonging to the authenticated user.
     *
     * @param array{
     *   timeFrame?: TimeFrame|value-of<TimeFrame>
     * }|MessagingProfileMetricListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessagingProfileMetricListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|MessagingProfileMetricListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MessagingProfileMetricListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'messaging_profile_metrics',
            query: Util::array_transform_keys($parsed, ['timeFrame' => 'time_frame']),
            options: $options,
            convert: MessagingProfileMetricListResponse::class,
        );
    }
}
