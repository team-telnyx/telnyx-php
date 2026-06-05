<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\AI\Assistants\AssistantUpdateParams\ConversationFlow;
use Telnyx\AI\Assistants\AssistantUpdateParams\ExternalLlm;
use Telnyx\AI\Assistants\AssistantUpdateParams\FallbackConfig;
use Telnyx\AI\Assistants\AssistantUpdateParams\Integration;
use Telnyx\AI\Assistants\AssistantUpdateParams\InterruptionSettings;
use Telnyx\AI\Assistants\AssistantUpdateParams\McpServer;
use Telnyx\AI\Assistants\AssistantUpdateParams\PostConversationSettings;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Update an AI Assistant's attributes.
 *
 * @see Telnyx\Services\AI\AssistantsService::update()
 *
 * @phpstan-import-type AssistantToolVariants from \Telnyx\AI\Assistants\AssistantTool
 * @phpstan-import-type ConversationFlowShape from \Telnyx\AI\Assistants\AssistantUpdateParams\ConversationFlow
 * @phpstan-import-type ExternalLlmShape from \Telnyx\AI\Assistants\AssistantUpdateParams\ExternalLlm
 * @phpstan-import-type FallbackConfigShape from \Telnyx\AI\Assistants\AssistantUpdateParams\FallbackConfig
 * @phpstan-import-type InsightSettingsShape from \Telnyx\AI\Assistants\InsightSettings
 * @phpstan-import-type IntegrationShape from \Telnyx\AI\Assistants\AssistantUpdateParams\Integration
 * @phpstan-import-type InterruptionSettingsShape from \Telnyx\AI\Assistants\AssistantUpdateParams\InterruptionSettings
 * @phpstan-import-type McpServerShape from \Telnyx\AI\Assistants\AssistantUpdateParams\McpServer
 * @phpstan-import-type MessagingSettingsShape from \Telnyx\AI\Assistants\MessagingSettings
 * @phpstan-import-type ObservabilityReqShape from \Telnyx\AI\Assistants\ObservabilityReq
 * @phpstan-import-type PostConversationSettingsShape from \Telnyx\AI\Assistants\AssistantUpdateParams\PostConversationSettings
 * @phpstan-import-type PrivacySettingsShape from \Telnyx\AI\Assistants\PrivacySettings
 * @phpstan-import-type TelephonySettingsShape from \Telnyx\AI\Assistants\TelephonySettings
 * @phpstan-import-type AssistantToolShape from \Telnyx\AI\Assistants\AssistantTool
 * @phpstan-import-type TranscriptionSettingsShape from \Telnyx\AI\Assistants\TranscriptionSettings
 * @phpstan-import-type VoiceSettingsShape from \Telnyx\AI\Assistants\VoiceSettings
 * @phpstan-import-type WidgetSettingsShape from \Telnyx\AI\Assistants\WidgetSettings
 *
 * @phpstan-type AssistantUpdateParamsShape = array{
 *   conversationFlow?: null|ConversationFlow|ConversationFlowShape,
 *   description?: string|null,
 *   dynamicVariables?: array<string,mixed>|null,
 *   dynamicVariablesWebhookTimeoutMs?: int|null,
 *   dynamicVariablesWebhookURL?: string|null,
 *   enabledFeatures?: list<EnabledFeatures|value-of<EnabledFeatures>>|null,
 *   externalLlm?: null|ExternalLlm|ExternalLlmShape,
 *   fallbackConfig?: null|FallbackConfig|FallbackConfigShape,
 *   greeting?: string|null,
 *   insightSettings?: null|InsightSettings|InsightSettingsShape,
 *   instructions?: string|null,
 *   integrations?: list<Integration|IntegrationShape>|null,
 *   interruptionSettings?: null|InterruptionSettings|InterruptionSettingsShape,
 *   llmAPIKeyRef?: string|null,
 *   mcpServers?: list<McpServer|McpServerShape>|null,
 *   messagingSettings?: null|MessagingSettings|MessagingSettingsShape,
 *   model?: string|null,
 *   name?: string|null,
 *   observabilitySettings?: null|ObservabilityReq|ObservabilityReqShape,
 *   postConversationSettings?: null|PostConversationSettings|PostConversationSettingsShape,
 *   privacySettings?: null|PrivacySettings|PrivacySettingsShape,
 *   promoteToMain?: bool|null,
 *   tags?: list<string>|null,
 *   telephonySettings?: null|TelephonySettings|TelephonySettingsShape,
 *   toolIDs?: list<string>|null,
 *   tools?: list<AssistantToolShape>|null,
 *   transcription?: null|TranscriptionSettings|TranscriptionSettingsShape,
 *   versionName?: string|null,
 *   voiceSettings?: null|VoiceSettings|VoiceSettingsShape,
 *   widgetSettings?: null|WidgetSettings|WidgetSettingsShape,
 * }
 */
