<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Embeddings;

use Telnyx\AI\Embeddings\Buckets\BucketGetResponse;
use Telnyx\AI\Embeddings\Buckets\BucketListResponse;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Embeddings\BucketsContract;

final class BucketsService implements BucketsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get all embedded files for a given user bucket, including their processing status.
     *
     * @throws APIException
     */
    public function retrieve(
        string $bucketName,
        ?RequestOptions $requestOptions = null
    ): BucketGetResponse {
        /** @var BaseResponse<BucketGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['ai/embeddings/buckets/%1$s', $bucketName],
            options: $requestOptions,
            convert: BucketGetResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Get all embedding buckets for a user.
     *
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): BucketListResponse {
        /** @var BaseResponse<BucketListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'ai/embeddings/buckets',
            options: $requestOptions,
            convert: BucketListResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Deletes an entire bucket's embeddings and disables the bucket for AI-use, returning it to normal storage pricing.
     *
     * @throws APIException
     */
    public function delete(
        string $bucketName,
        ?RequestOptions $requestOptions = null
    ): mixed {
        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'delete',
            path: ['ai/embeddings/buckets/%1$s', $bucketName],
            options: $requestOptions,
            convert: null,
        );

        return $response->parse();
    }
}
