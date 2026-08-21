<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI;

use Telnyx\AI\Embeddings\EmbeddingCreateParams\EmbeddingModel;
use Telnyx\AI\Embeddings\EmbeddingCreateParams\Loader;
use Telnyx\AI\Embeddings\EmbeddingGetResponse;
use Telnyx\AI\Embeddings\EmbeddingListResponse;
use Telnyx\AI\Embeddings\EmbeddingResponse;
use Telnyx\AI\Embeddings\EmbeddingSimilaritySearchResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface EmbeddingsContract
{
    /**
     * @api
     *
     * @param string $bucketName Body param
     * @param int $documentChunkOverlapSize Body param
     * @param int $documentChunkSize Body param
     * @param EmbeddingModel|value-of<EmbeddingModel> $embeddingModel body param: Supported models to vectorize and embed documents
     * @param Loader|value-of<Loader> $loader body param: Supported types of custom document loaders for embeddings
     * @param string $idempotencyKey Header param: Optional opaque, unquoted key for safely retrying the same logical request. Keys must contain 1 to 255 letters, numbers, hyphens, or underscores. Generate a unique UUID v4 for each operation and reuse it only when retrying that operation with the same request. Invalid headers—including duplicate, empty, malformed, or overlong values—return 400 with error code 10015. A request already in progress with the same key returns 409; reusing the key with a different request returns 422. Only successful responses are replayed, for up to 24 hours. Do not include sensitive data in the key.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $bucketName,
        int $documentChunkOverlapSize = 512,
        int $documentChunkSize = 1024,
        EmbeddingModel|string $embeddingModel = 'thenlper/gte-large',
        Loader|string $loader = 'default',
        ?string $idempotencyKey = null,
        RequestOptions|array|null $requestOptions = null,
    ): EmbeddingResponse;

    /**
     * @api
     *
     * @param string $taskID unique identifier of the task
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $taskID,
        RequestOptions|array|null $requestOptions = null
    ): EmbeddingGetResponse;

    /**
     * @api
     *
     * @param list<string> $status List of task statuses i.e. `status=queued&status=processing`
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        array $status = ['processing', 'queued'],
        RequestOptions|array|null $requestOptions = null,
    ): EmbeddingListResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function similaritySearch(
        string $bucketName,
        string $query,
        int $numOfDocs = 3,
        RequestOptions|array|null $requestOptions = null,
    ): EmbeddingSimilaritySearchResponse;

    /**
     * @api
     *
     * @param string $bucketName Body param: Name of the bucket to store the embeddings. This bucket must already exist.
     * @param string $url Body param: The URL of the webpage to embed
     * @param string $idempotencyKey Header param: Optional opaque, unquoted key for safely retrying the same logical request. Keys must contain 1 to 255 letters, numbers, hyphens, or underscores. Generate a unique UUID v4 for each operation and reuse it only when retrying that operation with the same request. Invalid headers—including duplicate, empty, malformed, or overlong values—return 400 with error code 10015. A request already in progress with the same key returns 409; reusing the key with a different request returns 422. Only successful responses are replayed, for up to 24 hours. Do not include sensitive data in the key.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function url(
        string $bucketName,
        string $url,
        ?string $idempotencyKey = null,
        RequestOptions|array|null $requestOptions = null,
    ): EmbeddingResponse;
}
