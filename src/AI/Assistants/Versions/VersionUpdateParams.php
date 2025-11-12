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
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Updates the configuration of a specific assistant version. Can not update main version.
 *
 * @see Telnyx\STAINLESS_FIXME_AI\STAINLESS_FIXME_Assistants\VersionsService::update()
 *
 * @phpstan-type VersionUpdateParamsShape = array{
 *   assistant_id: string,
 *   description?: string,
 *   dynamic_variables?: array<string,mixed>,
 *   dynamic_variables_webhook_url?: string,
 *   enabled_features?: list<EnabledFeatures|value-of<EnabledFeatures>>,
 *   greeting?: string,
 *   insight_settings?: InsightSettings,
 *   instructions?: string,
 *   llm_api_key_ref?: string,
 *   messaging_settings?: MessagingSettings,
 *   model?: string,
 *   name?: string,
 *   privacy_settings?: PrivacySettings,
 *   telephony_settings?: TelephonySettings,
 *   tools?: list<WebhookTool|RetrievalTool|HandoffTool|HangupTool|TransferTool|SipReferTool|DtmfTool>,
 *   transcription?: TranscriptionSettings,
 *   voice_settings?: VoiceSettings,
 * }
 */
final class VersionUpdateParams implements BaseModel
{
    /** @use SdkModel<VersionUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $assistant_id;

    #[Api(optional: true)]
    public ?string $description;

    /**
     * Map of dynamic variables and their default values.
     *
     * @var array<string,mixed>|null $dynamic_variables
     */
    #[Api(map: 'mixed', optional: true)]
    public ?array $dynamic_variables;

    /**
     * If the dynamic_variables_webhook_url is set for the assistant, we will send a request at the start of the conversation. See our [guide](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables) for more information.
     */
    #[Api(optional: true)]
    public ?string $dynamic_variables_webhook_url;

    /** @var list<value-of<EnabledFeatures>>|null $enabled_features */
    #[Api(list: EnabledFeatures::class, optional: true)]
    public ?array $enabled_features;

    /**
     * Text that the assistant will use to start the conversation. This may be templated with [dynamic variables](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables).
     */
    #[Api(optional: true)]
    public ?string $greeting;

    #[Api(optional: true)]
    public ?InsightSettings $insight_settings;

    /**
     * System instructions for the assistant. These may be templated with [dynamic variables](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables).
     */
    #[Api(optional: true)]
    public ?string $instructions;

    /**
     * This is only needed when using third-party inference providers. The `identifier` for an integration secret [/v2/integration_secrets](https://developers.telnyx.com/api/secrets-manager/integration-secrets/create-integration-secret) that refers to your LLM provider's API key. Warning: Free plans are unlikely to work with this integration.
     */
    #[Api(optional: true)]
    public ?string $llm_api_key_ref;

    #[Api(optional: true)]
    public ?MessagingSettings $messaging_settings;

    /**
     * ID of the model to use. You can use the [Get models API](https://developers.telnyx.com/api/inference/inference-embedding/get-models-public-models-get) to see all of your available models,.
     */
    #[Api(optional: true)]
    public ?string $model;

    #[Api(optional: true)]
    public ?string $name;

    #[Api(optional: true)]
    public ?PrivacySettings $privacy_settings;

    #[Api(optional: true)]
    public ?TelephonySettings $telephony_settings;

    /**
     * The tools that the assistant can use. These may be templated with [dynamic variables](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables).
     *
     * @var list<WebhookTool|RetrievalTool|HandoffTool|HangupTool|TransferTool|SipReferTool|DtmfTool>|null $tools
     */
    #[Api(list: AssistantTool::class, optional: true)]
    public ?array $tools;

    #[Api(optional: true)]
    public ?TranscriptionSettings $transcription;

    #[Api(optional: true)]
    public ?VoiceSettings $voice_settings;

