<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Storage;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Storage\Buckets\BucketNewPresignedURLResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface BucketsContract
{
    /**
     * @api
     *
     * @param string $objectName Path param: The name of the object
     * @param string $bucketName Path param: The name of the bucket
     * @param int $ttl Body param: The time to live of the token in seconds
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createPresignedURL(
        string $objectName,
        string $bucketName,
        ?int $ttl = null,
        RequestOptions|array|null $requestOptions = null,
    ): BucketNewPresignedURLResponse;
}