final class AssistantUpdateParams implements BaseModel
{
    /** @use SdkModel<AssistantUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Conversation flow as supplied by API clients (create / update).
     *
     * A directed graph of `FlowNodeReq` connected by `FlowEdge`s. Validation
     * enforces unique node/edge IDs, that `start_node_id` references a real
     * node, and that every edge's endpoints reference real nodes.
     */
    #[Optional('conversation_flow')]
    public ?ConversationFlow $conversationFlow;

    #[Optional]
    public ?string $description;

    /**
     * Map of dynamic variables and their default values.
     *
     * @var array<string,mixed>|null $dynamicVariables
     */
    #[Optional('dynamic_variables', map: 'mixed')]
    public ?array $dynamicVariables;

    /**
     * Timeout in milliseconds for the dynamic variables webhook. Must be between 1 and 10000 ms. If the webhook does not respond within this timeout, the call proceeds with default values. See the [dynamic variables guide](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables).
     */
    #[Optional('dynamic_variables_webhook_timeout_ms')]
    public ?int $dynamicVariablesWebhookTimeoutMs;

    /**
     * If `dynamic_variables_webhook_url` is set, Telnyx sends a POST request to this URL at the start of the conversation to resolve dynamic variables. **Gotcha:** the webhook response must wrap variables under a top-level `dynamic_variables` object, e.g. `{"dynamic_variables": {"customer_name": "Jane"}}`. Returning a flat object will be ignored and variables will fall back to their defaults. See the [dynamic variables guide](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables) for the full request/response format and timeout behavior.
     */
    #[Optional('dynamic_variables_webhook_url')]
    public ?string $dynamicVariablesWebhookURL;

    /** @var list<value-of<EnabledFeatures>>|null $enabledFeatures */
    #[Optional('enabled_features', list: EnabledFeatures::class)]
    public ?array $enabledFeatures;

    #[Optional('external_llm')]
    public ?ExternalLlm $externalLlm;

    #[Optional('fallback_config')]
    public ?FallbackConfig $fallbackConfig;

    /**
     * Text that the assistant will use to start the conversation. This may be templated with [dynamic variables](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables). Use an empty string to have the assistant wait for the user to speak first. Use the special value `<assistant-speaks-first-with-model-generated-message>` to have the assistant generate the greeting based on the system instructions.
     */
    #[Optional]
    public ?string $greeting;

    #[Optional('insight_settings')]
    public ?InsightSettings $insightSettings;

    /**
     * System instructions for the assistant. These may be templated with [dynamic variables](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables).
     */
    #[Optional]
    public ?string $instructions;

    /**
     * Connected integrations attached to the assistant. The catalog of available integrations is at `/ai/integrations`; the user's connected integrations are at `/ai/integrations/connections`. Each item references a catalog integration by `integration_id`.
     *
     * @var list<Integration>|null $integrations
     */
    #[Optional(list: Integration::class)]
    public ?array $integrations;

