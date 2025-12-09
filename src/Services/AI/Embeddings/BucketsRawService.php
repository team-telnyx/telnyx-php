<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Embeddings;

use Telnyx\AI\Embeddings\Buckets\BucketGetResponse;
use Telnyx\AI\Embeddings\Buckets\BucketListResponse;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Embeddings\BucketsRawContract;

final class BucketsRawService implements BucketsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get all embedded files for a given user bucket, including their processing status.
     *
     * @return BaseResponse<BucketGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $bucketName,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['ai/embeddings/buckets/%1$s', $bucketName],
            options: $requestOptions,
            convert: BucketGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Get all embedding buckets for a user.
     *
     * @return BaseResponse<BucketListResponse>
     *
     * @throws APIException
     */
    public function list(?RequestOptions $requestOptions = null): BaseResponse
    {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'ai/embeddings/buckets',
            options: $requestOptions,
            convert: BucketListResponse::class,
        );
    }

    /**
     * @api
     *
     * Deletes an entire bucket's embeddings and disables the bucket for AI-use, returning it to normal storage pricing.
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $bucketName,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['ai/embeddings/buckets/%1$s', $bucketName],
            options: $requestOptions,
            convert: null,
        );
    }
}
