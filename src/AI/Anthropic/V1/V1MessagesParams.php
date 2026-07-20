<?php

declare(strict_types=1);

namespace Telnyx\AI\Anthropic\V1;

use Telnyx\AI\Anthropic\V1\V1MessagesParams\System;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\MapOf;

/**
 * Send a message to a language model using the Anthropic Messages API format. This endpoint is compatible with the [Anthropic Messages API](https://docs.anthropic.com/en/api/messages) and may be used with the Anthropic JS or Python SDK by setting the base URL to `https://api.telnyx.com/v2/ai/anthropic`.
 *
 * The endpoint translates Anthropic-format requests into Telnyx's inference internals, then translates the response back to the Anthropic message shape. Streaming responses use Anthropic SSE event types (`message_start`, `content_block_start`, `content_block_delta`, `content_block_stop`, `message_delta`, `message_stop`).
 *
 * @see Telnyx\Services\AI\Anthropic\V1Service::messages()
 *
 * @phpstan-import-type SystemVariants from \Telnyx\AI\Anthropic\V1\V1MessagesParams\System
 * @phpstan-import-type SystemShape from \Telnyx\AI\Anthropic\V1\V1MessagesParams\System
 *
 * @phpstan-type V1MessagesParamsShape = array{
 *   maxTokens: int,
 *   messages: list<array<string,mixed>>,
 *   model: string,
 *   apiKeyRef?: string|null,
 *   billingGroupID?: string|null,
 *   fallbackConfig?: array<string,mixed>|null,
 *   maxRetries?: int|null,
 *   mcpServers?: list<array<string,mixed>>|null,
 *   metadata?: array<string,mixed>|null,
 *   serviceTier?: string|null,
 *   stopSequences?: list<string>|null,
 *   stream?: bool|null,
 *   system?: SystemShape|null,
 *   temperature?: float|null,
 *   thinking?: array<string,mixed>|null,
 *   timeout?: float|null,
 *   toolChoice?: array<string,mixed>|null,
 *   tools?: list<array<string,mixed>>|null,
 *   topK?: int|null,
 *   topP?: float|null,
 * }
 */
final class V1MessagesParams implements BaseModel
{
    /** @use SdkModel<V1MessagesParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The maximum number of tokens to generate in the response.
     */
    #[Required('max_tokens')]
    public int $maxTokens;

    /**
     * The messages to send to the model, following the [Anthropic Messages API](https://docs.anthropic.com/en/api/messages) format.
     *
     * @var list<array<string,mixed>> $messages
     */
    #[Required(list: new MapOf('mixed'))]
    public array $messages;

    /**
     * The model to use for generating the response, for example `zai-org/GLM-5.2` or another model available from the Telnyx models endpoint.
     */
    #[Required]
    public string $model;

    /**
     * If you are using an external inference provider, this field allows you to pass along a reference to your API key. After creating an [integration secret](https://developers.telnyx.com/api-reference/integration-secrets/create-a-secret) for your API key, pass the secret's `identifier` in this field.
     */
    #[Optional('api_key_ref')]
    public ?string $apiKeyRef;

    /**
     * The billing group ID to associate with this request.
     */
    #[Optional('billing_group_id')]
    public ?string $billingGroupID;

    /**
     * Configuration for model fallback behavior when the primary model is unavailable.
     *
     * @var array<string,mixed>|null $fallbackConfig
     */
    #[Optional('fallback_config', map: 'mixed')]
    public ?array $fallbackConfig;

    /**
     * Maximum number of retries for the request.
     */
    #[Optional('max_retries')]
    public ?int $maxRetries;

    /**
     * List of MCP (Model Context Protocol) servers to make available to the model.
     *
     * @var list<array<string,mixed>>|null $mcpServers
     */
    #[Optional('mcp_servers', list: new MapOf('mixed'))]
    public ?array $mcpServers;

    /**
     * An object describing metadata about the request.
     *
     * @var array<string,mixed>|null $metadata
     */
    #[Optional(map: 'mixed')]
    public ?array $metadata;

    /**
     * Service tier for the request.
     */
    #[Optional('service_tier')]
    public ?string $serviceTier;

    /**
     * Custom sequences that will cause the model to stop generating.
     *
     * @var list<string>|null $stopSequences
     */
    #[Optional('stop_sequences', list: 'string')]
    public ?array $stopSequences;

    /**
     * Whether to stream the response as Anthropic-format Server-Sent Events.
     */
    #[Optional]
    public ?bool $stream;

