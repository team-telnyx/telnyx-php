<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Versions;

use Telnyx\AI\Assistants\AssistantTool;
use Telnyx\AI\Assistants\AssistantTool\DtmfTool;
use Telnyx\AI\Assistants\AssistantTool\HandoffTool;
use Telnyx\AI\Assistants\AssistantTool\HandoffTool\Handoff;
use Telnyx\AI\Assistants\AssistantTool\SipReferTool;
use Telnyx\AI\Assistants\AssistantTool\SipReferTool\Refer;
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
use Telnyx\AI\Assistants\TranscriptionSettings\Settings;
use Telnyx\AI\Assistants\TransferTool;
use Telnyx\AI\Assistants\VoiceSettings;
use Telnyx\AI\Assistants\VoiceSettings\BackgroundAudio\UnionMember0;
use Telnyx\AI\Assistants\VoiceSettings\BackgroundAudio\UnionMember1;
use Telnyx\AI\Assistants\VoiceSettings\BackgroundAudio\UnionMember2;
use Telnyx\AI\Assistants\WebhookTool;
use Telnyx\AI\Assistants\WebhookTool\Type;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Updates the configuration of a specific assistant version. Can not update main version.
 *
 * @see Telnyx\Services\AI\Assistants\VersionsService::update()
 *
 * @phpstan-type VersionUpdateParamsShape = array{
 *   assistant_id: string,
 *   description?: string,
 *   dynamic_variables?: array<string,mixed>,
 *   dynamic_variables_webhook_url?: string,
 *   enabled_features?: list<EnabledFeatures|value-of<EnabledFeatures>>,
 *   greeting?: string,
 *   insight_settings?: InsightSettings|array{insight_group_id?: string|null},
 *   instructions?: string,
 *   llm_api_key_ref?: string,
 *   messaging_settings?: MessagingSettings|array{
 *     default_messaging_profile_id?: string|null,
 *     delivery_status_webhook_url?: string|null,
 *   },
 *   model?: string,
 *   name?: string,
 *   privacy_settings?: PrivacySettings|array{data_retention?: bool|null},
 *   telephony_settings?: TelephonySettings|array{
 *     default_texml_app_id?: string|null,
 *     supports_unauthenticated_web_calls?: bool|null,
 *   },
 *   tools?: list<WebhookTool|array{
 *     type: value-of<Type>, webhook: InferenceEmbeddingWebhookToolParams
 *   }|RetrievalTool|array{
 *     retrieval: InferenceEmbeddingBucketIDs,
 *     type: value-of<\Telnyx\AI\Assistants\RetrievalTool\Type>,
 *   }|HandoffTool|array{
 *     handoff: Handoff,
 *     type: value-of<\Telnyx\AI\Assistants\AssistantTool\HandoffTool\Type>,
 *   }|HangupTool|array{
 *     hangup: HangupToolParams,
 *     type: value-of<\Telnyx\AI\Assistants\HangupTool\Type>,
 *   }|TransferTool|array{
 *     transfer: InferenceEmbeddingTransferToolParams,
 *     type: value-of<\Telnyx\AI\Assistants\TransferTool\Type>,
 *   }|SipReferTool|array{
 *     refer: Refer,
 *     type: value-of<\Telnyx\AI\Assistants\AssistantTool\SipReferTool\Type>,
 *   }|DtmfTool|array{
 *     send_dtmf: array<string,mixed>,
 *     type: value-of<\Telnyx\AI\Assistants\AssistantTool\DtmfTool\Type>,
 *   }>,
 *   transcription?: TranscriptionSettings|array{
 *     language?: string|null,
 *     model?: value-of<Model>|null,
 *     region?: string|null,
 *     settings?: Settings|null,
 *   },
 *   voice_settings?: VoiceSettings|array{
 *     voice: string,
 *     api_key_ref?: string|null,
 *     background_audio?: null|UnionMember0|UnionMember1|UnionMember2,
 *     voice_speed?: float|null,
 *   },
 * }
 */
