<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Create a new AI Assistant.
 *
 * @see Telnyx\Services\AI\AssistantsService::create()
 *
 * @phpstan-import-type AssistantToolVariants from \Telnyx\AI\Assistants\AssistantTool
 * @phpstan-import-type ExternalLlmReqShape from \Telnyx\AI\Assistants\ExternalLlmReq
 * @phpstan-import-type FallbackConfigReqShape from \Telnyx\AI\Assistants\FallbackConfigReq
 * @phpstan-import-type InsightSettingsShape from \Telnyx\AI\Assistants\InsightSettings
 * @phpstan-import-type MessagingSettingsShape from \Telnyx\AI\Assistants\MessagingSettings
 * @phpstan-import-type ObservabilityReqShape from \Telnyx\AI\Assistants\ObservabilityReq
 * @phpstan-import-type PostConversationSettingsReqShape from \Telnyx\AI\Assistants\PostConversationSettingsReq
 * @phpstan-import-type PrivacySettingsShape from \Telnyx\AI\Assistants\PrivacySettings
 * @phpstan-import-type TelephonySettingsShape from \Telnyx\AI\Assistants\TelephonySettings
 * @phpstan-import-type AssistantToolShape from \Telnyx\AI\Assistants\AssistantTool
 * @phpstan-import-type TranscriptionSettingsShape from \Telnyx\AI\Assistants\TranscriptionSettings
 * @phpstan-import-type VoiceSettingsShape from \Telnyx\AI\Assistants\VoiceSettings
 * @phpstan-import-type WidgetSettingsShape from \Telnyx\AI\Assistants\WidgetSettings
 *
 * @phpstan-type AssistantCreateParamsShape = array{
 *   instructions: string,
 *   model: string,
 *   name: string,
 *   description?: string|null,
 *   dynamicVariables?: array<string,mixed>|null,
 *   dynamicVariablesWebhookURL?: string|null,
 *   enabledFeatures?: list<EnabledFeatures|value-of<EnabledFeatures>>|null,
 *   externalLlm?: null|ExternalLlmReq|ExternalLlmReqShape,
 *   fallbackConfig?: null|FallbackConfigReq|FallbackConfigReqShape,
 *   greeting?: string|null,
 *   insightSettings?: null|InsightSettings|InsightSettingsShape,
 *   llmAPIKeyRef?: string|null,
 *   messagingSettings?: null|MessagingSettings|MessagingSettingsShape,
 *   observabilitySettings?: null|ObservabilityReq|ObservabilityReqShape,
 *   postConversationSettings?: null|PostConversationSettingsReq|PostConversationSettingsReqShape,
 *   privacySettings?: null|PrivacySettings|PrivacySettingsShape,
 *   telephonySettings?: null|TelephonySettings|TelephonySettingsShape,
 *   toolIDs?: list<string>|null,
 *   tools?: list<AssistantToolShape>|null,
 *   transcription?: null|TranscriptionSettings|TranscriptionSettingsShape,
 *   voiceSettings?: null|VoiceSettings|VoiceSettingsShape,
 *   widgetSettings?: null|WidgetSettings|WidgetSettingsShape,
 * }
 */
final class AssistantCreateParams implements BaseModel
{
    /** @use SdkModel<AssistantCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * System instructions for the assistant. These may be templated with [dynamic variables](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables).
     */
    #[Required]
    public string $instructions;

    /**
     * ID of the model to use. You can use the [Get models API](https://developers.telnyx.com/api-reference/chat/get-available-models) to see all of your available models,.
     */
    #[Required]
    public string $model;

    #[Required]
    public string $name;

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
     * If the dynamic_variables_webhook_url is set for the assistant, we will send a request at the start of the conversation. See our [guide](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables) for more information.
     */
    #[Optional('dynamic_variables_webhook_url')]
    public ?string $dynamicVariablesWebhookURL;

    /** @var list<value-of<EnabledFeatures>>|null $enabledFeatures */
    #[Optional('enabled_features', list: EnabledFeatures::class)]
    public ?array $enabledFeatures;

