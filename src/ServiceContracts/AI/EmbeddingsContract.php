<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI;

use Telnyx\AI\Embeddings\EmbeddingCreateParams;
use Telnyx\AI\Embeddings\EmbeddingGetResponse;
use Telnyx\AI\Embeddings\EmbeddingListParams;
use Telnyx\AI\Embeddings\EmbeddingListResponse;
use Telnyx\AI\Embeddings\EmbeddingResponse;
use Telnyx\AI\Embeddings\EmbeddingSimilaritySearchParams;
use Telnyx\AI\Embeddings\EmbeddingSimilaritySearchResponse;
use Telnyx\AI\Embeddings\EmbeddingURLParams;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface EmbeddingsContract
{
    /**
     * @api
     *
     * @param array<mixed>|EmbeddingCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|EmbeddingCreateParams $params,
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
     * @param array<mixed>|EmbeddingListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|EmbeddingListParams $params,
        ?RequestOptions $requestOptions = null
    ): EmbeddingListResponse;

    /**
     * @api
     *
     * @param array<mixed>|EmbeddingSimilaritySearchParams $params
     *
     * @throws APIException
     */
    public function similaritySearch(
        array|EmbeddingSimilaritySearchParams $params,
        ?RequestOptions $requestOptions = null,
    ): EmbeddingSimilaritySearchResponse;

    /**
     * @api
     *
     * @param array<mixed>|EmbeddingURLParams $params
     *
     * @throws APIException
     */
    public function url(
        array|EmbeddingURLParams $params,
        ?RequestOptions $requestOptions = null
    ): EmbeddingResponse;
}
