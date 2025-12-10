<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Versions;

use Telnyx\AI\Assistants\AssistantTool;
use Telnyx\AI\Assistants\AssistantTool\Handoff;
use Telnyx\AI\Assistants\AssistantTool\Refer;
use Telnyx\AI\Assistants\AssistantTool\SendDtmf;
use Telnyx\AI\Assistants\EnabledFeatures;
use Telnyx\AI\Assistants\HangupTool;
use Telnyx\AI\Assistants\HangupToolParams;
use Telnyx\AI\Assistants\InferenceEmbeddingBucketIDs;
use Telnyx\AI\Assistants\InferenceEmbeddingTransferToolParams;
use Telnyx\AI\Assistants\InferenceEmbeddingWebhookToolParams;
use Telnyx\AI\Assistants\InsightSettings;
use Telnyx\AI\Assistants\MessagingSettings;
use Telnyx\AI\Assistants\PrivacySettings;
use Telnyx\AI\Assistants\RetrievalTool;
use Telnyx\AI\Assistants\TelephonySettings;
use Telnyx\AI\Assistants\TranscriptionSettings;
use Telnyx\AI\Assistants\TranscriptionSettings\Model;
use Telnyx\AI\Assistants\TranscriptionSettingsConfig;
use Telnyx\AI\Assistants\TransferTool;
use Telnyx\AI\Assistants\VoiceSettings;
use Telnyx\AI\Assistants\VoiceSettings\BackgroundAudio\MediaName;
use Telnyx\AI\Assistants\VoiceSettings\BackgroundAudio\MediaURL;
use Telnyx\AI\Assistants\VoiceSettings\BackgroundAudio\PredefinedMedia;
use Telnyx\AI\Assistants\WebhookTool;
use Telnyx\AI\Assistants\WebhookTool\Type;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type UpdateAssistantShape = array{
 *   description?: string|null,
 *   dynamicVariables?: array<string,mixed>|null,
 *   dynamicVariablesWebhookURL?: string|null,
 *   enabledFeatures?: list<value-of<EnabledFeatures>>|null,
 *   greeting?: string|null,
 *   insightSettings?: InsightSettings|null,
 *   instructions?: string|null,
 *   llmAPIKeyRef?: string|null,
 *   messagingSettings?: MessagingSettings|null,
 *   model?: string|null,
 *   name?: string|null,
 *   privacySettings?: PrivacySettings|null,
 *   telephonySettings?: TelephonySettings|null,
 *   tools?: list<WebhookTool|RetrievalTool|Handoff|HangupTool|TransferTool|Refer|SendDtmf>|null,
 *   transcription?: TranscriptionSettings|null,
 *   voiceSettings?: VoiceSettings|null,
 * }
 */
final class UpdateAssistant implements BaseModel
{
    /** @use SdkModel<UpdateAssistantShape> */
    use SdkModel;

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

    /**
     * Text that the assistant will use to start the conversation. This may be templated with [dynamic variables](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables).
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
     * This is only needed when using third-party inference providers. The `identifier` for an integration secret [/v2/integration_secrets](https://developers.telnyx.com/api/secrets-manager/integration-secrets/create-integration-secret) that refers to your LLM provider's API key. Warning: Free plans are unlikely to work with this integration.
     */
    #[Optional('llm_api_key_ref')]
    public ?string $llmAPIKeyRef;

    #[Optional('messaging_settings')]
    public ?MessagingSettings $messagingSettings;

    /**
     * ID of the model to use. You can use the [Get models API](https://developers.telnyx.com/api/inference/inference-embedding/get-models-public-models-get) to see all of your available models,.
     */
    #[Optional]
    public ?string $model;

    #[Optional]
    public ?string $name;

    #[Optional('privacy_settings')]
    public ?PrivacySettings $privacySettings;

    #[Optional('telephony_settings')]
    public ?TelephonySettings $telephonySettings;

    /**
     * The tools that the assistant can use. These may be templated with [dynamic variables](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables).
     *
     * @var list<WebhookTool|RetrievalTool|Handoff|HangupTool|TransferTool|Refer|SendDtmf>|null $tools
     */
    #[Optional(list: AssistantTool::class)]
    public ?array $tools;

