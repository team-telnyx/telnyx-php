<?php

declare(strict_types=1);

namespace Telnyx\AI\Chat;

use Telnyx\AI\Chat\ChatCreateCompletionParams\Message;
use Telnyx\AI\Chat\ChatCreateCompletionParams\ResponseFormat;
use Telnyx\AI\Chat\ChatCreateCompletionParams\Tool;
use Telnyx\AI\Chat\ChatCreateCompletionParams\Tool\ChatCompletionToolParam;
use Telnyx\AI\Chat\ChatCreateCompletionParams\Tool\Retrieval;
use Telnyx\AI\Chat\ChatCreateCompletionParams\ToolChoice;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Chat with a language model. This endpoint is consistent with the [OpenAI Chat Completions API](https://platform.openai.com/docs/api-reference/chat) and may be used with the OpenAI JS or Python SDK.
 *
 * @see Telnyx\STAINLESS_FIXME_AI\ChatService::createCompletion()
 *
 * @phpstan-type ChatCreateCompletionParamsShape = array{
 *   messages: list<Message>,
 *   api_key_ref?: string,
 *   best_of?: int,
 *   early_stopping?: bool,
 *   frequency_penalty?: float,
 *   guided_choice?: list<string>,
 *   guided_json?: array<string,mixed>,
 *   guided_regex?: string,
 *   length_penalty?: float,
 *   logprobs?: bool,
 *   max_tokens?: int,
 *   min_p?: float,
 *   model?: string,
 *   n?: float,
 *   presence_penalty?: float,
 *   response_format?: ResponseFormat,
 *   stream?: bool,
 *   temperature?: float,
 *   tool_choice?: ToolChoice|value-of<ToolChoice>,
 *   tools?: list<ChatCompletionToolParam|Retrieval>,
 *   top_logprobs?: int,
 *   top_p?: float,
 *   use_beam_search?: bool,
 * }
 */
final class ChatCreateCompletionParams implements BaseModel
{
    /** @use SdkModel<ChatCreateCompletionParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * A list of the previous chat messages for context.
     *
     * @var list<Message> $messages
     */
    #[Api(list: Message::class)]
    public array $messages;

    /**
     * If you are using an external inference provider like xAI or OpenAI, this field allows you to pass along a reference to your API key. After creating an [integration secret](https://developers.telnyx.com/api/secrets-manager/integration-secrets/create-integration-secret) for you API key, pass the secret's `identifier` in this field.
     */
    #[Api(optional: true)]
    public ?string $api_key_ref;

    /**
     * This is used with `use_beam_search` to determine how many candidate beams to explore.
     */
    #[Api(optional: true)]
    public ?int $best_of;

    /**
     * This is used with `use_beam_search`. If `true`, generation stops as soon as there are `best_of` complete candidates; if `false`, a heuristic is applied and the generation stops when is it very unlikely to find better candidates.
     */
    #[Api(optional: true)]
    public ?bool $early_stopping;

    /**
     * Higher values will penalize the model from repeating the same output tokens.
     */
    #[Api(optional: true)]
    public ?float $frequency_penalty;

    /**
     * If specified, the output will be exactly one of the choices.
     *
     * @var list<string>|null $guided_choice
     */
    #[Api(list: 'string', optional: true)]
    public ?array $guided_choice;

    /**
     * Must be a valid JSON schema. If specified, the output will follow the JSON schema.
     *
     * @var array<string,mixed>|null $guided_json
     */
    #[Api(map: 'mixed', optional: true)]
    public ?array $guided_json;

    /**
     * If specified, the output will follow the regex pattern.
     */
    #[Api(optional: true)]
    public ?string $guided_regex;

    /**
     * This is used with `use_beam_search` to prefer shorter or longer completions.
     */
    #[Api(optional: true)]
    public ?float $length_penalty;

    /**
     * Whether to return log probabilities of the output tokens or not. If true, returns the log probabilities of each output token returned in the `content` of `message`.
     */
    #[Api(optional: true)]
    public ?bool $logprobs;

    /**
     * Maximum number of completion tokens the model should generate.
     */
    #[Api(optional: true)]
    public ?int $max_tokens;

    /**
     * This is an alternative to `top_p` that [many prefer](https://github.com/huggingface/transformers/issues/27670). Must be in [0, 1].
     */
    #[Api(optional: true)]
    public ?float $min_p;

    /**
     * The language model to chat with. If you are optimizing for speed + price, try `meta-llama/Meta-Llama-3.1-8B-Instruct`. For quality, try `meta-llama/Meta-Llama-3.1-70B-Instruct`. Or explore our [LLM Library](https://telnyx.com/products/llm-library).
     */
    #[Api(optional: true)]
    public ?string $model;

    /**
     * This will return multiple choices for you instead of a single chat completion.
     */
    #[Api(optional: true)]
    public ?float $n;

    /**
     * Higher values will penalize the model from repeating the same output tokens.
     */
    #[Api(optional: true)]
    public ?float $presence_penalty;

    /**
     * Use this is you want to guarantee a JSON output without defining a schema. For control over the schema, use `guided_json`.
     */
    #[Api(optional: true)]
    public ?ResponseFormat $response_format;

    /**
     * Whether or not to stream data-only server-sent events as they become available.
     */
    #[Api(optional: true)]
    public ?bool $stream;

    /**
     * Adjusts the "creativity" of the model. Lower values make the model more deterministic and repetitive, while higher values make the model more random and creative.
     */
    #[Api(optional: true)]
    public ?float $temperature;

    /** @var value-of<ToolChoice>|null $tool_choice */
    #[Api(enum: ToolChoice::class, optional: true)]
    public ?string $tool_choice;

    /**
     * The `function` tool type follows the same schema as the [OpenAI Chat Completions API](https://platform.openai.com/docs/api-reference/chat). The `retrieval` tool type is unique to Telnyx. You may pass a list of [embedded storage buckets](https://developers.telnyx.com/api/inference/inference-embedding/post-embedding) for retrieval-augmented generation.
     *
     * @var list<ChatCompletionToolParam|Retrieval>|null $tools
     */
    #[Api(list: Tool::class, optional: true)]
    public ?array $tools;

    /**
     * This is used with `logprobs`. An integer between 0 and 20 specifying the number of most likely tokens to return at each token position, each with an associated log probability.
     */
    #[Api(optional: true)]
    public ?int $top_logprobs;

    /**
     * An alternative or complement to `temperature`. This adjusts how many of the top possibilities to consider.
     */
    #[Api(optional: true)]
    public ?float $top_p;

    /**
     * Setting this to `true` will allow the model to [explore more completion options](https://huggingface.co/blog/how-to-generate#beam-search). This is not supported by OpenAI.
     */
    #[Api(optional: true)]
    public ?bool $use_beam_search;

    /**
     * `new ChatCreateCompletionParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ChatCreateCompletionParams::with(messages: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ChatCreateCompletionParams)->withMessages(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Message> $messages
     * @param list<string> $guided_choice
     * @param array<string,mixed> $guided_json
     * @param ToolChoice|value-of<ToolChoice> $tool_choice
     * @param list<ChatCompletionToolParam|Retrieval> $tools
     */
    public static function with(
        array $messages,
        ?string $api_key_ref = null,
        ?int $best_of = null,
        ?bool $early_stopping = null,
        ?float $frequency_penalty = null,
        ?array $guided_choice = null,
        ?array $guided_json = null,
        ?string $guided_regex = null,
        ?float $length_penalty = null,
        ?bool $logprobs = null,
        ?int $max_tokens = null,
        ?float $min_p = null,
        ?string $model = null,
        ?float $n = null,
        ?float $presence_penalty = null,
        ?ResponseFormat $response_format = null,
        ?bool $stream = null,
        ?float $temperature = null,
        ToolChoice|string|null $tool_choice = null,
        ?array $tools = null,
        ?int $top_logprobs = null,
        ?float $top_p = null,
        ?bool $use_beam_search = null,
    ): self {
        $obj = new self;

        $obj->messages = $messages;

        null !== $api_key_ref && $obj->api_key_ref = $api_key_ref;
        null !== $best_of && $obj->best_of = $best_of;
        null !== $early_stopping && $obj->early_stopping = $early_stopping;
        null !== $frequency_penalty && $obj->frequency_penalty = $frequency_penalty;
        null !== $guided_choice && $obj->guided_choice = $guided_choice;
        null !== $guided_json && $obj->guided_json = $guided_json;
        null !== $guided_regex && $obj->guided_regex = $guided_regex;
        null !== $length_penalty && $obj->length_penalty = $length_penalty;
        null !== $logprobs && $obj->logprobs = $logprobs;
        null !== $max_tokens && $obj->max_tokens = $max_tokens;
        null !== $min_p && $obj->min_p = $min_p;
        null !== $model && $obj->model = $model;
        null !== $n && $obj->n = $n;
        null !== $presence_penalty && $obj->presence_penalty = $presence_penalty;
        null !== $response_format && $obj->response_format = $response_format;
        null !== $stream && $obj->stream = $stream;
        null !== $temperature && $obj->temperature = $temperature;
        null !== $tool_choice && $obj['tool_choice'] = $tool_choice;
        null !== $tools && $obj->tools = $tools;
        null !== $top_logprobs && $obj->top_logprobs = $top_logprobs;
        null !== $top_p && $obj->top_p = $top_p;
        null !== $use_beam_search && $obj->use_beam_search = $use_beam_search;

        return $obj;
    }

    /**
     * A list of the previous chat messages for context.
     *
     * @param list<Message> $messages
     */
    public function withMessages(array $messages): self
    {
        $obj = clone $this;
        $obj->messages = $messages;

        return $obj;
    }

    /**
     * If you are using an external inference provider like xAI or OpenAI, this field allows you to pass along a reference to your API key. After creating an [integration secret](https://developers.telnyx.com/api/secrets-manager/integration-secrets/create-integration-secret) for you API key, pass the secret's `identifier` in this field.
     */
    public function withAPIKeyRef(string $apiKeyRef): self
    {
        $obj = clone $this;
        $obj->api_key_ref = $apiKeyRef;

        return $obj;
    }

    /**
     * This is used with `use_beam_search` to determine how many candidate beams to explore.
     */
    public function withBestOf(int $bestOf): self
    {
        $obj = clone $this;
        $obj->best_of = $bestOf;

        return $obj;
    }

    /**
     * This is used with `use_beam_search`. If `true`, generation stops as soon as there are `best_of` complete candidates; if `false`, a heuristic is applied and the generation stops when is it very unlikely to find better candidates.
     */
    public function withEarlyStopping(bool $earlyStopping): self
    {
        $obj = clone $this;
        $obj->early_stopping = $earlyStopping;

        return $obj;
    }

    /**
     * Higher values will penalize the model from repeating the same output tokens.
     */
    public function withFrequencyPenalty(float $frequencyPenalty): self
    {
        $obj = clone $this;
        $obj->frequency_penalty = $frequencyPenalty;

        return $obj;
    }

    /**
     * If specified, the output will be exactly one of the choices.
     *
     * @param list<string> $guidedChoice
     */
    public function withGuidedChoice(array $guidedChoice): self
    {
        $obj = clone $this;
        $obj->guided_choice = $guidedChoice;

        return $obj;
    }

    /**
     * Must be a valid JSON schema. If specified, the output will follow the JSON schema.
     *
     * @param array<string,mixed> $guidedJson
     */
    public function withGuidedJson(array $guidedJson): self
    {
        $obj = clone $this;
        $obj->guided_json = $guidedJson;

        return $obj;
    }

    /**
     * If specified, the output will follow the regex pattern.
     */
    public function withGuidedRegex(string $guidedRegex): self
    {
        $obj = clone $this;
        $obj->guided_regex = $guidedRegex;

        return $obj;
    }

    /**
     * This is used with `use_beam_search` to prefer shorter or longer completions.
     */
    public function withLengthPenalty(float $lengthPenalty): self
    {
        $obj = clone $this;
        $obj->length_penalty = $lengthPenalty;

        return $obj;
    }

    /**
     * Whether to return log probabilities of the output tokens or not. If true, returns the log probabilities of each output token returned in the `content` of `message`.
     */
    public function withLogprobs(bool $logprobs): self
    {
        $obj = clone $this;
        $obj->logprobs = $logprobs;

        return $obj;
    }

    /**
     * Maximum number of completion tokens the model should generate.
     */
    public function withMaxTokens(int $maxTokens): self
    {
        $obj = clone $this;
        $obj->max_tokens = $maxTokens;

        return $obj;
    }

    /**
     * This is an alternative to `top_p` that [many prefer](https://github.com/huggingface/transformers/issues/27670). Must be in [0, 1].
     */
    public function withMinP(float $minP): self
    {
        $obj = clone $this;
        $obj->min_p = $minP;

        return $obj;
    }

    /**
     * The language model to chat with. If you are optimizing for speed + price, try `meta-llama/Meta-Llama-3.1-8B-Instruct`. For quality, try `meta-llama/Meta-Llama-3.1-70B-Instruct`. Or explore our [LLM Library](https://telnyx.com/products/llm-library).
     */
    public function withModel(string $model): self
    {
        $obj = clone $this;
        $obj->model = $model;

        return $obj;
    }

    /**
     * This will return multiple choices for you instead of a single chat completion.
     */
    public function withN(float $n): self
    {
        $obj = clone $this;
        $obj->n = $n;

        return $obj;
    }

    /**
     * Higher values will penalize the model from repeating the same output tokens.
     */
    public function withPresencePenalty(float $presencePenalty): self
    {
        $obj = clone $this;
        $obj->presence_penalty = $presencePenalty;

        return $obj;
    }

    /**
     * Use this is you want to guarantee a JSON output without defining a schema. For control over the schema, use `guided_json`.
     */
    public function withResponseFormat(ResponseFormat $responseFormat): self
    {
        $obj = clone $this;
        $obj->response_format = $responseFormat;

        return $obj;
    }

    /**
     * Whether or not to stream data-only server-sent events as they become available.
     */
    public function withStream(bool $stream): self
    {
        $obj = clone $this;
        $obj->stream = $stream;

        return $obj;
    }

    /**
     * Adjusts the "creativity" of the model. Lower values make the model more deterministic and repetitive, while higher values make the model more random and creative.
     */
    public function withTemperature(float $temperature): self
    {
        $obj = clone $this;
        $obj->temperature = $temperature;

        return $obj;
    }

    /**
     * @param ToolChoice|value-of<ToolChoice> $toolChoice
     */
    public function withToolChoice(ToolChoice|string $toolChoice): self
    {
        $obj = clone $this;
        $obj['tool_choice'] = $toolChoice;

        return $obj;
    }

    /**
     * The `function` tool type follows the same schema as the [OpenAI Chat Completions API](https://platform.openai.com/docs/api-reference/chat). The `retrieval` tool type is unique to Telnyx. You may pass a list of [embedded storage buckets](https://developers.telnyx.com/api/inference/inference-embedding/post-embedding) for retrieval-augmented generation.
     *
     * @param list<ChatCompletionToolParam|Retrieval> $tools
     */
    public function withTools(array $tools): self
    {
        $obj = clone $this;
        $obj->tools = $tools;

        return $obj;
    }

    /**
     * This is used with `logprobs`. An integer between 0 and 20 specifying the number of most likely tokens to return at each token position, each with an associated log probability.
     */
    public function withTopLogprobs(int $topLogprobs): self
    {
        $obj = clone $this;
        $obj->top_logprobs = $topLogprobs;

        return $obj;
    }

    /**
     * An alternative or complement to `temperature`. This adjusts how many of the top possibilities to consider.
     */
    public function withTopP(float $topP): self
    {
        $obj = clone $this;
        $obj->top_p = $topP;

        return $obj;
    }

    /**
     * Setting this to `true` will allow the model to [explore more completion options](https://huggingface.co/blog/how-to-generate#beam-search). This is not supported by OpenAI.
     */
    public function withUseBeamSearch(bool $useBeamSearch): self
    {
        $obj = clone $this;
        $obj->use_beam_search = $useBeamSearch;

        return $obj;
    }
}
