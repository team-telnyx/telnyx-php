<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\CloudfsCursorPagination;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\DialMetrics\DialMetricListParams\Granularity;
use Telnyx\DialMetrics\DialMetricListParams\Sort;
use Telnyx\DialMetrics\DialMetricListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\DialMetricsContract;

/**
 * Call information.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class DialMetricsService implements DialMetricsContract
{
    /**
     * @api
     */
    public DialMetricsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new DialMetricsRawService($client);
    }

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
     * @param \DateTimeInterface $endTime Exclusive end of the range, ISO 8601. Must be after `start_time`. Buckets that start before this time are returned.
     * @param Granularity|value-of<Granularity> $granularity Bucket size. `second` returns 5-second buckets (the finest resolution) and is kept for the last 48 hours. `minute` and `hour` are kept for the last 30 days.
     * @param \DateTimeInterface $startTime Inclusive start of the range, ISO 8601 (for example `2026-09-29T12:00:00.000Z`). Buckets that start at or after this time are returned. A `start_time` older than the retention window of the chosen `granularity` is moved forward to the start of that window, and `meta.start_time` returns the start actually used.
     * @param string $pageAfter Opaque cursor from `meta.cursors.after` of the previous page. Do not parse or construct it. A cursor that matches no records returns an empty page whose `meta.cursors.after` and `meta.cursors.before` both echo the given cursor.
     * @param int $pageLimit Maximum number of buckets per page. Values outside the range are clamped to 1-10,000.
     * @param Sort|value-of<Sort> $sort Sort order of the buckets by `start_time`. `-start_time` (default) returns the newest first, `start_time` the oldest first. `region` follows the same direction for buckets with the same `start_time`. To read the live rate, use `granularity=second` and `sort=-start_time`, then take the first record of each `region`.
     * @param RequestOpts|null $requestOptions
     *
     * @return CloudfsCursorPagination<DialMetricListResponse>
     *
     * @throws APIException
     */
    public function list(
        \DateTimeInterface $endTime,
        Granularity|string $granularity,
        \DateTimeInterface $startTime,
        ?string $pageAfter = null,
        int $pageLimit = 1000,
        Sort|string $sort = '-start_time',
        RequestOptions|array|null $requestOptions = null,
    ): CloudfsCursorPagination {
        $params = array_filter(
            [
                'endTime' => $endTime,
                'granularity' => $granularity,
                'startTime' => $startTime,
                'pageAfter' => $pageAfter ?? Omitted::VALUE,
                'pageLimit' => $pageLimit,
                'sort' => $sort,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