    #[Optional]
    public ?TranscriptionSettings $transcription;

    #[Optional('voice_settings')]
    public ?VoiceSettings $voiceSettings;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param array<string,mixed> $dynamicVariables
     * @param list<EnabledFeatures|value-of<EnabledFeatures>> $enabledFeatures
     * @param InsightSettings|array{insightGroupID?: string|null} $insightSettings
     * @param MessagingSettings|array{
     *   defaultMessagingProfileID?: string|null,
     *   deliveryStatusWebhookURL?: string|null,
     * } $messagingSettings
     * @param PrivacySettings|array{dataRetention?: bool|null} $privacySettings
     * @param TelephonySettings|array{
     *   defaultTexmlAppID?: string|null, supportsUnauthenticatedWebCalls?: bool|null
     * } $telephonySettings
     * @param list<WebhookTool|array{
     *   type: value-of<Type>, webhook: InferenceEmbeddingWebhookToolParams
     * }|RetrievalTool|array{
     *   retrieval: InferenceEmbeddingBucketIDs,
     *   type: value-of<RetrievalTool\Type>,
     * }|Handoff|array{
     *   handoff: Handoff\Handoff, type?: 'handoff'
     * }|HangupTool|array{
     *   hangup: HangupToolParams,
     *   type: value-of<HangupTool\Type>,
     * }|TransferTool|array{
     *   transfer: InferenceEmbeddingTransferToolParams,
     *   type: value-of<TransferTool\Type>,
     * }|Refer|array{
     *   refer: Refer\Refer, type?: 'refer'
     * }|SendDtmf|array{sendDtmf: array<string,mixed>, type?: 'send_dtmf'}> $tools
     * @param TranscriptionSettings|array{
     *   language?: string|null,
     *   model?: value-of<Model>|null,
     *   region?: string|null,
     *   settings?: TranscriptionSettingsConfig|null,
     * } $transcription
     * @param VoiceSettings|array{
     *   voice: string,
     *   apiKeyRef?: string|null,
     *   backgroundAudio?: PredefinedMedia|MediaURL|MediaName|null,
     *   voiceSpeed?: float|null,
     * } $voiceSettings
     */
    public static function with(
        ?string $description = null,
        ?array $dynamicVariables = null,
        ?string $dynamicVariablesWebhookURL = null,
        ?array $enabledFeatures = null,
        ?string $greeting = null,
        InsightSettings|array|null $insightSettings = null,
        ?string $instructions = null,
        ?string $llmAPIKeyRef = null,
        MessagingSettings|array|null $messagingSettings = null,
        ?string $model = null,
        ?string $name = null,
        PrivacySettings|array|null $privacySettings = null,
        TelephonySettings|array|null $telephonySettings = null,
        ?array $tools = null,
        TranscriptionSettings|array|null $transcription = null,
        VoiceSettings|array|null $voiceSettings = null,
    ): self {
        $self = new self;

        null !== $description && $self['description'] = $description;
        null !== $dynamicVariables && $self['dynamicVariables'] = $dynamicVariables;
        null !== $dynamicVariablesWebhookURL && $self['dynamicVariablesWebhookURL'] = $dynamicVariablesWebhookURL;
        null !== $enabledFeatures && $self['enabledFeatures'] = $enabledFeatures;
        null !== $greeting && $self['greeting'] = $greeting;
        null !== $insightSettings && $self['insightSettings'] = $insightSettings;
        null !== $instructions && $self['instructions'] = $instructions;
        null !== $llmAPIKeyRef && $self['llmAPIKeyRef'] = $llmAPIKeyRef;
        null !== $messagingSettings && $self['messagingSettings'] = $messagingSettings;
        null !== $model && $self['model'] = $model;
        null !== $name && $self['name'] = $name;
        null !== $privacySettings && $self['privacySettings'] = $privacySettings;
        null !== $telephonySettings && $self['telephonySettings'] = $telephonySettings;
        null !== $tools && $self['tools'] = $tools;
        null !== $transcription && $self['transcription'] = $transcription;
        null !== $voiceSettings && $self['voiceSettings'] = $voiceSettings;

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
     * Text that the assistant will use to start the conversation. This may be templated with [dynamic variables](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables).
     */
    public function withGreeting(string $greeting): self
    {
        $self = clone $this;
        $self['greeting'] = $greeting;

        return $self;
    }

    /**
     * @param InsightSettings|array{insightGroupID?: string|null} $insightSettings
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
     * This is only needed when using third-party inference providers. The `identifier` for an integration secret [/v2/integration_secrets](https://developers.telnyx.com/api/secrets-manager/integration-secrets/create-integration-secret) that refers to your LLM provider's API key. Warning: Free plans are unlikely to work with this integration.
     */
    public function withLlmAPIKeyRef(string $llmAPIKeyRef): self
    {
        $self = clone $this;
        $self['llmAPIKeyRef'] = $llmAPIKeyRef;

        return $self;
    }

    /**
     * @param MessagingSettings|array{
     *   defaultMessagingProfileID?: string|null,
     *   deliveryStatusWebhookURL?: string|null,
     * } $messagingSettings
     */
    public function withMessagingSettings(
        MessagingSettings|array $messagingSettings
    ): self {
        $self = clone $this;
        $self['messagingSettings'] = $messagingSettings;

        return $self;
    }

    /**
     * ID of the model to use. You can use the [Get models API](https://developers.telnyx.com/api/inference/inference-embedding/get-models-public-models-get) to see all of your available models,.
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
     * @param PrivacySettings|array{dataRetention?: bool|null} $privacySettings
     */
    public function withPrivacySettings(
        PrivacySettings|array $privacySettings
    ): self {
        $self = clone $this;
        $self['privacySettings'] = $privacySettings;

        return $self;
    }

    /**
     * @param TelephonySettings|array{
     *   defaultTexmlAppID?: string|null, supportsUnauthenticatedWebCalls?: bool|null
     * } $telephonySettings
     */
    public function withTelephonySettings(
        TelephonySettings|array $telephonySettings
    ): self {
        $self = clone $this;
        $self['telephonySettings'] = $telephonySettings;

        return $self;
    }

    /**
     * The tools that the assistant can use. These may be templated with [dynamic variables](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables).
     *
     * @param list<WebhookTool|array{
     *   type: value-of<Type>, webhook: InferenceEmbeddingWebhookToolParams
     * }|RetrievalTool|array{
     *   retrieval: InferenceEmbeddingBucketIDs,
     *   type: value-of<RetrievalTool\Type>,
     * }|Handoff|array{
     *   handoff: Handoff\Handoff, type?: 'handoff'
     * }|HangupTool|array{
     *   hangup: HangupToolParams,
     *   type: value-of<HangupTool\Type>,
     * }|TransferTool|array{
     *   transfer: InferenceEmbeddingTransferToolParams,
     *   type: value-of<TransferTool\Type>,
     * }|Refer|array{
     *   refer: Refer\Refer, type?: 'refer'
     * }|SendDtmf|array{sendDtmf: array<string,mixed>, type?: 'send_dtmf'}> $tools
     */
    public function withTools(array $tools): self
    {
        $self = clone $this;
        $self['tools'] = $tools;

        return $self;
    }

    /**
     * @param TranscriptionSettings|array{
     *   language?: string|null,
     *   model?: value-of<Model>|null,
     *   region?: string|null,
     *   settings?: TranscriptionSettingsConfig|null,
     * } $transcription
     */
    public function withTranscription(
        TranscriptionSettings|array $transcription
    ): self {
        $self = clone $this;
        $self['transcription'] = $transcription;

        return $self;
    }

    /**
     * @param VoiceSettings|array{
     *   voice: string,
     *   apiKeyRef?: string|null,
     *   backgroundAudio?: PredefinedMedia|MediaURL|MediaName|null,
     *   voiceSpeed?: float|null,
     * } $voiceSettings
     */
    public function withVoiceSettings(VoiceSettings|array $voiceSettings): self
    {
        $self = clone $this;
        $self['voiceSettings'] = $voiceSettings;

        return $self;
    }
}
