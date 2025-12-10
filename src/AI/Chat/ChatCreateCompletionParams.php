<?php

declare(strict_types=1);

namespace Telnyx\AI\Chat;

use Telnyx\AI\Assistants\InferenceEmbeddingBucketIDs;
use Telnyx\AI\Chat\ChatCreateCompletionParams\Message;
use Telnyx\AI\Chat\ChatCreateCompletionParams\Message\Content\TextAndImageArray;
use Telnyx\AI\Chat\ChatCreateCompletionParams\Message\Role;
use Telnyx\AI\Chat\ChatCreateCompletionParams\ResponseFormat;
use Telnyx\AI\Chat\ChatCreateCompletionParams\ResponseFormat\Type;
use Telnyx\AI\Chat\ChatCreateCompletionParams\Tool;
use Telnyx\AI\Chat\ChatCreateCompletionParams\Tool\ChatCompletionToolParam;
use Telnyx\AI\Chat\ChatCreateCompletionParams\Tool\ChatCompletionToolParam\Function1;
use Telnyx\AI\Chat\ChatCreateCompletionParams\Tool\Retrieval;
use Telnyx\AI\Chat\ChatCreateCompletionParams\ToolChoice;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Chat with a language model. This endpoint is consistent with the [OpenAI Chat Completions API](https://platform.openai.com/docs/api-reference/chat) and may be used with the OpenAI JS or Python SDK.
 *
 * @see Telnyx\Services\AI\ChatService::createCompletion()
 *
 * @phpstan-type ChatCreateCompletionParamsShape = array{
 *   messages: list<Message|array{
 *     content: string|list<TextAndImageArray>, role: value-of<Role>
 *   }>,
 *   apiKeyRef?: string,
 *   bestOf?: int,
 *   earlyStopping?: bool,
 *   frequencyPenalty?: float,
 *   guidedChoice?: list<string>,
 *   guidedJson?: array<string,mixed>,
 *   guidedRegex?: string,
 *   lengthPenalty?: float,
 *   logprobs?: bool,
 *   maxTokens?: int,
 *   minP?: float,
 *   model?: string,
 *   n?: float,
 *   presencePenalty?: float,
 *   responseFormat?: ResponseFormat|array{type: value-of<Type>},
 *   stream?: bool,
 *   temperature?: float,
 *   toolChoice?: ToolChoice|value-of<ToolChoice>,
 *   tools?: list<ChatCompletionToolParam|array{
 *     function: Function1, type?: 'function'
 *   }|Retrieval|array{
 *     retrieval: InferenceEmbeddingBucketIDs, type?: 'retrieval'
 *   }>,
 *   topLogprobs?: int,
 *   topP?: float,
 *   useBeamSearch?: bool,
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
    #[Required(list: Message::class)]
    public array $messages;

    /**
     * If you are using an external inference provider like xAI or OpenAI, this field allows you to pass along a reference to your API key. After creating an [integration secret](https://developers.telnyx.com/api/secrets-manager/integration-secrets/create-integration-secret) for you API key, pass the secret's `identifier` in this field.
     */
    #[Optional('api_key_ref')]
    public ?string $apiKeyRef;

    /**
     * This is used with `use_beam_search` to determine how many candidate beams to explore.
     */
    #[Optional('best_of')]
    public ?int $bestOf;

    /**
     * This is used with `use_beam_search`. If `true`, generation stops as soon as there are `best_of` complete candidates; if `false`, a heuristic is applied and the generation stops when is it very unlikely to find better candidates.
     */
    #[Optional('early_stopping')]
    public ?bool $earlyStopping;

    /**
     * Higher values will penalize the model from repeating the same output tokens.
     */
    #[Optional('frequency_penalty')]
    public ?float $frequencyPenalty;

    /**
     * If specified, the output will be exactly one of the choices.
     *
     * @var list<string>|null $guidedChoice
     */
    #[Optional('guided_choice', list: 'string')]
    public ?array $guidedChoice;

    /**
     * Must be a valid JSON schema. If specified, the output will follow the JSON schema.
     *
     * @var array<string,mixed>|null $guidedJson
     */
    #[Optional('guided_json', map: 'mixed')]
    public ?array $guidedJson;

    /**
     * If specified, the output will follow the regex pattern.
     */
    #[Optional('guided_regex')]
    public ?string $guidedRegex;

    /**
     * This is used with `use_beam_search` to prefer shorter or longer completions.
     */
    #[Optional('length_penalty')]
    public ?float $lengthPenalty;

    /**
     * Whether to return log probabilities of the output tokens or not. If true, returns the log probabilities of each output token returned in the `content` of `message`.
     */
    #[Optional]
    public ?bool $logprobs;

    /**
     * Maximum number of completion tokens the model should generate.
     */
    #[Optional('max_tokens')]
    public ?int $maxTokens;

    /**
     * This is an alternative to `top_p` that [many prefer](https://github.com/huggingface/transformers/issues/27670). Must be in [0, 1].
     */
    #[Optional('min_p')]
    public ?float $minP;

    /**
     * The language model to chat with.
     */
    #[Optional]
    public ?string $model;

    /**
     * This will return multiple choices for you instead of a single chat completion.
     */
    #[Optional]
    public ?float $n;

    /**
     * Higher values will penalize the model from repeating the same output tokens.
     */
    #[Optional('presence_penalty')]
    public ?float $presencePenalty;

    /**
     * Use this is you want to guarantee a JSON output without defining a schema. For control over the schema, use `guided_json`.
     */
    #[Optional('response_format')]
    public ?ResponseFormat $responseFormat;

    /**
     * Whether or not to stream data-only server-sent events as they become available.
     */
    #[Optional]
    public ?bool $stream;

    /**
     * Adjusts the "creativity" of the model. Lower values make the model more deterministic and repetitive, while higher values make the model more random and creative.
     */
    #[Optional]
    public ?float $temperature;

    /** @var value-of<ToolChoice>|null $toolChoice */
    #[Optional('tool_choice', enum: ToolChoice::class)]
    public ?string $toolChoice;

    /**
     * The `function` tool type follows the same schema as the [OpenAI Chat Completions API](https://platform.openai.com/docs/api-reference/chat). The `retrieval` tool type is unique to Telnyx. You may pass a list of [embedded storage buckets](https://developers.telnyx.com/api/inference/inference-embedding/post-embedding) for retrieval-augmented generation.
     *
     * @var list<ChatCompletionToolParam|Retrieval>|null $tools
     */
    #[Optional(list: Tool::class)]
    public ?array $tools;

    /**
     * This is used with `logprobs`. An integer between 0 and 20 specifying the number of most likely tokens to return at each token position, each with an associated log probability.
     */
    #[Optional('top_logprobs')]
    public ?int $topLogprobs;

    /**
     * An alternative or complement to `temperature`. This adjusts how many of the top possibilities to consider.
     */
    #[Optional('top_p')]
    public ?float $topP;

    /**
     * Setting this to `true` will allow the model to [explore more completion options](https://huggingface.co/blog/how-to-generate#beam-search). This is not supported by OpenAI.
     */
    #[Optional('use_beam_search')]
    public ?bool $useBeamSearch;

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
     * @param list<Message|array{
     *   content: string|list<TextAndImageArray>, role: value-of<Role>
     * }> $messages
     * @param list<string> $guidedChoice
     * @param array<string,mixed> $guidedJson
     * @param ResponseFormat|array{type: value-of<Type>} $responseFormat
     * @param ToolChoice|value-of<ToolChoice> $toolChoice
     * @param list<ChatCompletionToolParam|array{
     *   function: Function1, type?: 'function'
     * }|Retrieval|array{
     *   retrieval: InferenceEmbeddingBucketIDs, type?: 'retrieval'
     * }> $tools
     */
    public static function with(
        array $messages,
        ?string $apiKeyRef = null,
        ?int $bestOf = null,
        ?bool $earlyStopping = null,
        ?float $frequencyPenalty = null,
        ?array $guidedChoice = null,
        ?array $guidedJson = null,
        ?string $guidedRegex = null,
        ?float $lengthPenalty = null,
        ?bool $logprobs = null,
        ?int $maxTokens = null,
        ?float $minP = null,
        ?string $model = null,
        ?float $n = null,
        ?float $presencePenalty = null,
        ResponseFormat|array|null $responseFormat = null,
        ?bool $stream = null,
        ?float $temperature = null,
        ToolChoice|string|null $toolChoice = null,
        ?array $tools = null,
        ?int $topLogprobs = null,
        ?float $topP = null,
        ?bool $useBeamSearch = null,
    ): self {
        $self = new self;

        $self['messages'] = $messages;

        null !== $apiKeyRef && $self['apiKeyRef'] = $apiKeyRef;
        null !== $bestOf && $self['bestOf'] = $bestOf;
        null !== $earlyStopping && $self['earlyStopping'] = $earlyStopping;
        null !== $frequencyPenalty && $self['frequencyPenalty'] = $frequencyPenalty;
        null !== $guidedChoice && $self['guidedChoice'] = $guidedChoice;
        null !== $guidedJson && $self['guidedJson'] = $guidedJson;
        null !== $guidedRegex && $self['guidedRegex'] = $guidedRegex;
        null !== $lengthPenalty && $self['lengthPenalty'] = $lengthPenalty;
        null !== $logprobs && $self['logprobs'] = $logprobs;
        null !== $maxTokens && $self['maxTokens'] = $maxTokens;
        null !== $minP && $self['minP'] = $minP;
        null !== $model && $self['model'] = $model;
        null !== $n && $self['n'] = $n;
        null !== $presencePenalty && $self['presencePenalty'] = $presencePenalty;
        null !== $responseFormat && $self['responseFormat'] = $responseFormat;
        null !== $stream && $self['stream'] = $stream;
        null !== $temperature && $self['temperature'] = $temperature;
        null !== $toolChoice && $self['toolChoice'] = $toolChoice;
        null !== $tools && $self['tools'] = $tools;
        null !== $topLogprobs && $self['topLogprobs'] = $topLogprobs;
        null !== $topP && $self['topP'] = $topP;
        null !== $useBeamSearch && $self['useBeamSearch'] = $useBeamSearch;

        return $self;
    }

    /**
     * A list of the previous chat messages for context.
     *
     * @param list<Message|array{
     *   content: string|list<TextAndImageArray>, role: value-of<Role>
     * }> $messages
     */
    public function withMessages(array $messages): self
    {
        $self = clone $this;
        $self['messages'] = $messages;

        return $self;
    }

    /**
     * If you are using an external inference provider like xAI or OpenAI, this field allows you to pass along a reference to your API key. After creating an [integration secret](https://developers.telnyx.com/api/secrets-manager/integration-secrets/create-integration-secret) for you API key, pass the secret's `identifier` in this field.
     */
    public function withAPIKeyRef(string $apiKeyRef): self
    {
        $self = clone $this;
        $self['apiKeyRef'] = $apiKeyRef;

        return $self;
    }

    /**
     * This is used with `use_beam_search` to determine how many candidate beams to explore.
     */
    public function withBestOf(int $bestOf): self
    {
        $self = clone $this;
        $self['bestOf'] = $bestOf;

        return $self;
    }

    /**
     * This is used with `use_beam_search`. If `true`, generation stops as soon as there are `best_of` complete candidates; if `false`, a heuristic is applied and the generation stops when is it very unlikely to find better candidates.
     */
    public function withEarlyStopping(bool $earlyStopping): self
    {
        $self = clone $this;
        $self['earlyStopping'] = $earlyStopping;

        return $self;
    }

    /**
     * Higher values will penalize the model from repeating the same output tokens.
     */
    public function withFrequencyPenalty(float $frequencyPenalty): self
    {
        $self = clone $this;
        $self['frequencyPenalty'] = $frequencyPenalty;

        return $self;
    }

    /**
     * If specified, the output will be exactly one of the choices.
     *
     * @param list<string> $guidedChoice
     */
    public function withGuidedChoice(array $guidedChoice): self
    {
        $self = clone $this;
        $self['guidedChoice'] = $guidedChoice;

        return $self;
    }

    /**
     * Must be a valid JSON schema. If specified, the output will follow the JSON schema.
     *
     * @param array<string,mixed> $guidedJson
     */
    public function withGuidedJson(array $guidedJson): self
    {
        $self = clone $this;
        $self['guidedJson'] = $guidedJson;

        return $self;
    }

    /**
     * If specified, the output will follow the regex pattern.
     */
    public function withGuidedRegex(string $guidedRegex): self
    {
        $self = clone $this;
        $self['guidedRegex'] = $guidedRegex;

        return $self;
    }

    /**
     * This is used with `use_beam_search` to prefer shorter or longer completions.
     */
    public function withLengthPenalty(float $lengthPenalty): self
    {
        $self = clone $this;
        $self['lengthPenalty'] = $lengthPenalty;

        return $self;
    }

    /**
     * Whether to return log probabilities of the output tokens or not. If true, returns the log probabilities of each output token returned in the `content` of `message`.
     */
    public function withLogprobs(bool $logprobs): self
    {
        $self = clone $this;
        $self['logprobs'] = $logprobs;

        return $self;
    }

    /**
     * Maximum number of completion tokens the model should generate.
     */
    public function withMaxTokens(int $maxTokens): self
    {
        $self = clone $this;
        $self['maxTokens'] = $maxTokens;

        return $self;
    }

    /**
     * This is an alternative to `top_p` that [many prefer](https://github.com/huggingface/transformers/issues/27670). Must be in [0, 1].
     */
    public function withMinP(float $minP): self
    {
        $self = clone $this;
        $self['minP'] = $minP;

        return $self;
    }

    /**
     * The language model to chat with.
     */
    public function withModel(string $model): self
    {
        $self = clone $this;
        $self['model'] = $model;

        return $self;
    }

    /**
     * This will return multiple choices for you instead of a single chat completion.
     */
    public function withN(float $n): self
    {
        $self = clone $this;
        $self['n'] = $n;

        return $self;
    }

    /**
     * Higher values will penalize the model from repeating the same output tokens.
     */
    public function withPresencePenalty(float $presencePenalty): self
    {
        $self = clone $this;
        $self['presencePenalty'] = $presencePenalty;

        return $self;
    }

    /**
     * Use this is you want to guarantee a JSON output without defining a schema. For control over the schema, use `guided_json`.
     *
     * @param ResponseFormat|array{type: value-of<Type>} $responseFormat
     */
    public function withResponseFormat(
        ResponseFormat|array $responseFormat
    ): self {
        $self = clone $this;
        $self['responseFormat'] = $responseFormat;

        return $self;
    }

    /**
     * Whether or not to stream data-only server-sent events as they become available.
     */
    public function withStream(bool $stream): self
    {
        $self = clone $this;
        $self['stream'] = $stream;

        return $self;
    }

    /**
     * Adjusts the "creativity" of the model. Lower values make the model more deterministic and repetitive, while higher values make the model more random and creative.
     */
    public function withTemperature(float $temperature): self
    {
        $self = clone $this;
        $self['temperature'] = $temperature;

        return $self;
    }

    /**
     * @param ToolChoice|value-of<ToolChoice> $toolChoice
     */
    public function withToolChoice(ToolChoice|string $toolChoice): self
    {
        $self = clone $this;
        $self['toolChoice'] = $toolChoice;

        return $self;
    }

    /**
     * The `function` tool type follows the same schema as the [OpenAI Chat Completions API](https://platform.openai.com/docs/api-reference/chat). The `retrieval` tool type is unique to Telnyx. You may pass a list of [embedded storage buckets](https://developers.telnyx.com/api/inference/inference-embedding/post-embedding) for retrieval-augmented generation.
     *
     * @param list<ChatCompletionToolParam|array{
     *   function: Function1, type?: 'function'
     * }|Retrieval|array{
     *   retrieval: InferenceEmbeddingBucketIDs, type?: 'retrieval'
     * }> $tools
     */
    public function withTools(array $tools): self
    {
        $self = clone $this;
        $self['tools'] = $tools;

        return $self;
    }

    /**
     * This is used with `logprobs`. An integer between 0 and 20 specifying the number of most likely tokens to return at each token position, each with an associated log probability.
     */
    public function withTopLogprobs(int $topLogprobs): self
    {
        $self = clone $this;
        $self['topLogprobs'] = $topLogprobs;

        return $self;
    }

    /**
     * An alternative or complement to `temperature`. This adjusts how many of the top possibilities to consider.
     */
    public function withTopP(float $topP): self
    {
        $self = clone $this;
        $self['topP'] = $topP;

        return $self;
    }

    /**
     * Setting this to `true` will allow the model to [explore more completion options](https://huggingface.co/blog/how-to-generate#beam-search). This is not supported by OpenAI.
     */
    public function withUseBeamSearch(bool $useBeamSearch): self
    {
        $self = clone $this;
        $self['useBeamSearch'] = $useBeamSearch;

        return $self;
    }
}