    /**
     * Settings for interruptions and how the assistant decides the user has finished speaking. These timings are most relevant when using non turn-taking transcription models. For turn-taking models like `deepgram/flux`, end-of-turn behavior is controlled by the transcription end-of-turn settings under `transcription.settings` (`eot_threshold`, `eot_timeout_ms`, `eager_eot_threshold`).
     */
    #[Optional('interruption_settings')]
    public ?InterruptionSettings $interruptionSettings;

    /**
     * This is only needed when using third-party inference providers selected by `model`. The `identifier` for an integration secret [/v2/integration_secrets](https://developers.telnyx.com/api-reference/integration-secrets/create-a-secret) that refers to your LLM provider's API key. For bring-your-own endpoint authentication, use `external_llm.llm_api_key_ref` instead. Warning: Free plans are unlikely to work with this integration.
     */
    #[Optional('llm_api_key_ref')]
    public ?string $llmAPIKeyRef;

    /**
     * MCP servers attached to the assistant. Create MCP servers with `/ai/mcp_servers`, then reference them by `id` here.
     *
     * @var list<McpServer>|null $mcpServers
     */
    #[Optional('mcp_servers', list: McpServer::class)]
    public ?array $mcpServers;

    #[Optional('messaging_settings')]
    public ?MessagingSettings $messagingSettings;

    /**
     * ID of the model to use when `external_llm` is not set. You can use the [Get models API](https://developers.telnyx.com/api-reference/openai-chat/get-available-models-openai-compatible) to see available models. If `external_llm` is provided, the assistant uses `external_llm` instead of this field. If neither `model` nor `external_llm` is provided, Telnyx applies the default model.
     */
    #[Optional]
    public ?string $model;

    #[Optional]
    public ?string $name;

    #[Optional('observability_settings')]
    public ?ObservabilityReq $observabilitySettings;

    /**
     * Configuration for post-conversation processing. When enabled, the assistant receives one additional LLM turn after the conversation ends, allowing it to execute tool calls such as logging to a CRM or sending a summary. The assistant can execute multiple parallel or sequential tools during this phase. Telephony-control tools (e.g. hangup, transfer) are unavailable post-conversation. Beta feature.
     */
    #[Optional('post_conversation_settings')]
    public ?PostConversationSettings $postConversationSettings;

    #[Optional('privacy_settings')]
    public ?PrivacySettings $privacySettings;

    /**
     * Indicates whether the assistant should be promoted to the main version. Defaults to true.
     */
    #[Optional('promote_to_main')]
    public ?bool $promoteToMain;

    /**
     * Tags associated with the assistant. Tags can also be managed with the assistant tag endpoints.
     *
     * @var list<string>|null $tags
     */
    #[Optional(list: 'string')]
    public ?array $tags;

    #[Optional('telephony_settings')]
    public ?TelephonySettings $telephonySettings;

    /**
     * IDs of shared tools to attach to the assistant. New integrations should prefer `tool_ids` over inline `tools`.
     *
     * @var list<string>|null $toolIDs
     */
    #[Optional('tool_ids', list: 'string')]
    public ?array $toolIDs;

    /**
     * Deprecated for new integrations. Inline tool definitions available to the assistant. Prefer `tool_ids` to attach shared tools created with the AI Tools endpoints.
     *
     * @var list<AssistantToolVariants>|null $tools
     */
    #[Optional(list: AssistantTool::class)]
    public ?array $tools;

    #[Optional]
    public ?TranscriptionSettings $transcription;

    /**
     * Human-readable name for the assistant version.
     */
    #[Optional('version_name')]
    public ?string $versionName;

    #[Optional('voice_settings')]
    public ?VoiceSettings $voiceSettings;

