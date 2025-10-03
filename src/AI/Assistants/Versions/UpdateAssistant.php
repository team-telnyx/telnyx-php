<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Versions;

use Telnyx\AI\Assistants\AssistantTool;
use Telnyx\AI\Assistants\AssistantTool\DtmfTool;
use Telnyx\AI\Assistants\AssistantTool\HandoffTool;
use Telnyx\AI\Assistants\AssistantTool\SipReferTool;
use Telnyx\AI\Assistants\EnabledFeatures;
use Telnyx\AI\Assistants\HangupTool;
use Telnyx\AI\Assistants\InsightSettings;
use Telnyx\AI\Assistants\MessagingSettings;
use Telnyx\AI\Assistants\PrivacySettings;
use Telnyx\AI\Assistants\RetrievalTool;
use Telnyx\AI\Assistants\TelephonySettings;
use Telnyx\AI\Assistants\TranscriptionSettings;
use Telnyx\AI\Assistants\TransferTool;
use Telnyx\AI\Assistants\VoiceSettings;
use Telnyx\AI\Assistants\WebhookTool;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type update_assistant = array{
 *   description?: string,
 *   dynamicVariables?: array<string, mixed>,
 *   dynamicVariablesWebhookURL?: string,
 *   enabledFeatures?: list<value-of<EnabledFeatures>>,
 *   greeting?: string,
 *   insightSettings?: InsightSettings,
 *   instructions?: string,
 *   llmAPIKeyRef?: string,
 *   messagingSettings?: MessagingSettings,
 *   model?: string,
 *   name?: string,
 *   privacySettings?: PrivacySettings,
 *   telephonySettings?: TelephonySettings,
 *   tools?: list<WebhookTool|RetrievalTool|HandoffTool|HangupTool|TransferTool|SipReferTool|DtmfTool>,
 *   transcription?: TranscriptionSettings,
 *   voiceSettings?: VoiceSettings,
 * }
 */
final class UpdateAssistant implements BaseModel
{
    /** @use SdkModel<update_assistant> */
    use SdkModel;

    #[Api(optional: true)]
    public ?string $description;

    /**
     * Map of dynamic variables and their default values.
     *
     * @var array<string, mixed>|null $dynamicVariables
     */
    #[Api('dynamic_variables', map: 'mixed', optional: true)]
    public ?array $dynamicVariables;

    /**
     * If the dynamic_variables_webhook_url is set for the assistant, we will send a request at the start of the conversation. See our [guide](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables) for more information.
     */
    #[Api('dynamic_variables_webhook_url', optional: true)]
    public ?string $dynamicVariablesWebhookURL;

    /** @var list<value-of<EnabledFeatures>>|null $enabledFeatures */
    #[Api('enabled_features', list: EnabledFeatures::class, optional: true)]
    public ?array $enabledFeatures;

    /**
     * Text that the assistant will use to start the conversation. This may be templated with [dynamic variables](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables).
     */
    #[Api(optional: true)]
    public ?string $greeting;

    #[Api('insight_settings', optional: true)]
    public ?InsightSettings $insightSettings;

    /**
     * System instructions for the assistant. These may be templated with [dynamic variables](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables).
     */
    #[Api(optional: true)]
    public ?string $instructions;

    /**
     * This is only needed when using third-party inference providers. The `identifier` for an integration secret [/v2/integration_secrets](https://developers.telnyx.com/api/secrets-manager/integration-secrets/create-integration-secret) that refers to your LLM provider's API key. Warning: Free plans are unlikely to work with this integration.
     */
    #[Api('llm_api_key_ref', optional: true)]
    public ?string $llmAPIKeyRef;

    #[Api('messaging_settings', optional: true)]
    public ?MessagingSettings $messagingSettings;

    /**
     * ID of the model to use. You can use the [Get models API](https://developers.telnyx.com/api/inference/inference-embedding/get-models-public-models-get) to see all of your available models,.
     */
    #[Api(optional: true)]
    public ?string $model;

    #[Api(optional: true)]
    public ?string $name;

    #[Api('privacy_settings', optional: true)]
    public ?PrivacySettings $privacySettings;

    #[Api('telephony_settings', optional: true)]
    public ?TelephonySettings $telephonySettings;

    /**
     * The tools that the assistant can use. These may be templated with [dynamic variables](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables).
     *
     * @var list<WebhookTool|RetrievalTool|HandoffTool|HangupTool|TransferTool|SipReferTool|DtmfTool>|null $tools
     */
    #[Api(list: AssistantTool::class, optional: true)]
    public ?array $tools;

    #[Api(optional: true)]
    public ?TranscriptionSettings $transcription;

