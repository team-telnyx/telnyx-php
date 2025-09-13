<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Storage;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\Storage\Buckets\BucketNewPresignedURLResponse;

use const Telnyx\Core\OMIT as omit;

interface BucketsContract
{
    /**
     * @api
     *
     * @param string $bucketName
     * @param int $ttl The time to live of the token in seconds
     *
     * @return BucketNewPresignedURLResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function createPresignedURL(
        string $objectName,
        $bucketName,
        $ttl = omit,
        ?RequestOptions $requestOptions = null,
    ): BucketNewPresignedURLResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return BucketNewPresignedURLResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function createPresignedURLRaw(
        string $objectName,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): BucketNewPresignedURLResponse;
}