    /**
     * Configuration settings for the assistant's web widget.
     */
    #[Optional('widget_settings')]
    public ?WidgetSettings $widgetSettings;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ConversationFlow|ConversationFlowShape|null $conversationFlow
     * @param array<string,mixed>|null $dynamicVariables
     * @param list<EnabledFeatures|value-of<EnabledFeatures>>|null $enabledFeatures
     * @param ExternalLlm|ExternalLlmShape|null $externalLlm
     * @param FallbackConfig|FallbackConfigShape|null $fallbackConfig
     * @param InsightSettings|InsightSettingsShape|null $insightSettings
     * @param list<Integration|IntegrationShape>|null $integrations
     * @param InterruptionSettings|InterruptionSettingsShape|null $interruptionSettings
     * @param list<McpServer|McpServerShape>|null $mcpServers
     * @param MessagingSettings|MessagingSettingsShape|null $messagingSettings
     * @param ObservabilityReq|ObservabilityReqShape|null $observabilitySettings
     * @param PostConversationSettings|PostConversationSettingsShape|null $postConversationSettings
     * @param PrivacySettings|PrivacySettingsShape|null $privacySettings
     * @param list<string>|null $tags
     * @param TelephonySettings|TelephonySettingsShape|null $telephonySettings
     * @param list<string>|null $toolIDs
     * @param list<AssistantToolShape>|null $tools
     * @param TranscriptionSettings|TranscriptionSettingsShape|null $transcription
     * @param VoiceSettings|VoiceSettingsShape|null $voiceSettings
     * @param WidgetSettings|WidgetSettingsShape|null $widgetSettings
     */
    public static function with(
        ConversationFlow|array|null $conversationFlow = null,
        ?string $description = null,
        ?array $dynamicVariables = null,
        ?int $dynamicVariablesWebhookTimeoutMs = null,
        ?string $dynamicVariablesWebhookURL = null,
        ?array $enabledFeatures = null,
        ExternalLlm|array|null $externalLlm = null,
        FallbackConfig|array|null $fallbackConfig = null,
        ?string $greeting = null,
        InsightSettings|array|null $insightSettings = null,
        ?string $instructions = null,
        ?array $integrations = null,
        InterruptionSettings|array|null $interruptionSettings = null,
        ?string $llmAPIKeyRef = null,
        ?array $mcpServers = null,
        MessagingSettings|array|null $messagingSettings = null,
        ?string $model = null,
        ?string $name = null,
        ObservabilityReq|array|null $observabilitySettings = null,
        PostConversationSettings|array|null $postConversationSettings = null,
        PrivacySettings|array|null $privacySettings = null,
        ?bool $promoteToMain = null,
        ?array $tags = null,
        TelephonySettings|array|null $telephonySettings = null,
        ?array $toolIDs = null,
        ?array $tools = null,
        TranscriptionSettings|array|null $transcription = null,
        ?string $versionName = null,
        VoiceSettings|array|null $voiceSettings = null,
        WidgetSettings|array|null $widgetSettings = null,
    ): self {
        $self = new self;

        null !== $conversationFlow && $self['conversationFlow'] = $conversationFlow;
        null !== $description && $self['description'] = $description;
        null !== $dynamicVariables && $self['dynamicVariables'] = $dynamicVariables;
        null !== $dynamicVariablesWebhookTimeoutMs && $self['dynamicVariablesWebhookTimeoutMs'] = $dynamicVariablesWebhookTimeoutMs;
        null !== $dynamicVariablesWebhookURL && $self['dynamicVariablesWebhookURL'] = $dynamicVariablesWebhookURL;
        null !== $enabledFeatures && $self['enabledFeatures'] = $enabledFeatures;
        null !== $externalLlm && $self['externalLlm'] = $externalLlm;
        null !== $fallbackConfig && $self['fallbackConfig'] = $fallbackConfig;
        null !== $greeting && $self['greeting'] = $greeting;
        null !== $insightSettings && $self['insightSettings'] = $insightSettings;
        null !== $instructions && $self['instructions'] = $instructions;
        null !== $integrations && $self['integrations'] = $integrations;
        null !== $interruptionSettings && $self['interruptionSettings'] = $interruptionSettings;
        null !== $llmAPIKeyRef && $self['llmAPIKeyRef'] = $llmAPIKeyRef;
        null !== $mcpServers && $self['mcpServers'] = $mcpServers;
        null !== $messagingSettings && $self['messagingSettings'] = $messagingSettings;
        null !== $model && $self['model'] = $model;
        null !== $name && $self['name'] = $name;
        null !== $observabilitySettings && $self['observabilitySettings'] = $observabilitySettings;
        null !== $postConversationSettings && $self['postConversationSettings'] = $postConversationSettings;
        null !== $privacySettings && $self['privacySettings'] = $privacySettings;
        null !== $promoteToMain && $self['promoteToMain'] = $promoteToMain;
        null !== $tags && $self['tags'] = $tags;
        null !== $telephonySettings && $self['telephonySettings'] = $telephonySettings;
        null !== $toolIDs && $self['toolIDs'] = $toolIDs;
        null !== $tools && $self['tools'] = $tools;
        null !== $transcription && $self['transcription'] = $transcription;
        null !== $versionName && $self['versionName'] = $versionName;
        null !== $voiceSettings && $self['voiceSettings'] = $voiceSettings;
        null !== $widgetSettings && $self['widgetSettings'] = $widgetSettings;

        return $self;
    }

