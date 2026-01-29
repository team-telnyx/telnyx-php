<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Storage\Buckets;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Storage\Buckets\Usage\UsageGetAPIUsageParams\Filter;
use Telnyx\Storage\Buckets\Usage\UsageGetAPIUsageResponse;
use Telnyx\Storage\Buckets\Usage\UsageGetBucketUsageResponse;

/**
 * @phpstan-import-type FilterShape from \Telnyx\Storage\Buckets\Usage\UsageGetAPIUsageParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface UsageContract
{
    /**
     * @api
     *
     * @param string $bucketName The name of the bucket
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[start_time], filter[end_time]
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getAPIUsage(
        string $bucketName,
        Filter|array $filter,
        RequestOptions|array|null $requestOptions = null,
    ): UsageGetAPIUsageResponse;

    /**
     * @api
     *
     * @param string $bucketName The name of the bucket
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getBucketUsage(
        string $bucketName,
        RequestOptions|array|null $requestOptions = null
    ): UsageGetBucketUsageResponse;
}
