<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Storage\Buckets;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Storage\Buckets\Usage\UsageGetAPIUsageParams;
use Telnyx\Storage\Buckets\Usage\UsageGetAPIUsageResponse;
use Telnyx\Storage\Buckets\Usage\UsageGetBucketUsageResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface UsageRawContract
{
    /**
     * @api
     *
     * @param string $bucketName The name of the bucket
     * @param array<string,mixed>|UsageGetAPIUsageParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UsageGetAPIUsageResponse>
     *
     * @throws APIException
     */
    public function getAPIUsage(
        string $bucketName,
        array|UsageGetAPIUsageParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $bucketName The name of the bucket
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UsageGetBucketUsageResponse>
     *
     * @throws APIException
     */
    public function getBucketUsage(
        string $bucketName,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