    /**
     * Conversation flow as supplied by API clients (create / update).
     *
     * A directed graph of `FlowNodeReq` connected by `FlowEdge`s. Validation
     * enforces unique node/edge IDs, that `start_node_id` references a real
     * node, and that every edge's endpoints reference real nodes.
     *
     * @param ConversationFlow|ConversationFlowShape $conversationFlow
     */
    public function withConversationFlow(
        ConversationFlow|array $conversationFlow
    ): self {
        $self = clone $this;
        $self['conversationFlow'] = $conversationFlow;

        return $self;
    }

    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    /**
     * Map of dynamic variables and their default values.
     *
     * @param array<string,mixed> $dynamicVariables
     */
    public function withDynamicVariables(array $dynamicVariables): self
    {
        $self = clone $this;
        $self['dynamicVariables'] = $dynamicVariables;

        return $self;
    }

    /**
     * Timeout in milliseconds for the dynamic variables webhook. Must be between 1 and 10000 ms. If the webhook does not respond within this timeout, the call proceeds with default values. See the [dynamic variables guide](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables).
     */
    public function withDynamicVariablesWebhookTimeoutMs(
        int $dynamicVariablesWebhookTimeoutMs
    ): self {
        $self = clone $this;
        $self['dynamicVariablesWebhookTimeoutMs'] = $dynamicVariablesWebhookTimeoutMs;

        return $self;
    }

    /**
     * If `dynamic_variables_webhook_url` is set, Telnyx sends a POST request to this URL at the start of the conversation to resolve dynamic variables. **Gotcha:** the webhook response must wrap variables under a top-level `dynamic_variables` object, e.g. `{"dynamic_variables": {"customer_name": "Jane"}}`. Returning a flat object will be ignored and variables will fall back to their defaults. See the [dynamic variables guide](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables) for the full request/response format and timeout behavior.
     */
    public function withDynamicVariablesWebhookURL(
        string $dynamicVariablesWebhookURL
    ): self {
        $self = clone $this;
        $self['dynamicVariablesWebhookURL'] = $dynamicVariablesWebhookURL;

        return $self;
    }

    /**
     * @param list<EnabledFeatures|value-of<EnabledFeatures>> $enabledFeatures
     */
    public function withEnabledFeatures(array $enabledFeatures): self
    {
        $self = clone $this;
        $self['enabledFeatures'] = $enabledFeatures;

        return $self;
    }

    /**
     * @param ExternalLlm|ExternalLlmShape $externalLlm
     */
    public function withExternalLlm(ExternalLlm|array $externalLlm): self
    {
        $self = clone $this;
        $self['externalLlm'] = $externalLlm;

        return $self;
    }