final class VersionUpdateParams implements BaseModel
{
    /** @use SdkModel<VersionUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $assistant_id;

    #[Optional]
    public ?string $description;

    /**
     * Map of dynamic variables and their default values.
     *
     * @var array<string,mixed>|null $dynamic_variables
     */
    #[Optional(map: 'mixed')]
    public ?array $dynamic_variables;

    /**
     * If the dynamic_variables_webhook_url is set for the assistant, we will send a request at the start of the conversation. See our [guide](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables) for more information.
     */
    #[Optional]
    public ?string $dynamic_variables_webhook_url;

    /** @var list<value-of<EnabledFeatures>>|null $enabled_features */
    #[Optional(list: EnabledFeatures::class)]
    public ?array $enabled_features;

    /**
     * Text that the assistant will use to start the conversation. This may be templated with [dynamic variables](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables).
     */
    #[Optional]
    public ?string $greeting;

    #[Optional]
    public ?InsightSettings $insight_settings;

    /**
     * System instructions for the assistant. These may be templated with [dynamic variables](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables).
     */
    #[Optional]
    public ?string $instructions;

    /**
     * This is only needed when using third-party inference providers. The `identifier` for an integration secret [/v2/integration_secrets](https://developers.telnyx.com/api/secrets-manager/integration-secrets/create-integration-secret) that refers to your LLM provider's API key. Warning: Free plans are unlikely to work with this integration.
     */
    #[Optional]
    public ?string $llm_api_key_ref;

    #[Optional]
    public ?MessagingSettings $messaging_settings;

    /**
     * ID of the model to use. You can use the [Get models API](https://developers.telnyx.com/api/inference/inference-embedding/get-models-public-models-get) to see all of your available models,.
     */
    #[Optional]
    public ?string $model;

    #[Optional]
    public ?string $name;

    #[Optional]
    public ?PrivacySettings $privacy_settings;

    #[Optional]
    public ?TelephonySettings $telephony_settings;

    /**
     * The tools that the assistant can use. These may be templated with [dynamic variables](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables).
     *
     * @var list<WebhookTool|RetrievalTool|HandoffTool|HangupTool|TransferTool|SipReferTool|DtmfTool>|null $tools
     */
    #[Optional(list: AssistantTool::class)]
    public ?array $tools;

    #[Optional]
    public ?TranscriptionSettings $transcription;

