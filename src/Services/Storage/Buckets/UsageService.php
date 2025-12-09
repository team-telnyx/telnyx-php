<?php

declare(strict_types=1);

namespace Telnyx\Services\Storage\Buckets;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Storage\Buckets\UsageContract;
use Telnyx\Storage\Buckets\Usage\UsageGetAPIUsageParams;
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
     * @param array{
     *   filter: array{
     *     endTime: string|\DateTimeInterface, startTime: string|\DateTimeInterface
     *   },
     * }|UsageGetAPIUsageParams $params
     *
     * @throws APIException
     */
    public function getAPIUsage(
        string $bucketName,
        array|UsageGetAPIUsageParams $params,
        ?RequestOptions $requestOptions = null,
    ): UsageGetAPIUsageResponse {
        [$parsed, $options] = UsageGetAPIUsageParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<UsageGetAPIUsageResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['storage/buckets/%1$s/usage/api', $bucketName],
            query: $parsed,
            options: $options,
            convert: UsageGetAPIUsageResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns the amount of storage space and number of files a bucket takes up.
     *
     * @throws APIException
     */
    public function getBucketUsage(
        string $bucketName,
        ?RequestOptions $requestOptions = null
    ): UsageGetBucketUsageResponse {
        /** @var BaseResponse<UsageGetBucketUsageResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['storage/buckets/%1$s/usage/storage', $bucketName],
            options: $requestOptions,
            convert: UsageGetBucketUsageResponse::class,
        );

        return $response->parse();
    }
}