    /**
     * @param FallbackConfig|FallbackConfigShape $fallbackConfig
     */
    public function withFallbackConfig(
        FallbackConfig|array $fallbackConfig
    ): self {
        $self = clone $this;
        $self['fallbackConfig'] = $fallbackConfig;

        return $self;
    }

    /**
     * Text that the assistant will use to start the conversation. This may be templated with [dynamic variables](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables). Use an empty string to have the assistant wait for the user to speak first. Use the special value `<assistant-speaks-first-with-model-generated-message>` to have the assistant generate the greeting based on the system instructions.
     */
    public function withGreeting(string $greeting): self
    {
        $self = clone $this;
        $self['greeting'] = $greeting;

        return $self;
    }

    /**
     * @param InsightSettings|InsightSettingsShape $insightSettings
     */
    public function withInsightSettings(
        InsightSettings|array $insightSettings
    ): self {
        $self = clone $this;
        $self['insightSettings'] = $insightSettings;

        return $self;
    }

    /**
     * System instructions for the assistant. These may be templated with [dynamic variables](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables).
     */
    public function withInstructions(string $instructions): self
    {
        $self = clone $this;
        $self['instructions'] = $instructions;

        return $self;
    }

    /**
     * Connected integrations attached to the assistant. The catalog of available integrations is at `/ai/integrations`; the user's connected integrations are at `/ai/integrations/connections`. Each item references a catalog integration by `integration_id`.
     *
     * @param list<Integration|IntegrationShape> $integrations
     */
    public function withIntegrations(array $integrations): self
    {
        $self = clone $this;
        $self['integrations'] = $integrations;

        return $self;
    }

    /**
     * Settings for interruptions and how the assistant decides the user has finished speaking. These timings are most relevant when using non turn-taking transcription models. For turn-taking models like `deepgram/flux`, end-of-turn behavior is controlled by the transcription end-of-turn settings under `transcription.settings` (`eot_threshold`, `eot_timeout_ms`, `eager_eot_threshold`).
     *
     * @param InterruptionSettings|InterruptionSettingsShape $interruptionSettings
     */
    public function withInterruptionSettings(
        InterruptionSettings|array $interruptionSettings
    ): self {
        $self = clone $this;
        $self['interruptionSettings'] = $interruptionSettings;

        return $self;
    }

    /**
     * This is only needed when using third-party inference providers selected by `model`. The `identifier` for an integration secret [/v2/integration_secrets](https://developers.telnyx.com/api-reference/integration-secrets/create-a-secret) that refers to your LLM provider's API key. For bring-your-own endpoint authentication, use `external_llm.llm_api_key_ref` instead. Warning: Free plans are unlikely to work with this integration.
     */
    public function withLlmAPIKeyRef(string $llmAPIKeyRef): self
    {
        $self = clone $this;
        $self['llmAPIKeyRef'] = $llmAPIKeyRef;

        return $self;
    }

    /**
     * MCP servers attached to the assistant. Create MCP servers with `/ai/mcp_servers`, then reference them by `id` here.
     *
     * @param list<McpServer|McpServerShape> $mcpServers
     */
    public function withMcpServers(array $mcpServers): self
    {
        $self = clone $this;
        $self['mcpServers'] = $mcpServers;

        return $self;
    }

    /**
     * @param MessagingSettings|MessagingSettingsShape $messagingSettings
     */
    public function withMessagingSettings(
        MessagingSettings|array $messagingSettings
    ): self {
        $self = clone $this;
        $self['messagingSettings'] = $messagingSettings;

        return $self;
    }

