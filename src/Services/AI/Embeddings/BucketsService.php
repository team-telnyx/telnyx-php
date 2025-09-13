<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Embeddings;

use Telnyx\AI\Embeddings\Buckets\BucketGetResponse;
use Telnyx\AI\Embeddings\Buckets\BucketListResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
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
     * @return BucketGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $bucketName,
        ?RequestOptions $requestOptions = null
    ): BucketGetResponse {
        $params = [];

        return $this->retrieveRaw($bucketName, $params, $requestOptions);
    }

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
        ?RequestOptions $requestOptions = null
    ): BucketGetResponse {
        // @phpstan-ignore-next-line;
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
     * @return BucketListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): BucketListResponse {
        $params = [];

        return $this->listRaw($params, $requestOptions);
    }

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
    ): BucketListResponse {
        // @phpstan-ignore-next-line;
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
     * @throws APIException
     */
    public function delete(
        string $bucketName,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = [];

        return $this->deleteRaw($bucketName, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $bucketName,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['ai/embeddings/buckets/%1$s', $bucketName],
            options: $requestOptions,
            convert: null,
        );
    }
}
