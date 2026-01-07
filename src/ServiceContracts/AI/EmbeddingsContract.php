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
     * @param EmbeddingModel|value-of<EmbeddingModel> $embeddingModel supported models to vectorize and embed documents
     * @param Loader|value-of<Loader> $loader supported types of custom document loaders for embeddings
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
        RequestOptions|array|null $requestOptions = null,
    ): EmbeddingResponse;

    /**
     * @api
     *
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
     * @param string $bucketName Name of the bucket to store the embeddings. This bucket must already exist.
     * @param string $url The URL of the webpage to embed
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function url(
        string $bucketName,
        string $url,
        RequestOptions|array|null $requestOptions = null,
    ): EmbeddingResponse;
}