    /**
     * ID of the model to use when `external_llm` is not set. You can use the [Get models API](https://developers.telnyx.com/api-reference/openai-chat/get-available-models-openai-compatible) to see available models. If `external_llm` is provided, the assistant uses `external_llm` instead of this field. If neither `model` nor `external_llm` is provided, Telnyx applies the default model.
     */
    public function withModel(string $model): self
    {
        $self = clone $this;
        $self['model'] = $model;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * @param ObservabilityReq|ObservabilityReqShape $observabilitySettings
     */
    public function withObservabilitySettings(
        ObservabilityReq|array $observabilitySettings
    ): self {
        $self = clone $this;
        $self['observabilitySettings'] = $observabilitySettings;

        return $self;
    }

    /**
     * Configuration for post-conversation processing. When enabled, the assistant receives one additional LLM turn after the conversation ends, allowing it to execute tool calls such as logging to a CRM or sending a summary. The assistant can execute multiple parallel or sequential tools during this phase. Telephony-control tools (e.g. hangup, transfer) are unavailable post-conversation. Beta feature.
     *
     * @param PostConversationSettings|PostConversationSettingsShape $postConversationSettings
     */
    public function withPostConversationSettings(
        PostConversationSettings|array $postConversationSettings
    ): self {
        $self = clone $this;
        $self['postConversationSettings'] = $postConversationSettings;

        return $self;
    }

    /**
     * @param PrivacySettings|PrivacySettingsShape $privacySettings
     */
    public function withPrivacySettings(
        PrivacySettings|array $privacySettings
    ): self {
        $self = clone $this;
        $self['privacySettings'] = $privacySettings;

        return $self;
    }

    /**
     * Indicates whether the assistant should be promoted to the main version. Defaults to true.
     */
    public function withPromoteToMain(bool $promoteToMain): self
    {
        $self = clone $this;
        $self['promoteToMain'] = $promoteToMain;

        return $self;
    }

    /**
     * Tags associated with the assistant. Tags can also be managed with the assistant tag endpoints.
     *
     * @param list<string> $tags
     */
    public function withTags(array $tags): self
    {
        $self = clone $this;
        $self['tags'] = $tags;

        return $self;
    }

    /**
     * @param TelephonySettings|TelephonySettingsShape $telephonySettings
     */
    public function withTelephonySettings(
        TelephonySettings|array $telephonySettings
    ): self {
        $self = clone $this;
        $self['telephonySettings'] = $telephonySettings;

        return $self;
    }

    /**
     * IDs of shared tools to attach to the assistant. New integrations should prefer `tool_ids` over inline `tools`.
     *
     * @param list<string> $toolIDs
     */
    public function withToolIDs(array $toolIDs): self
    {
        $self = clone $this;
        $self['toolIDs'] = $toolIDs;

        return $self;
    }

    /**
     * Deprecated for new integrations. Inline tool definitions available to the assistant. Prefer `tool_ids` to attach shared tools created with the AI Tools endpoints.
     *
     * @param list<AssistantToolShape> $tools
     */
    public function withTools(array $tools): self
    {
        $self = clone $this;
        $self['tools'] = $tools;

        return $self;
    }

    /**
     * @param TranscriptionSettings|TranscriptionSettingsShape $transcription
     */
    public function withTranscription(
        TranscriptionSettings|array $transcription
    ): self {
        $self = clone $this;
        $self['transcription'] = $transcription;

        return $self;
    }

    /**
     * Human-readable name for the assistant version.
     */
    public function withVersionName(string $versionName): self
    {
        $self = clone $this;
        $self['versionName'] = $versionName;

        return $self;
    }

    /**
     * @param VoiceSettings|VoiceSettingsShape $voiceSettings
     */
    public function withVoiceSettings(VoiceSettings|array $voiceSettings): self
    {
        $self = clone $this;
        $self['voiceSettings'] = $voiceSettings;

        return $self;
    }

    /**
     * Configuration settings for the assistant's web widget.
     *
     * @param WidgetSettings|WidgetSettingsShape $widgetSettings
     */
    public function withWidgetSettings(
        WidgetSettings|array $widgetSettings
    ): self {
        $self = clone $this;
        $self['widgetSettings'] = $widgetSettings;

        return $self;
    }
}