    /**
     * System prompt. Can be a string or an array of content blocks following the Anthropic API format.
     *
     * @var SystemVariants|null $system
     */
    #[Optional(union: System::class)]
    public string|array|null $system;

    /**
     * Amount of randomness injected into the response. Ranges from 0 to 1.
     */
    #[Optional]
    public ?float $temperature;

    /**
     * Extended thinking configuration for models that support it. Set `type` to `enabled` to turn on extended thinking.
     *
     * @var array<string,mixed>|null $thinking
     */
    #[Optional(map: 'mixed')]
    public ?array $thinking;

    /**
     * Request timeout in seconds.
     */
    #[Optional]
    public ?float $timeout;

    /**
     * Controls how the model uses tools, following the Anthropic API format.
     *
     * @var array<string,mixed>|null $toolChoice
     */
    #[Optional('tool_choice', map: 'mixed')]
    public ?array $toolChoice;

    /**
     * Definitions of tools that the model may use, following the Anthropic API format.
     *
     * @var list<array<string,mixed>>|null $tools
     */
    #[Optional(list: new MapOf('mixed'))]
    public ?array $tools;

    /**
     * Top-k sampling parameter. Only sample from the top K options for each subsequent token.
     */
    #[Optional('top_k')]
    public ?int $topK;

    /**
     * Nucleus sampling parameter. Use temperature or top_p, but not both.
     */
    #[Optional('top_p')]
    public ?float $topP;

    /**
     * `new V1MessagesParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * V1MessagesParams::with(maxTokens: ..., messages: ..., model: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new V1MessagesParams)->withMaxTokens(...)->withMessages(...)->withModel(...)
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
     * @param list<array<string,mixed>> $messages
     * @param array<string,mixed>|null $fallbackConfig
     * @param list<array<string,mixed>>|null $mcpServers
     * @param array<string,mixed>|null $metadata
     * @param list<string>|null $stopSequences
     * @param SystemShape|null $system
     * @param array<string,mixed>|null $thinking
     * @param array<string,mixed>|null $toolChoice
     * @param list<array<string,mixed>>|null $tools
     */
    public static function with(
        int $maxTokens,
        array $messages,
        string $model,
        ?string $apiKeyRef = null,
        ?string $billingGroupID = null,
        ?array $fallbackConfig = null,
        ?int $maxRetries = null,
        ?array $mcpServers = null,
        ?array $metadata = null,
        ?string $serviceTier = null,
        ?array $stopSequences = null,
        ?bool $stream = null,
        string|array|null $system = null,
        ?float $temperature = null,
        ?array $thinking = null,
        ?float $timeout = null,
        ?array $toolChoice = null,
        ?array $tools = null,
        ?int $topK = null,
        ?float $topP = null,
    ): self {
        $self = new self;

        $self['maxTokens'] = $maxTokens;
        $self['messages'] = $messages;
        $self['model'] = $model;

        null !== $apiKeyRef && $self['apiKeyRef'] = $apiKeyRef;
        null !== $billingGroupID && $self['billingGroupID'] = $billingGroupID;
        null !== $fallbackConfig && $self['fallbackConfig'] = $fallbackConfig;
        null !== $maxRetries && $self['maxRetries'] = $maxRetries;
        null !== $mcpServers && $self['mcpServers'] = $mcpServers;
        null !== $metadata && $self['metadata'] = $metadata;
        null !== $serviceTier && $self['serviceTier'] = $serviceTier;
        null !== $stopSequences && $self['stopSequences'] = $stopSequences;
        null !== $stream && $self['stream'] = $stream;
        null !== $system && $self['system'] = $system;
        null !== $temperature && $self['temperature'] = $temperature;
        null !== $thinking && $self['thinking'] = $thinking;
        null !== $timeout && $self['timeout'] = $timeout;
        null !== $toolChoice && $self['toolChoice'] = $toolChoice;
        null !== $tools && $self['tools'] = $tools;
        null !== $topK && $self['topK'] = $topK;
        null !== $topP && $self['topP'] = $topP;

        return $self;
    }

    /**
     * The maximum number of tokens to generate in the response.
     */
    public function withMaxTokens(int $maxTokens): self
    {
        $self = clone $this;
        $self['maxTokens'] = $maxTokens;

        return $self;
    }

    /**
     * The messages to send to the model, following the [Anthropic Messages API](https://docs.anthropic.com/en/api/messages) format.
     *
     * @param list<array<string,mixed>> $messages
     */
    public function withMessages(array $messages): self
    {
        $self = clone $this;
        $self['messages'] = $messages;

        return $self;
    }

