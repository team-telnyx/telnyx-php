<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Embeddings;

use Telnyx\AI\Embeddings\Buckets\BucketGetResponse;
use Telnyx\AI\Embeddings\Buckets\BucketListResponse;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface BucketsRawContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BucketGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $bucketName,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BucketListResponse>
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $bucketName,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
