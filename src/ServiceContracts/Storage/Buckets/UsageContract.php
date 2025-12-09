<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Storage\Buckets;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Storage\Buckets\Usage\UsageGetAPIUsageResponse;
use Telnyx\Storage\Buckets\Usage\UsageGetBucketUsageResponse;

interface UsageContract
{
    /**
     * @api
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
    ): UsageGetAPIUsageResponse;

    /**
     * @api
     *
     * @param string $bucketName The name of the bucket
     *
     * @throws APIException
     */
    public function getBucketUsage(
        string $bucketName,
        ?RequestOptions $requestOptions = null
    ): UsageGetBucketUsageResponse;
}
