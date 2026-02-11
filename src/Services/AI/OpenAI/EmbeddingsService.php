<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\OpenAI;

use Telnyx\AI\OpenAI\Embeddings\EmbeddingCreateEmbeddingsParams\EncodingFormat;
use Telnyx\AI\OpenAI\Embeddings\EmbeddingListEmbeddingModelsResponse;
use Telnyx\AI\OpenAI\Embeddings\EmbeddingNewEmbeddingsResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\OpenAI\EmbeddingsContract;

/**
 * @phpstan-import-type InputShape from \Telnyx\AI\OpenAI\Embeddings\EmbeddingCreateEmbeddingsParams\Input
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class EmbeddingsService implements EmbeddingsContract
{
    /**
     * @api
     */
    public EmbeddingsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new EmbeddingsRawService($client);
    }

    /**
     * @api
     *
     * Creates an embedding vector representing the input text. This endpoint is compatible with the [OpenAI Embeddings API](https://platform.openai.com/docs/api-reference/embeddings) and may be used with the OpenAI JS or Python SDK by setting the base URL to `https://api.telnyx.com/v2/ai/openai`.
     *
     * @param InputShape $input Input text to embed. Can be a string or array of strings.
     * @param string $model ID of the model to use. Use the List embedding models endpoint to see available models.
     * @param int $dimensions The number of dimensions the resulting output embeddings should have. Only supported in some models.
     * @param EncodingFormat|value-of<EncodingFormat> $encodingFormat the format to return the embeddings in
     * @param string $user a unique identifier representing your end-user for monitoring and abuse detection
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createEmbeddings(
        string|array $input,
        string $model,
        ?int $dimensions = null,
        EncodingFormat|string $encodingFormat = 'float',
        ?string $user = null,
        RequestOptions|array|null $requestOptions = null,
    ): EmbeddingNewEmbeddingsResponse {
        $params = Util::removeNulls(
            [
                'input' => $input,
                'model' => $model,
                'dimensions' => $dimensions,
                'encodingFormat' => $encodingFormat,
                'user' => $user,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createEmbeddings(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns a list of available embedding models. This endpoint is compatible with the OpenAI Models API format.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listEmbeddingModels(
        RequestOptions|array|null $requestOptions = null
    ): EmbeddingListEmbeddingModelsResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listEmbeddingModels(requestOptions: $requestOptions);

        return $response->parse();
    }
}
