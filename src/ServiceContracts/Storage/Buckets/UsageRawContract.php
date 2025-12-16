<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Storage\Buckets;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Storage\Buckets\Usage\UsageGetAPIUsageParams;
use Telnyx\Storage\Buckets\Usage\UsageGetAPIUsageResponse;
use Telnyx\Storage\Buckets\Usage\UsageGetBucketUsageResponse;

interface UsageRawContract
{
    /**
     * @api
     *
     * @param string $bucketName The name of the bucket
     * @param array<string,mixed>|UsageGetAPIUsageParams $params
     *
     * @return BaseResponse<UsageGetAPIUsageResponse>
     *
     * @throws APIException
     */
    public function getAPIUsage(
        string $bucketName,
        array|UsageGetAPIUsageParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;
}