    /**
     * The model to use for generating the response, for example `zai-org/GLM-5.2` or another model available from the Telnyx models endpoint.
     */
    public function withModel(string $model): self
    {
        $self = clone $this;
        $self['model'] = $model;

        return $self;
    }

    /**
     * If you are using an external inference provider, this field allows you to pass along a reference to your API key. After creating an [integration secret](https://developers.telnyx.com/api-reference/integration-secrets/create-a-secret) for your API key, pass the secret's `identifier` in this field.
     */
    public function withAPIKeyRef(string $apiKeyRef): self
    {
        $self = clone $this;
        $self['apiKeyRef'] = $apiKeyRef;

        return $self;
    }

    /**
     * The billing group ID to associate with this request.
     */
    public function withBillingGroupID(string $billingGroupID): self
    {
        $self = clone $this;
        $self['billingGroupID'] = $billingGroupID;

        return $self;
    }

    /**
     * Configuration for model fallback behavior when the primary model is unavailable.
     *
     * @param array<string,mixed> $fallbackConfig
     */
    public function withFallbackConfig(array $fallbackConfig): self
    {
        $self = clone $this;
        $self['fallbackConfig'] = $fallbackConfig;

        return $self;
    }

    /**
     * Maximum number of retries for the request.
     */
    public function withMaxRetries(int $maxRetries): self
    {
        $self = clone $this;
        $self['maxRetries'] = $maxRetries;

        return $self;
    }

    /**
     * List of MCP (Model Context Protocol) servers to make available to the model.
     *
     * @param list<array<string,mixed>> $mcpServers
     */
    public function withMcpServers(array $mcpServers): self
    {
        $self = clone $this;
        $self['mcpServers'] = $mcpServers;

        return $self;
    }

    /**
     * An object describing metadata about the request.
     *
     * @param array<string,mixed> $metadata
     */
    public function withMetadata(array $metadata): self
    {
        $self = clone $this;
        $self['metadata'] = $metadata;

        return $self;
    }

    /**
     * Service tier for the request.
     */
    public function withServiceTier(string $serviceTier): self
    {
        $self = clone $this;
        $self['serviceTier'] = $serviceTier;

        return $self;
    }

    /**
     * Custom sequences that will cause the model to stop generating.
     *
     * @param list<string> $stopSequences
     */
    public function withStopSequences(array $stopSequences): self
    {
        $self = clone $this;
        $self['stopSequences'] = $stopSequences;

        return $self;
    }

    /**
     * Whether to stream the response as Anthropic-format Server-Sent Events.
     */
    public function withStream(bool $stream): self
    {
        $self = clone $this;
        $self['stream'] = $stream;

        return $self;
    }

    /**
     * System prompt. Can be a string or an array of content blocks following the Anthropic API format.
     *
     * @param SystemShape $system
     */
    public function withSystem(string|array $system): self
    {
        $self = clone $this;
        $self['system'] = $system;

        return $self;
    }

    /**
     * Amount of randomness injected into the response. Ranges from 0 to 1.
     */
    public function withTemperature(float $temperature): self
    {
        $self = clone $this;
        $self['temperature'] = $temperature;

        return $self;
    }

    /**
     * Extended thinking configuration for models that support it. Set `type` to `enabled` to turn on extended thinking.
     *
     * @param array<string,mixed> $thinking
     */
    public function withThinking(array $thinking): self
    {
        $self = clone $this;
        $self['thinking'] = $thinking;

        return $self;
    }

    /**
     * Request timeout in seconds.
     */
    public function withTimeout(float $timeout): self
    {
        $self = clone $this;
        $self['timeout'] = $timeout;

        return $self;
    }

    /**
     * Controls how the model uses tools, following the Anthropic API format.
     *
     * @param array<string,mixed> $toolChoice
     */
    public function withToolChoice(array $toolChoice): self
    {
        $self = clone $this;
        $self['toolChoice'] = $toolChoice;

        return $self;
    }

    /**
     * Definitions of tools that the model may use, following the Anthropic API format.
     *
     * @param list<array<string,mixed>> $tools
     */
    public function withTools(array $tools): self
    {
        $self = clone $this;
        $self['tools'] = $tools;

        return $self;
    }

    /**
     * Top-k sampling parameter. Only sample from the top K options for each subsequent token.
     */
    public function withTopK(int $topK): self
    {
        $self = clone $this;
        $self['topK'] = $topK;

        return $self;
    }

    /**
     * Nucleus sampling parameter. Use temperature or top_p, but not both.
     */
    public function withTopP(float $topP): self
    {
        $self = clone $this;
        $self['topP'] = $topP;

        return $self;
    }
}
