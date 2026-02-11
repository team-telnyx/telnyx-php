<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\OpenAI;

use Telnyx\AI\OpenAI\Embeddings\EmbeddingCreateParams;
use Telnyx\AI\OpenAI\Embeddings\EmbeddingListModelsResponse;
use Telnyx\AI\OpenAI\Embeddings\EmbeddingNewResponse;
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
     * @return BaseResponse<EmbeddingNewResponse>
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
     * @return BaseResponse<EmbeddingListModelsResponse>
     *
     * @throws APIException
     */
    public function listModels(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
