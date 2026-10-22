<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\CloudfsCursorPagination;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DialMetrics\DialMetricListParams;
use Telnyx\DialMetrics\DialMetricListParams\Granularity;
use Telnyx\DialMetrics\DialMetricListParams\Sort;
use Telnyx\DialMetrics\DialMetricListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\DialMetricsRawContract;

/**
 * Call information.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class DialMetricsRawService implements DialMetricsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Returns dials-per-second (DPS) metrics for your account's outbound dials made with the Call Control `Dial` command and TeXML, as time buckets with dial counts, accepted and rejected dials, average and peak DPS, and the DPS limit in force.
     *
     * The result has one record per region per bucket, ordered by `start_time` and then `region`, newest first unless `sort=start_time`. Regions are never summed: the DPS limit is enforced per region, so a cross-region total cannot be compared with it.
     *
     * Only buckets that saw dials are returned. Treat a missing bucket as zero dials.
     *
     * Only complete 5-second windows are counted, and a window is counted about 15 seconds after it closes. The newest `granularity=second` record is therefore your live DPS, about 20 seconds old. Request the last minute or two with `sort=-start_time`; the first record of each `region` is that region's live rate (`page[limit]=1` would hide every region but one). If no recent record exists, the live rate is zero.
     *
     * Results are cursor paginated. Follow `meta.next`, or pass `meta.cursors.after` as `page[after]`, until `meta.next` is absent. No total count is returned.
     *
     * This endpoint is in development and can change before general availability.
     *
     * @param array{
     *   endTime: \DateTimeInterface,
     *   granularity: Granularity|value-of<Granularity>,
     *   startTime: \DateTimeInterface,
     *   pageAfter?: string,
     *   pageLimit?: int,
     *   sort?: Sort|value-of<Sort>,
     * }|DialMetricListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CloudfsCursorPagination<DialMetricListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|DialMetricListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = DialMetricListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'dial_metrics',
            query: Util::array_transform_keys(
                $parsed,
                [
                    'endTime' => 'end_time',
                    'startTime' => 'start_time',
                    'pageAfter' => 'page[after]',
                    'pageLimit' => 'page[limit]',
                ],
            ),
            options: $options,
            convert: DialMetricListResponse::class,
            page: CloudfsCursorPagination::class,
        );
    }
}
