<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\AI\Assistants\InferenceEmbedding\ExternalLlm;
use Telnyx\AI\Assistants\InferenceEmbedding\FallbackConfig;
use Telnyx\AI\Assistants\InferenceEmbedding\Integration;
use Telnyx\AI\Assistants\InferenceEmbedding\InterruptionSettings;
use Telnyx\AI\Assistants\InferenceEmbedding\McpServer;
use Telnyx\AI\Assistants\InferenceEmbedding\PostConversationSettings;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type AssistantToolVariants from \Telnyx\AI\Assistants\AssistantTool
 * @phpstan-import-type ExternalLlmShape from \Telnyx\AI\Assistants\InferenceEmbedding\ExternalLlm
 * @phpstan-import-type FallbackConfigShape from \Telnyx\AI\Assistants\InferenceEmbedding\FallbackConfig
 * @phpstan-import-type ImportMetadataShape from \Telnyx\AI\Assistants\ImportMetadata
 * @phpstan-import-type InsightSettingsShape from \Telnyx\AI\Assistants\InsightSettings
 * @phpstan-import-type IntegrationShape from \Telnyx\AI\Assistants\InferenceEmbedding\Integration
 * @phpstan-import-type InterruptionSettingsShape from \Telnyx\AI\Assistants\InferenceEmbedding\InterruptionSettings
 * @phpstan-import-type McpServerShape from \Telnyx\AI\Assistants\InferenceEmbedding\McpServer
 * @phpstan-import-type MessagingSettingsShape from \Telnyx\AI\Assistants\MessagingSettings
 * @phpstan-import-type ObservabilityShape from \Telnyx\AI\Assistants\Observability
 * @phpstan-import-type PostConversationSettingsShape from \Telnyx\AI\Assistants\InferenceEmbedding\PostConversationSettings
 * @phpstan-import-type PrivacySettingsShape from \Telnyx\AI\Assistants\PrivacySettings
 * @phpstan-import-type TelephonySettingsShape from \Telnyx\AI\Assistants\TelephonySettings
 * @phpstan-import-type AssistantToolShape from \Telnyx\AI\Assistants\AssistantTool
 * @phpstan-import-type TranscriptionSettingsShape from \Telnyx\AI\Assistants\TranscriptionSettings
 * @phpstan-import-type VoiceSettingsShape from \Telnyx\AI\Assistants\VoiceSettings
 * @phpstan-import-type WidgetSettingsShape from \Telnyx\AI\Assistants\WidgetSettings
 *
 * @phpstan-type InferenceEmbeddingShape = array{
 *   id: string,
 *   createdAt: \DateTimeInterface,
 *   instructions: string,
 *   model: string,
 *   name: string,
 *   description?: string|null,
 *   dynamicVariables?: array<string,mixed>|null,
 *   dynamicVariablesWebhookTimeoutMs?: int|null,
 *   dynamicVariablesWebhookURL?: string|null,
 *   enabledFeatures?: list<EnabledFeatures|value-of<EnabledFeatures>>|null,
 *   externalLlm?: null|ExternalLlm|ExternalLlmShape,
 *   fallbackConfig?: null|FallbackConfig|FallbackConfigShape,
 *   greeting?: string|null,
 *   importMetadata?: null|ImportMetadata|ImportMetadataShape,
 *   insightSettings?: null|InsightSettings|InsightSettingsShape,
 *   integrations?: list<Integration|IntegrationShape>|null,
 *   interruptionSettings?: null|InterruptionSettings|InterruptionSettingsShape,
 *   llmAPIKeyRef?: string|null,
 *   mcpServers?: list<McpServer|McpServerShape>|null,
 *   messagingSettings?: null|MessagingSettings|MessagingSettingsShape,
 *   observabilitySettings?: null|Observability|ObservabilityShape,
 *   postConversationSettings?: null|PostConversationSettings|PostConversationSettingsShape,
 *   privacySettings?: null|PrivacySettings|PrivacySettingsShape,
 *   relatedMissionIDs?: list<string>|null,
 *   tags?: list<string>|null,
 *   telephonySettings?: null|TelephonySettings|TelephonySettingsShape,
 *   tools?: list<AssistantToolShape>|null,
 *   transcription?: null|TranscriptionSettings|TranscriptionSettingsShape,
 *   versionCreatedAt?: \DateTimeInterface|null,
 *   versionID?: string|null,
 *   versionName?: string|null,
 *   voiceSettings?: null|VoiceSettings|VoiceSettingsShape,
 *   widgetSettings?: null|WidgetSettings|WidgetSettingsShape,
 * }
 */
final class InferenceEmbedding implements BaseModel
{
    /** @use SdkModel<InferenceEmbeddingShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required('created_at')]
    public \DateTimeInterface $createdAt;

    /**
     * System instructions for the assistant. These may be templated with [dynamic variables](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables).
     */
    #[Required]
    public string $instructions;

