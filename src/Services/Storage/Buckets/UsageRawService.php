<?php

declare(strict_types=1);

namespace Telnyx\Services\Storage\Buckets;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Storage\Buckets\UsageRawContract;
use Telnyx\Storage\Buckets\Usage\UsageGetAPIUsageParams;
use Telnyx\Storage\Buckets\Usage\UsageGetAPIUsageResponse;
use Telnyx\Storage\Buckets\Usage\UsageGetBucketUsageResponse;

final class UsageRawService implements UsageRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Returns the detail on API usage on a bucket of a particular time period, group by method category.
     *
     * @param string $bucketName The name of the bucket
     * @param array{
     *   filter: array{
     *     endTime: string|\DateTimeInterface, startTime: string|\DateTimeInterface
     *   },
     * }|UsageGetAPIUsageParams $params
     *
     * @return BaseResponse<UsageGetAPIUsageResponse>
     *
     * @throws APIException
     */
    public function getAPIUsage(
        string $bucketName,
        array|UsageGetAPIUsageParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = UsageGetAPIUsageParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $bucketName The name of the bucket
     *
     * @return BaseResponse<UsageGetBucketUsageResponse>
     *
     * @throws APIException
     */
    public function getBucketUsage(
        string $bucketName,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['storage/buckets/%1$s/usage/storage', $bucketName],
            options: $requestOptions,
            convert: UsageGetBucketUsageResponse::class,
        );
    }
}
