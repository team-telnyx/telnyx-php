<?php

declare(strict_types=1);

namespace Telnyx\Calls;

use Telnyx\Calls\CallAssistantRequest\DynamicVariable;
use Telnyx\Calls\CallAssistantRequest\Tool;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\MapOf;

/**
 * AI Assistant configuration. All fields except `id` are optional — the assistant's stored configuration will be used as fallback for any omitted fields.
 *
 * @phpstan-import-type DynamicVariableVariants from \Telnyx\Calls\CallAssistantRequest\DynamicVariable
 * @phpstan-import-type ToolVariants from \Telnyx\Calls\CallAssistantRequest\Tool
 * @phpstan-import-type DynamicVariableShape from \Telnyx\Calls\CallAssistantRequest\DynamicVariable
 * @phpstan-import-type ToolShape from \Telnyx\Calls\CallAssistantRequest\Tool
 *
 * @phpstan-type CallAssistantRequestShape = array{
 *   id: string,
 *   dynamicVariables?: array<string,DynamicVariableShape>|null,
 *   externalLlm?: array<string,mixed>|null,
 *   fallbackConfig?: array<string,mixed>|null,
 *   greeting?: string|null,
 *   instructions?: string|null,
 *   llmAPIKeyRef?: string|null,
 *   mcpServers?: list<array<string,mixed>>|null,
 *   model?: string|null,
 *   name?: string|null,
 *   observabilitySettings?: array<string,mixed>|null,
 *   openaiAPIKeyRef?: string|null,
 *   tools?: list<ToolShape>|null,
 * }
 */
final class CallAssistantRequest implements BaseModel
{
    /** @use SdkModel<CallAssistantRequestShape> */
    use SdkModel;

    /**
     * The identifier of the AI assistant to use.
     */
    #[Required]
    public string $id;

    /**
     * Map of dynamic variables and their default values. Dynamic variables can be referenced in instructions, greeting, and tool definitions using the `{{variable_name}}` syntax. Call-control-agent automatically merges in `telnyx_call_*` variables (telnyx_call_to, telnyx_call_from, telnyx_conversation_channel, telnyx_agent_target, telnyx_end_user_target, telnyx_call_caller_id_name) and custom header variables.
     *
     * @var array<string,DynamicVariableVariants>|null $dynamicVariables
     */
    #[Optional('dynamic_variables', map: DynamicVariable::class)]
    public ?array $dynamicVariables;

    /**
     * External LLM configuration for bringing your own LLM endpoint.
     *
     * @var array<string,mixed>|null $externalLlm
     */
    #[Optional('external_llm', map: 'mixed')]
    public ?array $externalLlm;

    /**
     * Fallback LLM configuration used when the primary LLM provider is unavailable.
     *
     * @var array<string,mixed>|null $fallbackConfig
     */
    #[Optional('fallback_config', map: 'mixed')]
    public ?array $fallbackConfig;

    /**
     * Initial greeting text spoken when the assistant starts. Can be plain text for any voice or SSML for `AWS.Polly.<voice_id>` voices. There is a 3,000 character limit.
     */
    #[Optional]
    public ?string $greeting;

    /**
     * System instructions for the voice assistant. Can be templated with [dynamic variables](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables). This will overwrite the instructions set in the assistant configuration.
     */
    #[Optional]
    public ?string $instructions;

    /**
     * Integration secret identifier for the LLM provider API key. Use this field to reference an [integration secret](https://developers.telnyx.com/api/secrets-manager/integration-secrets/create-integration-secret) containing your LLM provider API key. Supports any LLM provider (OpenAI, Anthropic, etc.).
     */
    #[Optional('llm_api_key_ref')]
    public ?string $llmAPIKeyRef;

    /**
     * MCP (Model Context Protocol) server configurations for extending the assistant's capabilities with external tools and data sources.
     *
     * @var list<array<string,mixed>>|null $mcpServers
     */
    #[Optional('mcp_servers', list: new MapOf('mixed'))]
    public ?array $mcpServers;

    /**
     * LLM model override for this call. If omitted, the assistant's configured model is used.
     */
    #[Optional]
    public ?string $model;

    /**
     * Assistant name override for this call.
     */
    #[Optional]
    public ?string $name;

    /**
     * Observability configuration for the assistant session, including Langfuse integration for tracing and monitoring.
     *
     * @var array<string,mixed>|null $observabilitySettings
     */
    #[Optional('observability_settings', map: 'mixed')]
    public ?array $observabilitySettings;

    /**
     * @deprecated This field is deprecated and will be removed soon
     *
     * Deprecated — use `llm_api_key_ref` instead. Integration secret identifier for the OpenAI API key. This field is maintained for backward compatibility; `llm_api_key_ref` is the canonical field name and supports all LLM providers.
     */
    #[Optional('openai_api_key_ref')]
    public ?string $openaiAPIKeyRef;

    /**
     * Inline tool definitions available to the assistant (webhook, retrieval, transfer, hangup, etc.). Overrides the assistant's stored tools if provided.
     *
     * @var list<ToolVariants>|null $tools
     */
    #[Optional(list: Tool::class)]
    public ?array $tools;

