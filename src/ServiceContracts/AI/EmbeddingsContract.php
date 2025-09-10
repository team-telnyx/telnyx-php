<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI;

use Telnyx\AI\Embeddings\EmbeddingCreateParams\EmbeddingModel;
use Telnyx\AI\Embeddings\EmbeddingCreateParams\Loader;
use Telnyx\AI\Embeddings\EmbeddingGetResponse;
use Telnyx\AI\Embeddings\EmbeddingListResponse;
use Telnyx\AI\Embeddings\EmbeddingResponse;
use Telnyx\AI\Embeddings\EmbeddingSimilaritySearchResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface EmbeddingsContract
{
    /**
     * @api
     *
     * @param string $bucketName
     * @param int $documentChunkOverlapSize
     * @param int $documentChunkSize
     * @param EmbeddingModel|value-of<EmbeddingModel> $embeddingModel supported models to vectorize and embed documents
     * @param Loader|value-of<Loader> $loader supported types of custom document loaders for embeddings
     */
    public function create(
        $bucketName,
        $documentChunkOverlapSize = omit,
        $documentChunkSize = omit,
        $embeddingModel = omit,
        $loader = omit,
        ?RequestOptions $requestOptions = null,
    ): EmbeddingResponse;

    /**
     * @api
     */
    public function retrieve(
        string $taskID,
        ?RequestOptions $requestOptions = null
    ): EmbeddingGetResponse;

    /**
     * @api
     *
     * @param list<string> $status List of task statuses i.e. `status=queued&status=processing`
     */
    public function list(
        $status = omit,
        ?RequestOptions $requestOptions = null
    ): EmbeddingListResponse;

    /**
     * @api
     *
     * @param string $bucketName
     * @param string $query
     * @param int $numOfDocs
     */
    public function similaritySearch(
        $bucketName,
        $query,
        $numOfDocs = omit,
        ?RequestOptions $requestOptions = null,
    ): EmbeddingSimilaritySearchResponse;

    /**
     * @api
     *
     * @param string $bucketName Name of the bucket to store the embeddings. This bucket must already exist.
     * @param string $url The URL of the webpage to embed
     */
    public function url(
        $bucketName,
        $url,
        ?RequestOptions $requestOptions = null
    ): EmbeddingResponse;
}
