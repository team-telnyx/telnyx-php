<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Embeddings;

use Telnyx\AI\Embeddings\Buckets\BucketGetResponse;
use Telnyx\AI\Embeddings\Buckets\BucketListResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;

interface BucketsContract
{
    /**
     * @api
     *
     * @return BucketGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $bucketName,
        ?RequestOptions $requestOptions = null
    ): BucketGetResponse;

    /**
     * @api
     *
     * @return BucketGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $bucketName,
        mixed $params,
        ?RequestOptions $requestOptions = null,
    ): BucketGetResponse;

    /**
     * @api
     *
     * @return BucketListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): BucketListResponse;

    /**
     * @api
     *
     * @return BucketListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): BucketListResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $bucketName,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $bucketName,
        mixed $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;
}