    #[Api('voice_settings', optional: true)]
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
     * @param array<string, mixed> $dynamicVariables
     * @param list<EnabledFeatures|value-of<EnabledFeatures>> $enabledFeatures
     * @param list<WebhookTool|RetrievalTool|HandoffTool|HangupTool|TransferTool|SipReferTool|DtmfTool> $tools
     */
    public static function with(
        ?string $description = null,
        ?array $dynamicVariables = null,
        ?string $dynamicVariablesWebhookURL = null,
        ?array $enabledFeatures = null,
        ?string $greeting = null,
        ?InsightSettings $insightSettings = null,
        ?string $instructions = null,
        ?string $llmAPIKeyRef = null,
        ?MessagingSettings $messagingSettings = null,
        ?string $model = null,
        ?string $name = null,
        ?PrivacySettings $privacySettings = null,
        ?TelephonySettings $telephonySettings = null,
        ?array $tools = null,
        ?TranscriptionSettings $transcription = null,
        ?VoiceSettings $voiceSettings = null,
    ): self {
        $obj = new self;

        null !== $description && $obj->description = $description;
        null !== $dynamicVariables && $obj->dynamicVariables = $dynamicVariables;
        null !== $dynamicVariablesWebhookURL && $obj->dynamicVariablesWebhookURL = $dynamicVariablesWebhookURL;
        null !== $enabledFeatures && $obj['enabledFeatures'] = $enabledFeatures;
        null !== $greeting && $obj->greeting = $greeting;
        null !== $insightSettings && $obj->insightSettings = $insightSettings;
        null !== $instructions && $obj->instructions = $instructions;
        null !== $llmAPIKeyRef && $obj->llmAPIKeyRef = $llmAPIKeyRef;
        null !== $messagingSettings && $obj->messagingSettings = $messagingSettings;
        null !== $model && $obj->model = $model;
        null !== $name && $obj->name = $name;
        null !== $privacySettings && $obj->privacySettings = $privacySettings;
        null !== $telephonySettings && $obj->telephonySettings = $telephonySettings;
        null !== $tools && $obj->tools = $tools;
        null !== $transcription && $obj->transcription = $transcription;
        null !== $voiceSettings && $obj->voiceSettings = $voiceSettings;

        return $obj;
    }

    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj->description = $description;

        return $obj;
    }

    /**
     * Map of dynamic variables and their default values.
     *
     * @param array<string, mixed> $dynamicVariables
     */
    public function withDynamicVariables(array $dynamicVariables): self
    {
        $obj = clone $this;
        $obj->dynamicVariables = $dynamicVariables;

        return $obj;
    }

    /**
     * If the dynamic_variables_webhook_url is set for the assistant, we will send a request at the start of the conversation. See our [guide](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables) for more information.
     */
    public function withDynamicVariablesWebhookURL(
        string $dynamicVariablesWebhookURL
    ): self {
        $obj = clone $this;
        $obj->dynamicVariablesWebhookURL = $dynamicVariablesWebhookURL;

        return $obj;
    }

    /**
     * @param list<EnabledFeatures|value-of<EnabledFeatures>> $enabledFeatures
     */
    public function withEnabledFeatures(array $enabledFeatures): self
    {
        $obj = clone $this;
        $obj['enabledFeatures'] = $enabledFeatures;

        return $obj;
    }

    /**
     * Text that the assistant will use to start the conversation. This may be templated with [dynamic variables](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables).
     */
    public function withGreeting(string $greeting): self
    {
        $obj = clone $this;
        $obj->greeting = $greeting;

        return $obj;
    }

    public function withInsightSettings(InsightSettings $insightSettings): self
    {
        $obj = clone $this;
        $obj->insightSettings = $insightSettings;

        return $obj;
    }

    /**
     * System instructions for the assistant. These may be templated with [dynamic variables](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables).
     */
    public function withInstructions(string $instructions): self
    {
        $obj = clone $this;
        $obj->instructions = $instructions;

        return $obj;
    }

    /**
     * This is only needed when using third-party inference providers. The `identifier` for an integration secret [/v2/integration_secrets](https://developers.telnyx.com/api/secrets-manager/integration-secrets/create-integration-secret) that refers to your LLM provider's API key. Warning: Free plans are unlikely to work with this integration.
     */
    public function withLlmAPIKeyRef(string $llmAPIKeyRef): self
    {
        $obj = clone $this;
        $obj->llmAPIKeyRef = $llmAPIKeyRef;

        return $obj;
    }

    public function withMessagingSettings(
        MessagingSettings $messagingSettings
    ): self {
        $obj = clone $this;
        $obj->messagingSettings = $messagingSettings;

        return $obj;
    }

    /**
     * ID of the model to use. You can use the [Get models API](https://developers.telnyx.com/api/inference/inference-embedding/get-models-public-models-get) to see all of your available models,.
     */
    public function withModel(string $model): self
    {
        $obj = clone $this;
        $obj->model = $model;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    public function withPrivacySettings(PrivacySettings $privacySettings): self
    {
        $obj = clone $this;
        $obj->privacySettings = $privacySettings;

        return $obj;
    }

    public function withTelephonySettings(
        TelephonySettings $telephonySettings
    ): self {
        $obj = clone $this;
        $obj->telephonySettings = $telephonySettings;

        return $obj;
    }

    /**
     * The tools that the assistant can use. These may be templated with [dynamic variables](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables).
     *
     * @param list<WebhookTool|RetrievalTool|HandoffTool|HangupTool|TransferTool|SipReferTool|DtmfTool> $tools
     */
    public function withTools(array $tools): self
    {
        $obj = clone $this;
        $obj->tools = $tools;

        return $obj;
    }

    public function withTranscription(
        TranscriptionSettings $transcription
    ): self {
        $obj = clone $this;
        $obj->transcription = $transcription;

        return $obj;
    }

    public function withVoiceSettings(VoiceSettings $voiceSettings): self
    {
        $obj = clone $this;
        $obj->voiceSettings = $voiceSettings;

        return $obj;
    }
}
