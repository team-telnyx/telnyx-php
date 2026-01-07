<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI;

use Telnyx\AI\Chat\ChatCreateCompletionParams\Message;
use Telnyx\AI\Chat\ChatCreateCompletionParams\ResponseFormat;
use Telnyx\AI\Chat\ChatCreateCompletionParams\ToolChoice;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type MessageShape from \Telnyx\AI\Chat\ChatCreateCompletionParams\Message
 * @phpstan-import-type ResponseFormatShape from \Telnyx\AI\Chat\ChatCreateCompletionParams\ResponseFormat
 * @phpstan-import-type ToolShape from \Telnyx\AI\Chat\ChatCreateCompletionParams\Tool
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ChatContract
{
    /**
     * @api
     *
     * @param list<Message|MessageShape> $messages a list of the previous chat messages for context
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
     * @param ResponseFormat|ResponseFormatShape $responseFormat Use this is you want to guarantee a JSON output without defining a schema. For control over the schema, use `guided_json`.
     * @param bool $stream whether or not to stream data-only server-sent events as they become available
     * @param float $temperature Adjusts the "creativity" of the model. Lower values make the model more deterministic and repetitive, while higher values make the model more random and creative.
     * @param ToolChoice|value-of<ToolChoice> $toolChoice
     * @param list<ToolShape> $tools The `function` tool type follows the same schema as the [OpenAI Chat Completions API](https://platform.openai.com/docs/api-reference/chat). The `retrieval` tool type is unique to Telnyx. You may pass a list of [embedded storage buckets](https://developers.telnyx.com/api/inference/inference-embedding/post-embedding) for retrieval-augmented generation.
     * @param int $topLogprobs This is used with `logprobs`. An integer between 0 and 20 specifying the number of most likely tokens to return at each token position, each with an associated log probability.
     * @param float $topP An alternative or complement to `temperature`. This adjusts how many of the top possibilities to consider.
     * @param bool $useBeamSearch Setting this to `true` will allow the model to [explore more completion options](https://huggingface.co/blog/how-to-generate#beam-search). This is not supported by OpenAI.
     * @param RequestOpts|null $requestOptions
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
        ResponseFormat|array|null $responseFormat = null,
        bool $stream = false,
        float $temperature = 0.1,
        ToolChoice|string|null $toolChoice = null,
        ?array $tools = null,
        ?int $topLogprobs = null,
        ?float $topP = null,
        bool $useBeamSearch = false,
        RequestOptions|array|null $requestOptions = null,
    ): array;
}