    /**
     * `new VersionUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VersionUpdateParams::with(assistant_id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VersionUpdateParams)->withAssistantID(...)
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
     * @param array<string,mixed> $dynamic_variables
     * @param list<EnabledFeatures|value-of<EnabledFeatures>> $enabled_features
     * @param list<WebhookTool|RetrievalTool|HandoffTool|HangupTool|TransferTool|SipReferTool|DtmfTool> $tools
     */
    public static function with(
        string $assistant_id,
        ?string $description = null,
        ?array $dynamic_variables = null,
        ?string $dynamic_variables_webhook_url = null,
        ?array $enabled_features = null,
        ?string $greeting = null,
        ?InsightSettings $insight_settings = null,
        ?string $instructions = null,
        ?string $llm_api_key_ref = null,
        ?MessagingSettings $messaging_settings = null,
        ?string $model = null,
        ?string $name = null,
        ?PrivacySettings $privacy_settings = null,
        ?TelephonySettings $telephony_settings = null,
        ?array $tools = null,
        ?TranscriptionSettings $transcription = null,
        ?VoiceSettings $voice_settings = null,
    ): self {
        $obj = new self;

        $obj->assistant_id = $assistant_id;

        null !== $description && $obj->description = $description;
        null !== $dynamic_variables && $obj->dynamic_variables = $dynamic_variables;
        null !== $dynamic_variables_webhook_url && $obj->dynamic_variables_webhook_url = $dynamic_variables_webhook_url;
        null !== $enabled_features && $obj['enabled_features'] = $enabled_features;
        null !== $greeting && $obj->greeting = $greeting;
        null !== $insight_settings && $obj->insight_settings = $insight_settings;
        null !== $instructions && $obj->instructions = $instructions;
        null !== $llm_api_key_ref && $obj->llm_api_key_ref = $llm_api_key_ref;
        null !== $messaging_settings && $obj->messaging_settings = $messaging_settings;
        null !== $model && $obj->model = $model;
        null !== $name && $obj->name = $name;
        null !== $privacy_settings && $obj->privacy_settings = $privacy_settings;
        null !== $telephony_settings && $obj->telephony_settings = $telephony_settings;
        null !== $tools && $obj->tools = $tools;
        null !== $transcription && $obj->transcription = $transcription;
        null !== $voice_settings && $obj->voice_settings = $voice_settings;

        return $obj;
    }

    public function withAssistantID(string $assistantID): self
    {
        $obj = clone $this;
        $obj->assistant_id = $assistantID;

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
     * @param array<string,mixed> $dynamicVariables
     */
    public function withDynamicVariables(array $dynamicVariables): self
    {
        $obj = clone $this;
        $obj->dynamic_variables = $dynamicVariables;

        return $obj;
    }

    /**
     * If the dynamic_variables_webhook_url is set for the assistant, we will send a request at the start of the conversation. See our [guide](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables) for more information.
     */
    public function withDynamicVariablesWebhookURL(
        string $dynamicVariablesWebhookURL
    ): self {
        $obj = clone $this;
        $obj->dynamic_variables_webhook_url = $dynamicVariablesWebhookURL;

        return $obj;
    }

    /**
     * @param list<EnabledFeatures|value-of<EnabledFeatures>> $enabledFeatures
     */
    public function withEnabledFeatures(array $enabledFeatures): self
    {
        $obj = clone $this;
        $obj['enabled_features'] = $enabledFeatures;

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
        $obj->insight_settings = $insightSettings;

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
        $obj->llm_api_key_ref = $llmAPIKeyRef;

        return $obj;
    }

    public function withMessagingSettings(
        MessagingSettings $messagingSettings
    ): self {
        $obj = clone $this;
        $obj->messaging_settings = $messagingSettings;

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
        $obj->privacy_settings = $privacySettings;

        return $obj;
    }

    public function withTelephonySettings(
        TelephonySettings $telephonySettings
    ): self {
        $obj = clone $this;
        $obj->telephony_settings = $telephonySettings;

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
        $obj->voice_settings = $voiceSettings;

        return $obj;
    }
}
