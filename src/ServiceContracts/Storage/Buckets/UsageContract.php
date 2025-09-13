<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Storage\Buckets;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\Storage\Buckets\Usage\UsageGetAPIUsageParams\Filter;
use Telnyx\Storage\Buckets\Usage\UsageGetAPIUsageResponse;
use Telnyx\Storage\Buckets\Usage\UsageGetBucketUsageResponse;

interface UsageContract
{
    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[start_time], filter[end_time]
     *
     * @return UsageGetAPIUsageResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function getAPIUsage(
        string $bucketName,
        $filter,
        ?RequestOptions $requestOptions = null
    ): UsageGetAPIUsageResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return UsageGetAPIUsageResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function getAPIUsageRaw(
        string $bucketName,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): UsageGetAPIUsageResponse;

    /**
     * @api
     *
     * @return UsageGetBucketUsageResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function getBucketUsage(
        string $bucketName,
        ?RequestOptions $requestOptions = null
    ): UsageGetBucketUsageResponse;

    /**
     * @api
     *
     * @return UsageGetBucketUsageResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function getBucketUsageRaw(
        string $bucketName,
        mixed $params,
        ?RequestOptions $requestOptions = null,
    ): UsageGetBucketUsageResponse;
}