    /**
     * `new CallAssistantRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CallAssistantRequest::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CallAssistantRequest)->withID(...)
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
     * @param array<string,DynamicVariableShape>|null $dynamicVariables
     * @param array<string,mixed>|null $externalLlm
     * @param array<string,mixed>|null $fallbackConfig
     * @param list<array<string,mixed>>|null $mcpServers
     * @param array<string,mixed>|null $observabilitySettings
     * @param list<ToolShape>|null $tools
     */
    public static function with(
        string $id,
        ?array $dynamicVariables = null,
        ?array $externalLlm = null,
        ?array $fallbackConfig = null,
        ?string $greeting = null,
        ?string $instructions = null,
        ?string $llmAPIKeyRef = null,
        ?array $mcpServers = null,
        ?string $model = null,
        ?string $name = null,
        ?array $observabilitySettings = null,
        ?string $openaiAPIKeyRef = null,
        ?array $tools = null,
    ): self {
        $self = new self;

        $self['id'] = $id;

        null !== $dynamicVariables && $self['dynamicVariables'] = $dynamicVariables;
        null !== $externalLlm && $self['externalLlm'] = $externalLlm;
        null !== $fallbackConfig && $self['fallbackConfig'] = $fallbackConfig;
        null !== $greeting && $self['greeting'] = $greeting;
        null !== $instructions && $self['instructions'] = $instructions;
        null !== $llmAPIKeyRef && $self['llmAPIKeyRef'] = $llmAPIKeyRef;
        null !== $mcpServers && $self['mcpServers'] = $mcpServers;
        null !== $model && $self['model'] = $model;
        null !== $name && $self['name'] = $name;
        null !== $observabilitySettings && $self['observabilitySettings'] = $observabilitySettings;
        null !== $openaiAPIKeyRef && $self['openaiAPIKeyRef'] = $openaiAPIKeyRef;
        null !== $tools && $self['tools'] = $tools;

        return $self;
    }

    /**
     * The identifier of the AI assistant to use.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Map of dynamic variables and their default values. Dynamic variables can be referenced in instructions, greeting, and tool definitions using the `{{variable_name}}` syntax. Call-control-agent automatically merges in `telnyx_call_*` variables (telnyx_call_to, telnyx_call_from, telnyx_conversation_channel, telnyx_agent_target, telnyx_end_user_target, telnyx_call_caller_id_name) and custom header variables.
     *
     * @param array<string,DynamicVariableShape> $dynamicVariables
     */
    public function withDynamicVariables(array $dynamicVariables): self
    {
        $self = clone $this;
        $self['dynamicVariables'] = $dynamicVariables;

        return $self;
    }

    /**
     * External LLM configuration for bringing your own LLM endpoint.
     *
     * @param array<string,mixed> $externalLlm
     */
    public function withExternalLlm(array $externalLlm): self
    {
        $self = clone $this;
        $self['externalLlm'] = $externalLlm;

        return $self;
    }

    /**
     * Fallback LLM configuration used when the primary LLM provider is unavailable.
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
     * Initial greeting text spoken when the assistant starts. Can be plain text for any voice or SSML for `AWS.Polly.<voice_id>` voices. There is a 3,000 character limit.
     */
    public function withGreeting(string $greeting): self
    {
        $self = clone $this;
        $self['greeting'] = $greeting;

        return $self;
    }

    /**
     * System instructions for the voice assistant. Can be templated with [dynamic variables](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables). This will overwrite the instructions set in the assistant configuration.
     */
    public function withInstructions(string $instructions): self
    {
        $self = clone $this;
        $self['instructions'] = $instructions;

        return $self;
    }

    /**
     * Integration secret identifier for the LLM provider API key. Use this field to reference an [integration secret](https://developers.telnyx.com/api/secrets-manager/integration-secrets/create-integration-secret) containing your LLM provider API key. Supports any LLM provider (OpenAI, Anthropic, etc.).
     */
    public function withLlmAPIKeyRef(string $llmAPIKeyRef): self
    {
        $self = clone $this;
        $self['llmAPIKeyRef'] = $llmAPIKeyRef;

        return $self;
    }

    /**
     * MCP (Model Context Protocol) server configurations for extending the assistant's capabilities with external tools and data sources.
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
     * LLM model override for this call. If omitted, the assistant's configured model is used.
     */
    public function withModel(string $model): self
    {
        $self = clone $this;
        $self['model'] = $model;

        return $self;
    }

    /**
     * Assistant name override for this call.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Observability configuration for the assistant session, including Langfuse integration for tracing and monitoring.
     *
     * @param array<string,mixed> $observabilitySettings
     */
    public function withObservabilitySettings(
        array $observabilitySettings
    ): self {
        $self = clone $this;
        $self['observabilitySettings'] = $observabilitySettings;

        return $self;
    }

    /**
     * Deprecated — use `llm_api_key_ref` instead. Integration secret identifier for the OpenAI API key. This field is maintained for backward compatibility; `llm_api_key_ref` is the canonical field name and supports all LLM providers.
     */
    public function withOpenAIAPIKeyRef(string $openaiAPIKeyRef): self
    {
        $self = clone $this;
        $self['openaiAPIKeyRef'] = $openaiAPIKeyRef;

        return $self;
    }

    /**
     * Inline tool definitions available to the assistant (webhook, retrieval, transfer, hangup, etc.). Overrides the assistant's stored tools if provided.
     *
     * @param list<ToolShape> $tools
     */
    public function withTools(array $tools): self
    {
        $self = clone $this;
        $self['tools'] = $tools;

        return $self;
    }
}