    #[Optional('external_llm')]
    public ?ExternalLlmReq $externalLlm;

    #[Optional('fallback_config')]
    public ?FallbackConfigReq $fallbackConfig;

    /**
     * Text that the assistant will use to start the conversation. This may be templated with [dynamic variables](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables). Use an empty string to have the assistant wait for the user to speak first. Use the special value `<assistant-speaks-first-with-model-generated-message>` to have the assistant generate the greeting based on the system instructions.
     */
    #[Optional]
    public ?string $greeting;

    #[Optional('insight_settings')]
    public ?InsightSettings $insightSettings;

    /**
     * This is only needed when using third-party inference providers. The `identifier` for an integration secret [/v2/integration_secrets](https://developers.telnyx.com/api-reference/integration-secrets/create-a-secret) that refers to your LLM provider's API key. Warning: Free plans are unlikely to work with this integration.
     */
    #[Optional('llm_api_key_ref')]
    public ?string $llmAPIKeyRef;

    #[Optional('messaging_settings')]
    public ?MessagingSettings $messagingSettings;

    #[Optional('observability_settings')]
    public ?ObservabilityReq $observabilitySettings;

    /**
     * Configuration for post-conversation processing. When enabled, the assistant receives one additional LLM turn after the conversation ends, allowing it to execute tool calls such as logging to a CRM or sending a summary. The assistant can execute multiple parallel or sequential tools during this phase. Telephony-control tools (e.g. hangup, transfer) are unavailable post-conversation. Beta feature.
     */
    #[Optional('post_conversation_settings')]
    public ?PostConversationSettingsReq $postConversationSettings;

    #[Optional('privacy_settings')]
    public ?PrivacySettings $privacySettings;

    #[Optional('telephony_settings')]
    public ?TelephonySettings $telephonySettings;

    /** @var list<string>|null $toolIDs */
    #[Optional('tool_ids', list: 'string')]
    public ?array $toolIDs;

    /**
     * The tools that the assistant can use. These may be templated with [dynamic variables](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables).
     *
     * @var list<AssistantToolVariants>|null $tools
     */
    #[Optional(list: AssistantTool::class)]
    public ?array $tools;

    #[Optional]
    public ?TranscriptionSettings $transcription;

    #[Optional('voice_settings')]
    public ?VoiceSettings $voiceSettings;

    /**
     * Configuration settings for the assistant's web widget.
     */
    #[Optional('widget_settings')]
    public ?WidgetSettings $widgetSettings;