    /**
     * ID of the model to use when `external_llm` is not set. You can use the [Get models API](https://developers.telnyx.com/api-reference/chat/get-available-models) to see available models. If `external_llm` is provided, the assistant uses `external_llm` instead of this field. If neither `model` nor `external_llm` is provided, Telnyx applies the default model.
     */
    #[Required]
    public string $model;

    #[Required]
    public string $name;

    #[Optional]
    public ?string $description;

    /**
     * Map of dynamic variables and their values.
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

    #[Optional('import_metadata')]
    public ?ImportMetadata $importMetadata;

    #[Optional('insight_settings')]
    public ?InsightSettings $insightSettings;

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

    #[Optional('observability_settings')]
    public ?Observability $observabilitySettings;

    /**
     * Configuration for post-conversation processing. When enabled, the assistant receives one additional LLM turn after the conversation ends, allowing it to execute tool calls such as logging to a CRM or sending a summary. The assistant can execute multiple parallel or sequential tools during this phase. Telephony-control tools (e.g. hangup, transfer) are unavailable post-conversation. Beta feature.
     */
    #[Optional('post_conversation_settings')]
    public ?PostConversationSettings $postConversationSettings;

    #[Optional('privacy_settings')]
    public ?PrivacySettings $privacySettings;

    /**
     * IDs of missions related to this assistant.
     *
     * @var list<string>|null $relatedMissionIDs
     */
    #[Optional('related_mission_ids', list: 'string')]
    public ?array $relatedMissionIDs;

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
     * Deprecated for new integrations. Inline tool definitions available to the assistant. Prefer `tool_ids` to attach shared tools created with the AI Tools endpoints.
     *
     * @var list<AssistantToolVariants>|null $tools
     */
    #[Optional(list: AssistantTool::class)]
    public ?array $tools;

    #[Optional]
    public ?TranscriptionSettings $transcription;

    /**
     * Timestamp when this assistant version was created.
     */
    #[Optional('version_created_at')]
    public ?\DateTimeInterface $versionCreatedAt;

    /**
     * Identifier for the assistant version returned by version-aware assistant endpoints.
     */
    #[Optional('version_id')]
    public ?string $versionID;

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

