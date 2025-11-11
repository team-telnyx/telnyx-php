<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Storage;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Storage\Buckets\BucketCreatePresignedURLParams;
use Telnyx\Storage\Buckets\BucketNewPresignedURLResponse;

interface BucketsContract
{
    /**
     * @api
     *
     * @param array<mixed>|BucketCreatePresignedURLParams $params
     *
     * @throws APIException
     */
    public function createPresignedURL(
        string $objectName,
        array|BucketCreatePresignedURLParams $params,
        ?RequestOptions $requestOptions = null,
    ): BucketNewPresignedURLResponse;
}
