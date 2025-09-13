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
use Telnyx\Core\Implementation\HasRawResponse;
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
     *
     * @return EmbeddingResponse<HasRawResponse>
     *
     * @throws APIException
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
     *
     * @param array<string, mixed> $params
     *
     * @return EmbeddingResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): EmbeddingResponse;

    /**
     * @api
     *
     * @return EmbeddingGetResponse<HasRawResponse>
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
     * @return EmbeddingGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $taskID,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): EmbeddingGetResponse;

    /**
     * @api
     *
     * @param list<string> $status List of task statuses i.e. `status=queued&status=processing`
     *
     * @return EmbeddingListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        $status = omit,
        ?RequestOptions $requestOptions = null
    ): EmbeddingListResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return EmbeddingListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): EmbeddingListResponse;

    /**
     * @api
     *
     * @param string $bucketName
     * @param string $query
     * @param int $numOfDocs
     *
     * @return EmbeddingSimilaritySearchResponse<HasRawResponse>
     *
     * @throws APIException
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
     * @param array<string, mixed> $params
     *
     * @return EmbeddingSimilaritySearchResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function similaritySearchRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): EmbeddingSimilaritySearchResponse;

    /**
     * @api
     *
     * @param string $bucketName Name of the bucket to store the embeddings. This bucket must already exist.
     * @param string $url The URL of the webpage to embed
     *
     * @return EmbeddingResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function url(
        $bucketName,
        $url,
        ?RequestOptions $requestOptions = null
    ): EmbeddingResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return EmbeddingResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function urlRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): EmbeddingResponse;
}
