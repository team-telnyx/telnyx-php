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
 *     function: Function1,
 *     type: value-of<\Telnyx\AI\Chat\ChatCreateCompletionParams\Tool\ChatCompletionToolParam\Type>,
 *   }|Retrieval|array{
 *     retrieval: InferenceEmbeddingBucketIDs,
 *     type: value-of<\Telnyx\AI\Chat\ChatCreateCompletionParams\Tool\Retrieval\Type>,
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
     *   function: Function1,
     *   type: value-of<ChatCompletionToolParam\Type>,
     * }|Retrieval|array{
     *   retrieval: InferenceEmbeddingBucketIDs,
     *   type: value-of<Retrieval\Type>,
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
        $obj = new self;

        $obj['messages'] = $messages;

        null !== $apiKeyRef && $obj['apiKeyRef'] = $apiKeyRef;
        null !== $bestOf && $obj['bestOf'] = $bestOf;
        null !== $earlyStopping && $obj['earlyStopping'] = $earlyStopping;
        null !== $frequencyPenalty && $obj['frequencyPenalty'] = $frequencyPenalty;
        null !== $guidedChoice && $obj['guidedChoice'] = $guidedChoice;
        null !== $guidedJson && $obj['guidedJson'] = $guidedJson;
        null !== $guidedRegex && $obj['guidedRegex'] = $guidedRegex;
        null !== $lengthPenalty && $obj['lengthPenalty'] = $lengthPenalty;
        null !== $logprobs && $obj['logprobs'] = $logprobs;
        null !== $maxTokens && $obj['maxTokens'] = $maxTokens;
        null !== $minP && $obj['minP'] = $minP;
        null !== $model && $obj['model'] = $model;
        null !== $n && $obj['n'] = $n;
        null !== $presencePenalty && $obj['presencePenalty'] = $presencePenalty;
        null !== $responseFormat && $obj['responseFormat'] = $responseFormat;
        null !== $stream && $obj['stream'] = $stream;
        null !== $temperature && $obj['temperature'] = $temperature;
        null !== $toolChoice && $obj['toolChoice'] = $toolChoice;
        null !== $tools && $obj['tools'] = $tools;
        null !== $topLogprobs && $obj['topLogprobs'] = $topLogprobs;
        null !== $topP && $obj['topP'] = $topP;
        null !== $useBeamSearch && $obj['useBeamSearch'] = $useBeamSearch;

        return $obj;
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
        $obj = clone $this;
        $obj['messages'] = $messages;

        return $obj;
    }

    /**
     * If you are using an external inference provider like xAI or OpenAI, this field allows you to pass along a reference to your API key. After creating an [integration secret](https://developers.telnyx.com/api/secrets-manager/integration-secrets/create-integration-secret) for you API key, pass the secret's `identifier` in this field.
     */
    public function withAPIKeyRef(string $apiKeyRef): self
    {
        $obj = clone $this;
        $obj['apiKeyRef'] = $apiKeyRef;

        return $obj;
    }

    /**
     * This is used with `use_beam_search` to determine how many candidate beams to explore.
     */
    public function withBestOf(int $bestOf): self
    {
        $obj = clone $this;
        $obj['bestOf'] = $bestOf;

        return $obj;
    }

    /**
     * This is used with `use_beam_search`. If `true`, generation stops as soon as there are `best_of` complete candidates; if `false`, a heuristic is applied and the generation stops when is it very unlikely to find better candidates.
     */
    public function withEarlyStopping(bool $earlyStopping): self
    {
        $obj = clone $this;
        $obj['earlyStopping'] = $earlyStopping;

        return $obj;
    }

    /**
     * Higher values will penalize the model from repeating the same output tokens.
     */
    public function withFrequencyPenalty(float $frequencyPenalty): self
    {
        $obj = clone $this;
        $obj['frequencyPenalty'] = $frequencyPenalty;

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
        $obj['guidedChoice'] = $guidedChoice;

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
        $obj['guidedJson'] = $guidedJson;

        return $obj;
    }

    /**
     * If specified, the output will follow the regex pattern.
     */
    public function withGuidedRegex(string $guidedRegex): self
    {
        $obj = clone $this;
        $obj['guidedRegex'] = $guidedRegex;

        return $obj;
    }

    /**
     * This is used with `use_beam_search` to prefer shorter or longer completions.
     */
    public function withLengthPenalty(float $lengthPenalty): self
    {
        $obj = clone $this;
        $obj['lengthPenalty'] = $lengthPenalty;

        return $obj;
    }

    /**
     * Whether to return log probabilities of the output tokens or not. If true, returns the log probabilities of each output token returned in the `content` of `message`.
     */
    public function withLogprobs(bool $logprobs): self
    {
        $obj = clone $this;
        $obj['logprobs'] = $logprobs;

        return $obj;
    }

    /**
     * Maximum number of completion tokens the model should generate.
     */
    public function withMaxTokens(int $maxTokens): self
    {
        $obj = clone $this;
        $obj['maxTokens'] = $maxTokens;

        return $obj;
    }

    /**
     * This is an alternative to `top_p` that [many prefer](https://github.com/huggingface/transformers/issues/27670). Must be in [0, 1].
     */
    public function withMinP(float $minP): self
    {
        $obj = clone $this;
        $obj['minP'] = $minP;

        return $obj;
    }

    /**
     * The language model to chat with.
     */
    public function withModel(string $model): self
    {
        $obj = clone $this;
        $obj['model'] = $model;

        return $obj;
    }

    /**
     * This will return multiple choices for you instead of a single chat completion.
     */
    public function withN(float $n): self
    {
        $obj = clone $this;
        $obj['n'] = $n;

        return $obj;
    }

    /**
     * Higher values will penalize the model from repeating the same output tokens.
     */
    public function withPresencePenalty(float $presencePenalty): self
    {
        $obj = clone $this;
        $obj['presencePenalty'] = $presencePenalty;

        return $obj;
    }

    /**
     * Use this is you want to guarantee a JSON output without defining a schema. For control over the schema, use `guided_json`.
     *
     * @param ResponseFormat|array{type: value-of<Type>} $responseFormat
     */
    public function withResponseFormat(
        ResponseFormat|array $responseFormat
    ): self {
        $obj = clone $this;
        $obj['responseFormat'] = $responseFormat;

        return $obj;
    }

    /**
     * Whether or not to stream data-only server-sent events as they become available.
     */
    public function withStream(bool $stream): self
    {
        $obj = clone $this;
        $obj['stream'] = $stream;

        return $obj;
    }

    /**
     * Adjusts the "creativity" of the model. Lower values make the model more deterministic and repetitive, while higher values make the model more random and creative.
     */
    public function withTemperature(float $temperature): self
    {
        $obj = clone $this;
        $obj['temperature'] = $temperature;

        return $obj;
    }

    /**
     * @param ToolChoice|value-of<ToolChoice> $toolChoice
     */
    public function withToolChoice(ToolChoice|string $toolChoice): self
    {
        $obj = clone $this;
        $obj['toolChoice'] = $toolChoice;

        return $obj;
    }

    /**
     * The `function` tool type follows the same schema as the [OpenAI Chat Completions API](https://platform.openai.com/docs/api-reference/chat). The `retrieval` tool type is unique to Telnyx. You may pass a list of [embedded storage buckets](https://developers.telnyx.com/api/inference/inference-embedding/post-embedding) for retrieval-augmented generation.
     *
     * @param list<ChatCompletionToolParam|array{
     *   function: Function1,
     *   type: value-of<ChatCompletionToolParam\Type>,
     * }|Retrieval|array{
     *   retrieval: InferenceEmbeddingBucketIDs,
     *   type: value-of<Retrieval\Type>,
     * }> $tools
     */
    public function withTools(array $tools): self
    {
        $obj = clone $this;
        $obj['tools'] = $tools;

        return $obj;
    }

    /**
     * This is used with `logprobs`. An integer between 0 and 20 specifying the number of most likely tokens to return at each token position, each with an associated log probability.
     */
    public function withTopLogprobs(int $topLogprobs): self
    {
        $obj = clone $this;
        $obj['topLogprobs'] = $topLogprobs;

        return $obj;
    }

    /**
     * An alternative or complement to `temperature`. This adjusts how many of the top possibilities to consider.
     */
    public function withTopP(float $topP): self
    {
        $obj = clone $this;
        $obj['topP'] = $topP;

        return $obj;
    }

    /**
     * Setting this to `true` will allow the model to [explore more completion options](https://huggingface.co/blog/how-to-generate#beam-search). This is not supported by OpenAI.
     */
    public function withUseBeamSearch(bool $useBeamSearch): self
    {
        $obj = clone $this;
        $obj['useBeamSearch'] = $useBeamSearch;

        return $obj;
    }
}
