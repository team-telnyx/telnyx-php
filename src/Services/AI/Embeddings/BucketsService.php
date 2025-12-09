<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Embeddings;

use Telnyx\AI\Embeddings\Buckets\BucketGetResponse;
use Telnyx\AI\Embeddings\Buckets\BucketListResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Embeddings\BucketsContract;

final class BucketsService implements BucketsContract
{
    /**
     * @api
     */
    public BucketsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new BucketsRawService($client);
    }

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
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($bucketName, requestOptions: $requestOptions);

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
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(requestOptions: $requestOptions);

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
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($bucketName, requestOptions: $requestOptions);

        return $response->parse();
    }
}
