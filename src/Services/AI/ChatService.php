<?php

declare(strict_types=1);

namespace Telnyx\Services\AI;

use Telnyx\AI\Chat\ChatCreateCompletionParams\Message\Content\TextAndImageArray\Type;
use Telnyx\AI\Chat\ChatCreateCompletionParams\Message\Role;
use Telnyx\AI\Chat\ChatCreateCompletionParams\ToolChoice;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\ChatContract;

final class ChatService implements ChatContract
{
    /**
     * @api
     */
    public ChatRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ChatRawService($client);
    }

    /**
     * @api
     *
     * Chat with a language model. This endpoint is consistent with the [OpenAI Chat Completions API](https://platform.openai.com/docs/api-reference/chat) and may be used with the OpenAI JS or Python SDK.
     *
     * @param list<array{
     *   content: string|list<array{
     *     type: 'text'|'image_url'|Type, imageURL?: string, text?: string
     *   }>,
     *   role: 'system'|'user'|'assistant'|'tool'|Role,
     * }> $messages A list of the previous chat messages for context
     * @param string $apiKeyRef If you are using an external inference provider like xAI or OpenAI, this field allows you to pass along a reference to your API key. After creating an [integration secret](https://developers.telnyx.com/api/secrets-manager/integration-secrets/create-integration-secret) for you API key, pass the secret's `identifier` in this field.
     * @param int $bestOf this is used with `use_beam_search` to determine how many candidate beams to explore
     * @param bool $earlyStopping This is used with `use_beam_search`. If `true`, generation stops as soon as there are `best_of` complete candidates; if `false`, a heuristic is applied and the generation stops when is it very unlikely to find better candidates.
     * @param float $frequencyPenalty higher values will penalize the model from repeating the same output tokens
     * @param list<string> $guidedChoice if specified, the output will be exactly one of the choices
     * @param array<string,mixed> $guidedJson Must be a valid JSON schema. If specified, the output will follow the JSON schema.
     * @param string $guidedRegex if specified, the output will follow the regex pattern
     * @param float $lengthPenalty this is used with `use_beam_search` to prefer shorter or longer completions
     * @param bool $logprobs Whether to return log probabilities of the output tokens or not. If true, returns the log probabilities of each output token returned in the `content` of `message`.
     * @param int $maxTokens maximum number of completion tokens the model should generate
     * @param float $minP This is an alternative to `top_p` that [many prefer](https://github.com/huggingface/transformers/issues/27670). Must be in [0, 1].
     * @param string $model the language model to chat with
     * @param float $n this will return multiple choices for you instead of a single chat completion
     * @param float $presencePenalty higher values will penalize the model from repeating the same output tokens
     * @param array{
     *   type: 'text'|'json_object'|\Telnyx\AI\Chat\ChatCreateCompletionParams\ResponseFormat\Type,
     * } $responseFormat Use this is you want to guarantee a JSON output without defining a schema. For control over the schema, use `guided_json`.
     * @param bool $stream whether or not to stream data-only server-sent events as they become available
     * @param float $temperature Adjusts the "creativity" of the model. Lower values make the model more deterministic and repetitive, while higher values make the model more random and creative.
     * @param 'none'|'auto'|'required'|ToolChoice $toolChoice
     * @param list<array<string,mixed>> $tools The `function` tool type follows the same schema as the [OpenAI Chat Completions API](https://platform.openai.com/docs/api-reference/chat). The `retrieval` tool type is unique to Telnyx. You may pass a list of [embedded storage buckets](https://developers.telnyx.com/api/inference/inference-embedding/post-embedding) for retrieval-augmented generation.
     * @param int $topLogprobs This is used with `logprobs`. An integer between 0 and 20 specifying the number of most likely tokens to return at each token position, each with an associated log probability.
     * @param float $topP An alternative or complement to `temperature`. This adjusts how many of the top possibilities to consider.
     * @param bool $useBeamSearch Setting this to `true` will allow the model to [explore more completion options](https://huggingface.co/blog/how-to-generate#beam-search). This is not supported by OpenAI.
     *
     * @return array<string,mixed>
     *
     * @throws APIException
     */
    public function createCompletion(
        array $messages,
        ?string $apiKeyRef = null,
        ?int $bestOf = null,
        bool $earlyStopping = false,
        float $frequencyPenalty = 0,
        ?array $guidedChoice = null,
        ?array $guidedJson = null,
        ?string $guidedRegex = null,
        float $lengthPenalty = 1,
        bool $logprobs = false,
        ?int $maxTokens = null,
        ?float $minP = null,
        string $model = 'meta-llama/Meta-Llama-3.1-8B-Instruct',
        ?float $n = null,
        float $presencePenalty = 0,
        ?array $responseFormat = null,
        bool $stream = false,
        float $temperature = 0.1,
        string|ToolChoice|null $toolChoice = null,
        ?array $tools = null,
        ?int $topLogprobs = null,
        ?float $topP = null,
        bool $useBeamSearch = false,
        ?RequestOptions $requestOptions = null,
    ): array {
        $params = [
            'messages' => $messages,
            'apiKeyRef' => $apiKeyRef,
            'bestOf' => $bestOf,
            'earlyStopping' => $earlyStopping,
            'frequencyPenalty' => $frequencyPenalty,
            'guidedChoice' => $guidedChoice,
            'guidedJson' => $guidedJson,
            'guidedRegex' => $guidedRegex,
            'lengthPenalty' => $lengthPenalty,
            'logprobs' => $logprobs,
            'maxTokens' => $maxTokens,
            'minP' => $minP,
            'model' => $model,
            'n' => $n,
            'presencePenalty' => $presencePenalty,
            'responseFormat' => $responseFormat,
            'stream' => $stream,
            'temperature' => $temperature,
            'toolChoice' => $toolChoice,
            'tools' => $tools,
            'topLogprobs' => $topLogprobs,
            'topP' => $topP,
            'useBeamSearch' => $useBeamSearch,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createCompletion(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
