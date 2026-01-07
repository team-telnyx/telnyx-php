<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Storage;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Storage\Buckets\BucketCreatePresignedURLParams;
use Telnyx\Storage\Buckets\BucketNewPresignedURLResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface BucketsRawContract
{
    /**
     * @api
     *
     * @param string $objectName Path param: The name of the object
     * @param array<string,mixed>|BucketCreatePresignedURLParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BucketNewPresignedURLResponse>
     *
     * @throws APIException
     */
    public function createPresignedURL(
        string $objectName,
        array|BucketCreatePresignedURLParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