    /**
     * `new InferenceEmbedding()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * InferenceEmbedding::with(
     *   id: ..., createdAt: ..., instructions: ..., model: ..., name: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new InferenceEmbedding)
     *   ->withID(...)
     *   ->withCreatedAt(...)
     *   ->withInstructions(...)
     *   ->withModel(...)
     *   ->withName(...)
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
     * @param array<string,mixed>|null $dynamicVariables
     * @param list<EnabledFeatures|value-of<EnabledFeatures>>|null $enabledFeatures
     * @param ExternalLlm|ExternalLlmShape|null $externalLlm
     * @param FallbackConfig|FallbackConfigShape|null $fallbackConfig
     * @param ImportMetadata|ImportMetadataShape|null $importMetadata
     * @param InsightSettings|InsightSettingsShape|null $insightSettings
     * @param list<Integration|IntegrationShape>|null $integrations
     * @param InterruptionSettings|InterruptionSettingsShape|null $interruptionSettings
     * @param list<McpServer|McpServerShape>|null $mcpServers
     * @param MessagingSettings|MessagingSettingsShape|null $messagingSettings
     * @param Observability|ObservabilityShape|null $observabilitySettings
     * @param PostConversationSettings|PostConversationSettingsShape|null $postConversationSettings
     * @param PrivacySettings|PrivacySettingsShape|null $privacySettings
     * @param list<string>|null $relatedMissionIDs
     * @param list<string>|null $tags
     * @param TelephonySettings|TelephonySettingsShape|null $telephonySettings
     * @param list<AssistantToolShape>|null $tools
     * @param TranscriptionSettings|TranscriptionSettingsShape|null $transcription
     * @param VoiceSettings|VoiceSettingsShape|null $voiceSettings
     * @param WidgetSettings|WidgetSettingsShape|null $widgetSettings
     */
    public static function with(
        string $id,
        \DateTimeInterface $createdAt,
        string $instructions,
        string $model,
        string $name,
        ?string $description = null,
        ?array $dynamicVariables = null,
        ?int $dynamicVariablesWebhookTimeoutMs = null,
        ?string $dynamicVariablesWebhookURL = null,
        ?array $enabledFeatures = null,
        ExternalLlm|array|null $externalLlm = null,
        FallbackConfig|array|null $fallbackConfig = null,
        ?string $greeting = null,
        ImportMetadata|array|null $importMetadata = null,
        InsightSettings|array|null $insightSettings = null,
        ?array $integrations = null,
        InterruptionSettings|array|null $interruptionSettings = null,
        ?string $llmAPIKeyRef = null,
        ?array $mcpServers = null,
        MessagingSettings|array|null $messagingSettings = null,
        Observability|array|null $observabilitySettings = null,
        PostConversationSettings|array|null $postConversationSettings = null,
        PrivacySettings|array|null $privacySettings = null,
        ?array $relatedMissionIDs = null,
        ?array $tags = null,
        TelephonySettings|array|null $telephonySettings = null,
        ?array $tools = null,
        TranscriptionSettings|array|null $transcription = null,
        ?\DateTimeInterface $versionCreatedAt = null,
        ?string $versionID = null,
        ?string $versionName = null,
        VoiceSettings|array|null $voiceSettings = null,
        WidgetSettings|array|null $widgetSettings = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['createdAt'] = $createdAt;
        $self['instructions'] = $instructions;
        $self['model'] = $model;
        $self['name'] = $name;

        null !== $description && $self['description'] = $description;
        null !== $dynamicVariables && $self['dynamicVariables'] = $dynamicVariables;
        null !== $dynamicVariablesWebhookTimeoutMs && $self['dynamicVariablesWebhookTimeoutMs'] = $dynamicVariablesWebhookTimeoutMs;
        null !== $dynamicVariablesWebhookURL && $self['dynamicVariablesWebhookURL'] = $dynamicVariablesWebhookURL;
        null !== $enabledFeatures && $self['enabledFeatures'] = $enabledFeatures;
        null !== $externalLlm && $self['externalLlm'] = $externalLlm;
        null !== $fallbackConfig && $self['fallbackConfig'] = $fallbackConfig;
        null !== $greeting && $self['greeting'] = $greeting;
        null !== $importMetadata && $self['importMetadata'] = $importMetadata;
        null !== $insightSettings && $self['insightSettings'] = $insightSettings;
        null !== $integrations && $self['integrations'] = $integrations;
        null !== $interruptionSettings && $self['interruptionSettings'] = $interruptionSettings;
        null !== $llmAPIKeyRef && $self['llmAPIKeyRef'] = $llmAPIKeyRef;
        null !== $mcpServers && $self['mcpServers'] = $mcpServers;
        null !== $messagingSettings && $self['messagingSettings'] = $messagingSettings;
        null !== $observabilitySettings && $self['observabilitySettings'] = $observabilitySettings;
        null !== $postConversationSettings && $self['postConversationSettings'] = $postConversationSettings;
        null !== $privacySettings && $self['privacySettings'] = $privacySettings;
        null !== $relatedMissionIDs && $self['relatedMissionIDs'] = $relatedMissionIDs;
        null !== $tags && $self['tags'] = $tags;
        null !== $telephonySettings && $self['telephonySettings'] = $telephonySettings;
        null !== $tools && $self['tools'] = $tools;
        null !== $transcription && $self['transcription'] = $transcription;
        null !== $versionCreatedAt && $self['versionCreatedAt'] = $versionCreatedAt;
        null !== $versionID && $self['versionID'] = $versionID;
        null !== $versionName && $self['versionName'] = $versionName;
        null !== $voiceSettings && $self['voiceSettings'] = $voiceSettings;
        null !== $widgetSettings && $self['widgetSettings'] = $widgetSettings;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

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
     * ID of the model to use when `external_llm` is not set. You can use the [Get models API](https://developers.telnyx.com/api-reference/chat/get-available-models) to see available models. If `external_llm` is provided, the assistant uses `external_llm` instead of this field. If neither `model` nor `external_llm` is provided, Telnyx applies the default model.
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

    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    /**
     * Map of dynamic variables and their values.
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
     * @param ImportMetadata|ImportMetadataShape $importMetadata
     */
    public function withImportMetadata(
        ImportMetadata|array $importMetadata
    ): self {
        $self = clone $this;
        $self['importMetadata'] = $importMetadata;

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
     * @param Observability|ObservabilityShape $observabilitySettings
     */
    public function withObservabilitySettings(
        Observability|array $observabilitySettings
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
     * IDs of missions related to this assistant.
     *
     * @param list<string> $relatedMissionIDs
     */
    public function withRelatedMissionIDs(array $relatedMissionIDs): self
    {
        $self = clone $this;
        $self['relatedMissionIDs'] = $relatedMissionIDs;

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
     * Timestamp when this assistant version was created.
     */
    public function withVersionCreatedAt(
        \DateTimeInterface $versionCreatedAt
    ): self {
        $self = clone $this;
        $self['versionCreatedAt'] = $versionCreatedAt;

        return $self;
    }

    /**
     * Identifier for the assistant version returned by version-aware assistant endpoints.
     */
    public function withVersionID(string $versionID): self
    {
        $self = clone $this;
        $self['versionID'] = $versionID;

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
