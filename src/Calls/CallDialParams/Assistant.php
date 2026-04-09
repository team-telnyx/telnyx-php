<?php

declare(strict_types=1);

namespace Telnyx\Calls\CallDialParams;

use Telnyx\Calls\CallDialParams\Assistant\DynamicVariable;
use Telnyx\Calls\CallDialParams\Assistant\Tool;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * AI Assistant configuration. All fields except `id` are optional — the assistant's stored configuration will be used as fallback for any omitted fields.
 *
 * @phpstan-import-type DynamicVariableVariants from \Telnyx\Calls\CallDialParams\Assistant\DynamicVariable
 * @phpstan-import-type ToolVariants from \Telnyx\Calls\CallDialParams\Assistant\Tool
 * @phpstan-import-type DynamicVariableShape from \Telnyx\Calls\CallDialParams\Assistant\DynamicVariable
 * @phpstan-import-type ToolShape from \Telnyx\Calls\CallDialParams\Assistant\Tool
 *
 * @phpstan-type AssistantShape = array{
 *   id: string,
 *   dynamicVariables?: array<string,DynamicVariableShape>|null,
 *   externalLlm?: mixed,
 *   fallbackConfig?: mixed,
 *   greeting?: string|null,
 *   instructions?: string|null,
 *   llmAPIKeyRef?: string|null,
 *   mcpServers?: list<mixed>|null,
 *   model?: string|null,
 *   name?: string|null,
 *   observabilitySettings?: mixed,
 *   openaiAPIKeyRef?: string|null,
 *   tools?: list<ToolShape>|null,
 * }
 */
final class Assistant implements BaseModel
{
    /** @use SdkModel<AssistantShape> */
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
     */
    #[Optional('external_llm')]
    public mixed $externalLlm;

    /**
     * Fallback LLM configuration used when the primary LLM provider is unavailable.
     */
    #[Optional('fallback_config')]
    public mixed $fallbackConfig;

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
     * @var list<mixed>|null $mcpServers
     */
    #[Optional('mcp_servers', list: 'mixed')]
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
     */
    #[Optional('observability_settings')]
    public mixed $observabilitySettings;

    /**
     * @deprecated
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
     * `new Assistant()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Assistant::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Assistant)->withID(...)
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
     * @param list<mixed>|null $mcpServers
     * @param list<ToolShape>|null $tools
     */
    public static function with(
        string $id,
        ?array $dynamicVariables = null,
        mixed $externalLlm = null,
        mixed $fallbackConfig = null,
        ?string $greeting = null,
        ?string $instructions = null,
        ?string $llmAPIKeyRef = null,
        ?array $mcpServers = null,
        ?string $model = null,
        ?string $name = null,
        mixed $observabilitySettings = null,
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
     */
    public function withExternalLlm(mixed $externalLlm): self
    {
        $self = clone $this;
        $self['externalLlm'] = $externalLlm;

        return $self;
    }

    /**
     * Fallback LLM configuration used when the primary LLM provider is unavailable.
     */
    public function withFallbackConfig(mixed $fallbackConfig): self
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
     * @param list<mixed> $mcpServers
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
     */
    public function withObservabilitySettings(
        mixed $observabilitySettings
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
