<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\OpenAI;

use Telnyx\AI\OpenAI\Embeddings\EmbeddingCreateParams\EncodingFormat;
use Telnyx\AI\OpenAI\Embeddings\EmbeddingListModelsResponse;
use Telnyx\AI\OpenAI\Embeddings\EmbeddingNewResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type InputShape from \Telnyx\AI\OpenAI\Embeddings\EmbeddingCreateParams\Input
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
    public function create(
        string|array $input,
        string $model,
        ?int $dimensions = null,
        EncodingFormat|string $encodingFormat = 'float',
        ?string $user = null,
        RequestOptions|array|null $requestOptions = null,
    ): EmbeddingNewResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listModels(
        RequestOptions|array|null $requestOptions = null
    ): EmbeddingListModelsResponse;
}
