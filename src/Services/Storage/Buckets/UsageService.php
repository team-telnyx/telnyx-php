<?php

declare(strict_types=1);

namespace Telnyx\Services\Storage\Buckets;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Storage\Buckets\UsageContract;
use Telnyx\Storage\Buckets\Usage\UsageGetAPIUsageResponse;
use Telnyx\Storage\Buckets\Usage\UsageGetBucketUsageResponse;

final class UsageService implements UsageContract
{
    /**
     * @api
     */
    public UsageRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new UsageRawService($client);
    }

    /**
     * @api
     *
     * Returns the detail on API usage on a bucket of a particular time period, group by method category.
     *
     * @param string $bucketName The name of the bucket
     * @param array{
     *   endTime: string|\DateTimeInterface, startTime: string|\DateTimeInterface
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[start_time], filter[end_time]
     *
     * @throws APIException
     */
    public function getAPIUsage(
        string $bucketName,
        array $filter,
        ?RequestOptions $requestOptions = null
    ): UsageGetAPIUsageResponse {
        $params = ['filter' => $filter];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getAPIUsage($bucketName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns the amount of storage space and number of files a bucket takes up.
     *
     * @param string $bucketName The name of the bucket
     *
     * @throws APIException
     */
    public function getBucketUsage(
        string $bucketName,
        ?RequestOptions $requestOptions = null
    ): UsageGetBucketUsageResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getBucketUsage($bucketName, requestOptions: $requestOptions);

        return $response->parse();
    }
}
