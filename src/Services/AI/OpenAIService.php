<?php

declare(strict_types=1);

namespace Telnyx\Services\AI;

use Telnyx\AI\OpenAI\OpenAIListModelsResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\OpenAIContract;
use Telnyx\Services\AI\OpenAI\ChatService;
use Telnyx\Services\AI\OpenAI\EmbeddingsService;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class OpenAIService implements OpenAIContract
{
    /**
     * @api
     */
    public OpenAIRawService $raw;

    /**
     * @api
     */
    public EmbeddingsService $embeddings;

    /**
     * @api
     */
    public ChatService $chat;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new OpenAIRawService($client);
        $this->embeddings = new EmbeddingsService($client);
        $this->chat = new ChatService($client);
    }

    /**
     * @api
     *
     * This endpoint returns a list of Open Source and OpenAI models that are available for use. <br /><br /> **Note**: Model `id`'s will be in the form `{source}/{model_name}`. For example `openai/gpt-4` or `mistralai/Mistral-7B-Instruct-v0.1` consistent with HuggingFace naming conventions.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listModels(
        RequestOptions|array|null $requestOptions = null
    ): OpenAIListModelsResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listModels(requestOptions: $requestOptions);

        return $response->parse();
    }
}
