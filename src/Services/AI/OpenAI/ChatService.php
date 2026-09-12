<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\OpenAI;

use Telnyx\AI\OpenAI\Chat\ChatCreateCompletionParams\Message;
use Telnyx\AI\OpenAI\Chat\ChatCreateCompletionParams\Mode;
use Telnyx\AI\OpenAI\Chat\ChatCreateCompletionParams\ReasoningEffort;
use Telnyx\AI\OpenAI\Chat\ChatCreateCompletionParams\Region;
use Telnyx\AI\OpenAI\Chat\ChatCreateCompletionParams\ResponseFormat\ResponseFormatJsonObject;
use Telnyx\AI\OpenAI\Chat\ChatCreateCompletionParams\ResponseFormat\ResponseFormatJsonSchemaParam;
use Telnyx\AI\OpenAI\Chat\ChatCreateCompletionParams\ResponseFormat\ResponseFormatText;
use Telnyx\AI\OpenAI\Chat\ChatCreateCompletionParams\ToolChoice;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\OpenAI\ChatContract;

/**
 * @phpstan-import-type MessageShape from \Telnyx\AI\OpenAI\Chat\ChatCreateCompletionParams\Message
 * @phpstan-import-type ResponseFormatShape from \Telnyx\AI\OpenAI\Chat\ChatCreateCompletionParams\ResponseFormat
 * @phpstan-import-type StopShape from \Telnyx\AI\OpenAI\Chat\ChatCreateCompletionParams\Stop
 * @phpstan-import-type ToolShape from \Telnyx\AI\OpenAI\Chat\ChatCreateCompletionParams\Tool
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
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
     * Chat with a language model. This endpoint is consistent with the [OpenAI Chat Completions API](https://platform.openai.com/docs/api-reference/chat) and may be used with the OpenAI JS or Python SDK by setting the base URL to `https://api.telnyx.com/v2/ai/openai`.
     *
     * @param list<Message|MessageShape> $messages a list of the previous chat messages for context
     * @param string $apiKeyRef If you are using an external inference provider like xAI or OpenAI, this field allows you to pass along a reference to your API key. After creating an [integration secret](https://developers.telnyx.com/api-reference/integration-secrets/create-a-secret) for you API key, pass the secret's `identifier` in this field.
     * @param int $bestOf this is used with `use_beam_search` to determine how many candidate beams to explore
     * @param bool $earlyStopping This is used with `use_beam_search`. If `true`, generation stops as soon as there are `best_of` complete candidates; if `false`, a heuristic is applied and the generation stops when is it very unlikely to find better candidates.
     * @param bool $enableThinking Whether to enable the thinking/reasoning phase for models that support it (e.g., QwQ, Qwen3). When set to false, the model will skip the internal reasoning step and respond directly, which can reduce latency. Defaults to true.
     * @param float $frequencyPenalty higher values will penalize the model from repeating the same output tokens
     * @param float $lengthPenalty this is used with `use_beam_search` to prefer shorter or longer completions
     * @param bool $logprobs Whether to return log probabilities of the output tokens or not. If true, returns the log probabilities of each output token returned in the `content` of `message`.
     * @param int $maxTokens maximum number of completion tokens the model should generate
     * @param float $minP This is an alternative to `top_p` that [many prefer](https://github.com/huggingface/transformers/issues/27670). Must be in [0, 1].
     * @param Mode|value-of<Mode> $mode How strictly `region` is applied. `preferred` (the default when `region` is set) tries that region first and falls back to another when the model cannot be served there, so a request that would have succeeded still succeeds. `strict` pins the request: it is served from that region or it fails with a 422, never redirected to another region. Requires `region`.
     * @param string $model the language model to chat with
     * @param float $n this will return multiple choices for you instead of a single chat completion
     * @param float $presencePenalty higher values will penalize the model from repeating the same output tokens
     * @param ReasoningEffort|value-of<ReasoningEffort> $reasoningEffort Controls the reasoning effort for models that support it. When set, the model spends more or less compute on internal reasoning before generating its response. Supported values: none, minimal, low, medium, high, xhigh, max. Not all models support all values; unsupported values are rejected with a 400 error. When omitted, reasoning models use their default effort level.
     * @param Region|value-of<Region> $region Optional data-residency region the request should be served from, using the same vocabulary as your account's Data Locality setting. Behavior depends on `mode`. Supported for Telnyx-hosted models only: a request routed to an external provider never passes through Telnyx model routing, so a region cannot be enforced for it. Omit for today's latency-based routing.
     * @param ResponseFormatShape $responseFormat Controls the format of the model output. `json_object` guarantees valid JSON output without defining a schema; `json_schema` constrains the output to the JSON schema you supply via the `json_schema` property and is the supported way to get guaranteed structured output on Telnyx-hosted models.
     * @param int $seed if specified, the system will make a best effort to sample deterministically, such that repeated requests with the same `seed` and parameters should return the same result
     * @param string $serviceTier The service tier to use for this request. Supported values vary by model; use `GET /v2/ai/openai/models` and inspect the model's `service_tiers` field. If omitted, Telnyx-hosted models use `default`.
     * @param StopShape $stop Up to 4 sequences where the API will stop generating further tokens. The returned text will not contain the stop sequence.
     * @param bool $stream whether or not to stream data-only server-sent events as they become available
     * @param float $temperature Adjusts the "creativity" of the model. Lower values make the model more deterministic and repetitive, while higher values make the model more random and creative.
     * @param ToolChoice|value-of<ToolChoice> $toolChoice
     * @param list<ToolShape> $tools The `function` tool type follows the same schema as the [OpenAI Chat Completions API](https://platform.openai.com/docs/api-reference/chat). The `retrieval` tool type is unique to Telnyx. You may pass a list of [embedded storage buckets](https://developers.telnyx.com/api-reference/embeddings/embed-documents) for retrieval-augmented generation.
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
        bool $enableThinking = true,
        float $frequencyPenalty = 0,
        float $lengthPenalty = 1,
        bool $logprobs = false,
        ?int $maxTokens = null,
        ?float $minP = null,
        Mode|string $mode = 'preferred',
        string $model = 'meta-llama/Meta-Llama-3.1-8B-Instruct',
        ?float $n = null,
        float $presencePenalty = 0,
        ReasoningEffort|string|null $reasoningEffort = null,
        Region|string|null $region = null,
        ResponseFormatText|array|ResponseFormatJsonObject|ResponseFormatJsonSchemaParam|null $responseFormat = null,
        ?int $seed = null,
        ?string $serviceTier = null,
        string|array|null $stop = null,
        bool $stream = false,
        float $temperature = 0.1,
        ToolChoice|string|null $toolChoice = null,
        ?array $tools = null,
        ?int $topLogprobs = null,
        ?float $topP = null,
        bool $useBeamSearch = false,
        RequestOptions|array|null $requestOptions = null,
    ): array {
        $params = array_filter(
            [
                'messages' => $messages,
                'apiKeyRef' => $apiKeyRef ?? Omitted::VALUE,
                'bestOf' => $bestOf ?? Omitted::VALUE,
                'earlyStopping' => $earlyStopping,
                'enableThinking' => $enableThinking,
                'frequencyPenalty' => $frequencyPenalty,
                'lengthPenalty' => $lengthPenalty,
                'logprobs' => $logprobs,
                'maxTokens' => $maxTokens ?? Omitted::VALUE,
                'minP' => $minP ?? Omitted::VALUE,
                'mode' => $mode,
                'model' => $model,
                'n' => $n ?? Omitted::VALUE,
                'presencePenalty' => $presencePenalty,
                'reasoningEffort' => $reasoningEffort ?? Omitted::VALUE,
                'region' => $region ?? Omitted::VALUE,
                'responseFormat' => $responseFormat ?? Omitted::VALUE,
                'seed' => $seed ?? Omitted::VALUE,
                'serviceTier' => $serviceTier ?? Omitted::VALUE,
                'stop' => $stop ?? Omitted::VALUE,
                'stream' => $stream,
                'temperature' => $temperature,
                'toolChoice' => $toolChoice ?? Omitted::VALUE,
                'tools' => $tools ?? Omitted::VALUE,
                'topLogprobs' => $topLogprobs ?? Omitted::VALUE,
                'topP' => $topP ?? Omitted::VALUE,
                'useBeamSearch' => $useBeamSearch,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createCompletion(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
