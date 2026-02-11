<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\OpenAI;

use Telnyx\AI\OpenAI\Embeddings\EmbeddingCreateEmbeddingsParams\EncodingFormat;
use Telnyx\AI\OpenAI\Embeddings\EmbeddingListEmbeddingModelsResponse;
use Telnyx\AI\OpenAI\Embeddings\EmbeddingNewEmbeddingsResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type InputShape from \Telnyx\AI\OpenAI\Embeddings\EmbeddingCreateEmbeddingsParams\Input
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface EmbeddingsContract
{
    /**
     * @api
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
    ): EmbeddingNewEmbeddingsResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listEmbeddingModels(
        RequestOptions|array|null $requestOptions = null
    ): EmbeddingListEmbeddingModelsResponse;
}
