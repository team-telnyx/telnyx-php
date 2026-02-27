<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\OpenAI;

use Telnyx\AI\OpenAI\Embeddings\EmbeddingCreateEmbeddingsParams;
use Telnyx\AI\OpenAI\Embeddings\EmbeddingCreateEmbeddingsParams\EncodingFormat;
use Telnyx\AI\OpenAI\Embeddings\EmbeddingListEmbeddingModelsResponse;
use Telnyx\AI\OpenAI\Embeddings\EmbeddingNewEmbeddingsResponse;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\OpenAI\EmbeddingsRawContract;

/**
 * OpenAI-compatible embeddings endpoints for generating vector representations of text.
 *
 * @phpstan-import-type InputShape from \Telnyx\AI\OpenAI\Embeddings\EmbeddingCreateEmbeddingsParams\Input
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class EmbeddingsRawService implements EmbeddingsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates an embedding vector representing the input text. This endpoint is compatible with the [OpenAI Embeddings API](https://platform.openai.com/docs/api-reference/embeddings) and may be used with the OpenAI JS or Python SDK by setting the base URL to `https://api.telnyx.com/v2/ai/openai`.
     *
     * @param array{
     *   input: InputShape,
     *   model: string,
     *   dimensions?: int,
     *   encodingFormat?: EncodingFormat|value-of<EncodingFormat>,
     *   user?: string,
     * }|EmbeddingCreateEmbeddingsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmbeddingNewEmbeddingsResponse>
     *
     * @throws APIException
     */
    public function createEmbeddings(
        array|EmbeddingCreateEmbeddingsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EmbeddingCreateEmbeddingsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'ai/openai/embeddings',
            body: (object) $parsed,
            options: $options,
            convert: EmbeddingNewEmbeddingsResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns a list of available embedding models. This endpoint is compatible with the OpenAI Models API format.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmbeddingListEmbeddingModelsResponse>
     *
     * @throws APIException
     */
    public function listEmbeddingModels(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'ai/openai/embeddings/models',
            options: $requestOptions,
            convert: EmbeddingListEmbeddingModelsResponse::class,
        );
    }
}