    #[Optional]
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
     * @param InsightSettings|array{insight_group_id?: string|null} $insight_settings
     * @param MessagingSettings|array{
     *   default_messaging_profile_id?: string|null,
     *   delivery_status_webhook_url?: string|null,
     * } $messaging_settings
     * @param PrivacySettings|array{data_retention?: bool|null} $privacy_settings
     * @param TelephonySettings|array{
     *   default_texml_app_id?: string|null,
     *   supports_unauthenticated_web_calls?: bool|null,
     * } $telephony_settings
     * @param list<WebhookTool|array{
     *   type: value-of<Type>, webhook: InferenceEmbeddingWebhookToolParams
     * }|RetrievalTool|array{
     *   retrieval: InferenceEmbeddingBucketIDs,
     *   type: value-of<RetrievalTool\Type>,
     * }|HandoffTool|array{
     *   handoff: Handoff,
     *   type: value-of<HandoffTool\Type>,
     * }|HangupTool|array{
     *   hangup: HangupToolParams,
     *   type: value-of<HangupTool\Type>,
     * }|TransferTool|array{
     *   transfer: InferenceEmbeddingTransferToolParams,
     *   type: value-of<TransferTool\Type>,
     * }|SipReferTool|array{
     *   refer: Refer,
     *   type: value-of<SipReferTool\Type>,
     * }|DtmfTool|array{
     *   send_dtmf: array<string,mixed>,
     *   type: value-of<DtmfTool\Type>,
     * }> $tools
     * @param TranscriptionSettings|array{
     *   language?: string|null,
     *   model?: value-of<Model>|null,
     *   region?: string|null,
     *   settings?: Settings|null,
     * } $transcription
     * @param VoiceSettings|array{
     *   voice: string,
     *   api_key_ref?: string|null,
     *   background_audio?: UnionMember0|UnionMember1|UnionMember2|null,
     *   voice_speed?: float|null,
     * } $voice_settings
     */
    public static function with(
        string $assistant_id,
        ?string $description = null,
        ?array $dynamic_variables = null,
        ?string $dynamic_variables_webhook_url = null,
        ?array $enabled_features = null,
        ?string $greeting = null,
        InsightSettings|array|null $insight_settings = null,
        ?string $instructions = null,
        ?string $llm_api_key_ref = null,
        MessagingSettings|array|null $messaging_settings = null,
        ?string $model = null,
        ?string $name = null,
        PrivacySettings|array|null $privacy_settings = null,
        TelephonySettings|array|null $telephony_settings = null,
        ?array $tools = null,
        TranscriptionSettings|array|null $transcription = null,
        VoiceSettings|array|null $voice_settings = null,
    ): self {
        $obj = new self;

        $obj['assistant_id'] = $assistant_id;

        null !== $description && $obj['description'] = $description;
        null !== $dynamic_variables && $obj['dynamic_variables'] = $dynamic_variables;
        null !== $dynamic_variables_webhook_url && $obj['dynamic_variables_webhook_url'] = $dynamic_variables_webhook_url;
        null !== $enabled_features && $obj['enabled_features'] = $enabled_features;
        null !== $greeting && $obj['greeting'] = $greeting;
        null !== $insight_settings && $obj['insight_settings'] = $insight_settings;
        null !== $instructions && $obj['instructions'] = $instructions;
        null !== $llm_api_key_ref && $obj['llm_api_key_ref'] = $llm_api_key_ref;
        null !== $messaging_settings && $obj['messaging_settings'] = $messaging_settings;
        null !== $model && $obj['model'] = $model;
        null !== $name && $obj['name'] = $name;
        null !== $privacy_settings && $obj['privacy_settings'] = $privacy_settings;
        null !== $telephony_settings && $obj['telephony_settings'] = $telephony_settings;
        null !== $tools && $obj['tools'] = $tools;
        null !== $transcription && $obj['transcription'] = $transcription;
        null !== $voice_settings && $obj['voice_settings'] = $voice_settings;

        return $obj;
    }

    public function withAssistantID(string $assistantID): self
    {
        $obj = clone $this;
        $obj['assistant_id'] = $assistantID;

        return $obj;
    }

    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj['description'] = $description;

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
        $obj['dynamic_variables'] = $dynamicVariables;

