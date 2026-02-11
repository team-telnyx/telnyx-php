<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\OpenAI;

use Telnyx\AI\OpenAI\Embeddings\EmbeddingCreateEmbeddingsParams;
use Telnyx\AI\OpenAI\Embeddings\EmbeddingListEmbeddingModelsResponse;
use Telnyx\AI\OpenAI\Embeddings\EmbeddingNewEmbeddingsResponse;
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
     * @param array<string,mixed>|EmbeddingCreateEmbeddingsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmbeddingNewEmbeddingsResponse>
     *
     * @throws APIException
     */
    public function createEmbeddings(
        array|EmbeddingCreateEmbeddingsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmbeddingListEmbeddingModelsResponse>
     *
     * @throws APIException
     */
    public function listEmbeddingModels(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
