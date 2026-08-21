<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Storage;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Storage\Buckets\BucketCreatePresignedURLParams\Body;
use Telnyx\Storage\Buckets\BucketNewPresignedURLResponse;

/**
 * @phpstan-import-type BodyShape from \Telnyx\Storage\Buckets\BucketCreatePresignedURLParams\Body
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface BucketsContract
{
    /**
     * @api
     *
     * @param string $objectName Path param: The name of the object
     * @param string $bucketName Path param: The name of the bucket
     * @param Body|BodyShape $body Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createPresignedURL(
        string $objectName,
        string $bucketName,
        Body|array|null $body = null,
        RequestOptions|array|null $requestOptions = null,
    ): BucketNewPresignedURLResponse;
}
