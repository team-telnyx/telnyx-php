<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Storage\Buckets;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Storage\Buckets\Usage\UsageGetAPIUsageParams;
use Telnyx\Storage\Buckets\Usage\UsageGetAPIUsageResponse;
use Telnyx\Storage\Buckets\Usage\UsageGetBucketUsageResponse;

interface UsageContract
{
    /**
     * @api
     *
     * @param array<mixed>|UsageGetAPIUsageParams $params
     *
     * @throws APIException
     */
    public function getAPIUsage(
        string $bucketName,
        array|UsageGetAPIUsageParams $params,
        ?RequestOptions $requestOptions = null,
    ): UsageGetAPIUsageResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function getBucketUsage(
        string $bucketName,
        ?RequestOptions $requestOptions = null
    ): UsageGetBucketUsageResponse;
}