        return $obj;
    }

    /**
     * If the dynamic_variables_webhook_url is set for the assistant, we will send a request at the start of the conversation. See our [guide](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables) for more information.
     */
    public function withDynamicVariablesWebhookURL(
        string $dynamicVariablesWebhookURL
    ): self {
        $obj = clone $this;
        $obj['dynamic_variables_webhook_url'] = $dynamicVariablesWebhookURL;

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
        $obj['greeting'] = $greeting;

        return $obj;
    }

    /**
     * @param InsightSettings|array{insight_group_id?: string|null} $insightSettings
     */
    public function withInsightSettings(
        InsightSettings|array $insightSettings
    ): self {
        $obj = clone $this;
        $obj['insight_settings'] = $insightSettings;

        return $obj;
    }

    /**
     * System instructions for the assistant. These may be templated with [dynamic variables](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables).
     */
    public function withInstructions(string $instructions): self
    {
        $obj = clone $this;
        $obj['instructions'] = $instructions;

        return $obj;
    }

    /**
     * This is only needed when using third-party inference providers. The `identifier` for an integration secret [/v2/integration_secrets](https://developers.telnyx.com/api/secrets-manager/integration-secrets/create-integration-secret) that refers to your LLM provider's API key. Warning: Free plans are unlikely to work with this integration.
     */
    public function withLlmAPIKeyRef(string $llmAPIKeyRef): self
    {
        $obj = clone $this;
        $obj['llm_api_key_ref'] = $llmAPIKeyRef;

        return $obj;
    }

    /**
     * @param MessagingSettings|array{
     *   default_messaging_profile_id?: string|null,
     *   delivery_status_webhook_url?: string|null,
     * } $messagingSettings
     */
    public function withMessagingSettings(
        MessagingSettings|array $messagingSettings
    ): self {
        $obj = clone $this;
        $obj['messaging_settings'] = $messagingSettings;

        return $obj;
    }

    /**
     * ID of the model to use. You can use the [Get models API](https://developers.telnyx.com/api/inference/inference-embedding/get-models-public-models-get) to see all of your available models,.
     */
    public function withModel(string $model): self
    {
        $obj = clone $this;
        $obj['model'] = $model;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * @param PrivacySettings|array{data_retention?: bool|null} $privacySettings
     */
    public function withPrivacySettings(
        PrivacySettings|array $privacySettings
    ): self {
        $obj = clone $this;
        $obj['privacy_settings'] = $privacySettings;

        return $obj;
    }

    /**
     * @param TelephonySettings|array{
     *   default_texml_app_id?: string|null,
     *   supports_unauthenticated_web_calls?: bool|null,
     * } $telephonySettings
     */
    public function withTelephonySettings(
        TelephonySettings|array $telephonySettings
    ): self {
        $obj = clone $this;
        $obj['telephony_settings'] = $telephonySettings;

        return $obj;
    }

    /**
     * The tools that the assistant can use. These may be templated with [dynamic variables](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables).
     *
     * @param list<WebhookTool|array{
     *   type: value-of<Type>, webhook: InferenceEmbeddingWebhookToolParams
     * }|RetrievalTool|array{
     *   retrieval: InferenceEmbeddingBucketIDs,
     *   type: value-of<RetrievalTool\Type>,
     * }|HandoffTool|array{
     *   handoff: Handoff,
     *   type: value-of<HandoffTool\Type>,
     * }|HangupTool|array{
     *   hangup: HangupToolParams,
     *   type: value-of<HangupTool\Type>,
     * }|TransferTool|array{
     *   transfer: InferenceEmbeddingTransferToolParams,
     *   type: value-of<TransferTool\Type>,
     * }|SipReferTool|array{
     *   refer: Refer,
     *   type: value-of<SipReferTool\Type>,
     * }|DtmfTool|array{
     *   send_dtmf: array<string,mixed>,
     *   type: value-of<DtmfTool\Type>,
     * }> $tools
     */
    public function withTools(array $tools): self
    {
        $obj = clone $this;
        $obj['tools'] = $tools;

        return $obj;
    }

    /**
     * @param TranscriptionSettings|array{
     *   language?: string|null,
     *   model?: value-of<Model>|null,
     *   region?: string|null,
     *   settings?: Settings|null,
     * } $transcription
     */
    public function withTranscription(
        TranscriptionSettings|array $transcription
    ): self {
        $obj = clone $this;
        $obj['transcription'] = $transcription;

        return $obj;
    }

    /**
     * @param VoiceSettings|array{
     *   voice: string,
     *   api_key_ref?: string|null,
     *   background_audio?: UnionMember0|UnionMember1|UnionMember2|null,
     *   voice_speed?: float|null,
     * } $voiceSettings
     */
    public function withVoiceSettings(VoiceSettings|array $voiceSettings): self
    {
        $obj = clone $this;
        $obj['voice_settings'] = $voiceSettings;

        return $obj;
    }
}