    /**
     * `new AssistantCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AssistantCreateParams::with(instructions: ..., model: ..., name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AssistantCreateParams)
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
     * @param ExternalLlmReq|ExternalLlmReqShape|null $externalLlm
     * @param FallbackConfigReq|FallbackConfigReqShape|null $fallbackConfig
     * @param InsightSettings|InsightSettingsShape|null $insightSettings
     * @param MessagingSettings|MessagingSettingsShape|null $messagingSettings
     * @param ObservabilityReq|ObservabilityReqShape|null $observabilitySettings
     * @param PostConversationSettingsReq|PostConversationSettingsReqShape|null $postConversationSettings
     * @param PrivacySettings|PrivacySettingsShape|null $privacySettings
     * @param TelephonySettings|TelephonySettingsShape|null $telephonySettings
     * @param list<string>|null $toolIDs
     * @param list<AssistantToolShape>|null $tools
     * @param TranscriptionSettings|TranscriptionSettingsShape|null $transcription
     * @param VoiceSettings|VoiceSettingsShape|null $voiceSettings
     * @param WidgetSettings|WidgetSettingsShape|null $widgetSettings
     */
    public static function with(
        string $instructions,
        string $model,
        string $name,
        ?string $description = null,
        ?array $dynamicVariables = null,
        ?string $dynamicVariablesWebhookURL = null,
        ?array $enabledFeatures = null,
        ExternalLlmReq|array|null $externalLlm = null,
        FallbackConfigReq|array|null $fallbackConfig = null,
        ?string $greeting = null,
        InsightSettings|array|null $insightSettings = null,
        ?string $llmAPIKeyRef = null,
        MessagingSettings|array|null $messagingSettings = null,
        ObservabilityReq|array|null $observabilitySettings = null,
        PostConversationSettingsReq|array|null $postConversationSettings = null,
        PrivacySettings|array|null $privacySettings = null,
        TelephonySettings|array|null $telephonySettings = null,
        ?array $toolIDs = null,
        ?array $tools = null,
        TranscriptionSettings|array|null $transcription = null,
        VoiceSettings|array|null $voiceSettings = null,
        WidgetSettings|array|null $widgetSettings = null,
    ): self {
        $self = new self;

        $self['instructions'] = $instructions;
        $self['model'] = $model;
        $self['name'] = $name;

        null !== $description && $self['description'] = $description;
        null !== $dynamicVariables && $self['dynamicVariables'] = $dynamicVariables;
        null !== $dynamicVariablesWebhookURL && $self['dynamicVariablesWebhookURL'] = $dynamicVariablesWebhookURL;
        null !== $enabledFeatures && $self['enabledFeatures'] = $enabledFeatures;
        null !== $externalLlm && $self['externalLlm'] = $externalLlm;
        null !== $fallbackConfig && $self['fallbackConfig'] = $fallbackConfig;
        null !== $greeting && $self['greeting'] = $greeting;
        null !== $insightSettings && $self['insightSettings'] = $insightSettings;
        null !== $llmAPIKeyRef && $self['llmAPIKeyRef'] = $llmAPIKeyRef;
        null !== $messagingSettings && $self['messagingSettings'] = $messagingSettings;
        null !== $observabilitySettings && $self['observabilitySettings'] = $observabilitySettings;
        null !== $postConversationSettings && $self['postConversationSettings'] = $postConversationSettings;
        null !== $privacySettings && $self['privacySettings'] = $privacySettings;
        null !== $telephonySettings && $self['telephonySettings'] = $telephonySettings;
        null !== $toolIDs && $self['toolIDs'] = $toolIDs;
        null !== $tools && $self['tools'] = $tools;
        null !== $transcription && $self['transcription'] = $transcription;
        null !== $voiceSettings && $self['voiceSettings'] = $voiceSettings;
        null !== $widgetSettings && $self['widgetSettings'] = $widgetSettings;

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
     * ID of the model to use. You can use the [Get models API](https://developers.telnyx.com/api-reference/chat/get-available-models) to see all of your available models,.
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
     * If the dynamic_variables_webhook_url is set for the assistant, we will send a request at the start of the conversation. See our [guide](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables) for more information.
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
     * @param ExternalLlmReq|ExternalLlmReqShape $externalLlm
     */
    public function withExternalLlm(ExternalLlmReq|array $externalLlm): self
    {
        $self = clone $this;
        $self['externalLlm'] = $externalLlm;

        return $self;
    }

    /**
     * @param FallbackConfigReq|FallbackConfigReqShape $fallbackConfig
     */
    public function withFallbackConfig(
        FallbackConfigReq|array $fallbackConfig
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
     * This is only needed when using third-party inference providers. The `identifier` for an integration secret [/v2/integration_secrets](https://developers.telnyx.com/api-reference/integration-secrets/create-a-secret) that refers to your LLM provider's API key. Warning: Free plans are unlikely to work with this integration.
     */
    public function withLlmAPIKeyRef(string $llmAPIKeyRef): self
    {
        $self = clone $this;
        $self['llmAPIKeyRef'] = $llmAPIKeyRef;

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
     * @param PostConversationSettingsReq|PostConversationSettingsReqShape $postConversationSettings
     */
    public function withPostConversationSettings(
        PostConversationSettingsReq|array $postConversationSettings
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
     * @param list<string> $toolIDs
     */
    public function withToolIDs(array $toolIDs): self
    {
        $self = clone $this;
        $self['toolIDs'] = $toolIDs;

        return $self;
    }

    /**
     * The tools that the assistant can use. These may be templated with [dynamic variables](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables).
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
