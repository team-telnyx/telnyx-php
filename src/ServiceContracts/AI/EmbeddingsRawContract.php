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
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface EmbeddingsRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|EmbeddingCreateParams $params
     *
     * @return BaseResponse<EmbeddingResponse>
     *
     * @throws APIException
     */
    public function create(
        array|EmbeddingCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<EmbeddingGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $taskID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|EmbeddingListParams $params
     *
     * @return BaseResponse<EmbeddingListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|EmbeddingListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|EmbeddingSimilaritySearchParams $params
     *
     * @return BaseResponse<EmbeddingSimilaritySearchResponse>
     *
     * @throws APIException
     */
    public function similaritySearch(
        array|EmbeddingSimilaritySearchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|EmbeddingURLParams $params
     *
     * @return BaseResponse<EmbeddingResponse>
     *
     * @throws APIException
     */
    public function url(
        array|EmbeddingURLParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
