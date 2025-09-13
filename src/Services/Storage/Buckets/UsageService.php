<?php

declare(strict_types=1);

namespace Telnyx\Services\Storage\Buckets;

use Telnyx\Client;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Storage\Buckets\UsageContract;
use Telnyx\Storage\Buckets\Usage\UsageGetAPIUsageParams;
use Telnyx\Storage\Buckets\Usage\UsageGetAPIUsageParams\Filter;
use Telnyx\Storage\Buckets\Usage\UsageGetAPIUsageResponse;
use Telnyx\Storage\Buckets\Usage\UsageGetBucketUsageResponse;

final class UsageService implements UsageContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Returns the detail on API usage on a bucket of a particular time period, group by method category.
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[start_time], filter[end_time]
     *
     * @return UsageGetAPIUsageResponse<HasRawResponse>
     */
    public function getAPIUsage(
        string $bucketName,
        $filter,
        ?RequestOptions $requestOptions = null
    ): UsageGetAPIUsageResponse {
        [$parsed, $options] = UsageGetAPIUsageParams::parseRequest(
            ['filter' => $filter],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['storage/buckets/%1$s/usage/api', $bucketName],
            query: $parsed,
            options: $options,
            convert: UsageGetAPIUsageResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns the amount of storage space and number of files a bucket takes up.
     *
     * @return UsageGetBucketUsageResponse<HasRawResponse>
     */
    public function getBucketUsage(
        string $bucketName,
        ?RequestOptions $requestOptions = null
    ): UsageGetBucketUsageResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['storage/buckets/%1$s/usage/storage', $bucketName],
            options: $requestOptions,
            convert: UsageGetBucketUsageResponse::class,
        );
    }
}
