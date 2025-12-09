<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Storage;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Storage\Buckets\BucketCreatePresignedURLParams;
use Telnyx\Storage\Buckets\BucketNewPresignedURLResponse;

interface BucketsRawContract
{
    /**
     * @api
     *
     * @param string $objectName Path param: The name of the object
     * @param array<mixed>|BucketCreatePresignedURLParams $params
     *
     * @return BaseResponse<BucketNewPresignedURLResponse>
     *
     * @throws APIException
     */
    public function createPresignedURL(
        string $objectName,
        array|BucketCreatePresignedURLParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
