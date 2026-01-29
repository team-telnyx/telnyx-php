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

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface EmbeddingsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|EmbeddingCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmbeddingResponse>
     *
     * @throws APIException
     */
    public function create(
        array|EmbeddingCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmbeddingGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $taskID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|EmbeddingListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmbeddingListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|EmbeddingListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|EmbeddingSimilaritySearchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmbeddingSimilaritySearchResponse>
     *
     * @throws APIException
     */
    public function similaritySearch(
        array|EmbeddingSimilaritySearchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|EmbeddingURLParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmbeddingResponse>
     *
     * @throws APIException
     */
    public function url(
        array|EmbeddingURLParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
