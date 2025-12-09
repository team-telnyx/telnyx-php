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

interface EmbeddingsContract
{
    /**
     * @api
     *
     * @param 'thenlper/gte-large'|'intfloat/multilingual-e5-large'|EmbeddingModel $embeddingModel supported models to vectorize and embed documents
     * @param 'default'|'intercom'|Loader $loader supported types of custom document loaders for embeddings
     *
     * @throws APIException
     */
    public function create(
        string $bucketName,
        int $documentChunkOverlapSize = 512,
        int $documentChunkSize = 1024,
        string|EmbeddingModel $embeddingModel = 'thenlper/gte-large',
        string|Loader $loader = 'default',
        ?RequestOptions $requestOptions = null,
    ): EmbeddingResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $taskID,
        ?RequestOptions $requestOptions = null
    ): EmbeddingGetResponse;

    /**
     * @api
     *
     * @param list<string> $status List of task statuses i.e. `status=queued&status=processing`
     *
     * @throws APIException
     */
    public function list(
        array $status = ['processing', 'queued'],
        ?RequestOptions $requestOptions = null,
    ): EmbeddingListResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function similaritySearch(
        string $bucketName,
        string $query,
        int $numOfDocs = 3,
        ?RequestOptions $requestOptions = null,
    ): EmbeddingSimilaritySearchResponse;

    /**
     * @api
     *
     * @param string $bucketName Name of the bucket to store the embeddings. This bucket must already exist.
     * @param string $url The URL of the webpage to embed
     *
     * @throws APIException
     */
    public function url(
        string $bucketName,
        string $url,
        ?RequestOptions $requestOptions = null
    ): EmbeddingResponse;
}
