<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Storage\Buckets;

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
     */
    public function getAPIUsage(
        string $bucketName,
        $filter,
        ?RequestOptions $requestOptions = null
    ): UsageGetAPIUsageResponse;

    /**
     * @api
     *
     * @return UsageGetBucketUsageResponse<HasRawResponse>
     */
    public function getBucketUsage(
        string $bucketName,
        ?RequestOptions $requestOptions = null
    ): UsageGetBucketUsageResponse;
}
