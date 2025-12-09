<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\AI\Assistants\AssistantTool\DtmfTool;
use Telnyx\AI\Assistants\AssistantTool\HandoffTool;
use Telnyx\AI\Assistants\AssistantTool\HandoffTool\Handoff;
use Telnyx\AI\Assistants\AssistantTool\SipReferTool;
use Telnyx\AI\Assistants\AssistantTool\SipReferTool\Refer;
use Telnyx\AI\Assistants\TranscriptionSettings\Model;
use Telnyx\AI\Assistants\TranscriptionSettings\Settings;
use Telnyx\AI\Assistants\VoiceSettings\BackgroundAudio\UnionMember0;
use Telnyx\AI\Assistants\VoiceSettings\BackgroundAudio\UnionMember1;
use Telnyx\AI\Assistants\VoiceSettings\BackgroundAudio\UnionMember2;
use Telnyx\AI\Assistants\WebhookTool\Type;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Update an AI Assistant's attributes.
 *
 * @see Telnyx\Services\AI\AssistantsService::update()
 *
 * @phpstan-type AssistantUpdateParamsShape = array{
 *   description?: string,
 *   dynamicVariables?: array<string,mixed>,
 *   dynamicVariablesWebhookURL?: string,
 *   enabledFeatures?: list<EnabledFeatures|value-of<EnabledFeatures>>,
 *   greeting?: string,
 *   insightSettings?: InsightSettings|array{insightGroupID?: string|null},
 *   instructions?: string,
 *   llmAPIKeyRef?: string,
 *   messagingSettings?: MessagingSettings|array{
 *     defaultMessagingProfileID?: string|null,
 *     deliveryStatusWebhookURL?: string|null,
 *   },
 *   model?: string,
 *   name?: string,
 *   privacySettings?: PrivacySettings|array{dataRetention?: bool|null},
 *   promoteToMain?: bool,
 *   telephonySettings?: TelephonySettings|array{
 *     defaultTexmlAppID?: string|null, supportsUnauthenticatedWebCalls?: bool|null
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
 *     sendDtmf: array<string,mixed>,
 *     type: value-of<\Telnyx\AI\Assistants\AssistantTool\DtmfTool\Type>,
 *   }>,
 *   transcription?: TranscriptionSettings|array{
 *     language?: string|null,
 *     model?: value-of<Model>|null,
 *     region?: string|null,
 *     settings?: Settings|null,
 *   },
 *   voiceSettings?: VoiceSettings|array{
 *     voice: string,
 *     apiKeyRef?: string|null,
 *     backgroundAudio?: null|UnionMember0|UnionMember1|UnionMember2,
 *     voiceSpeed?: float|null,
 *   },
 * }
 */
final class AssistantUpdateParams implements BaseModel
{
    /** @use SdkModel<AssistantUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

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

    /**
     * Indicates whether the assistant should be promoted to the main version. Defaults to true.
     */
    #[Optional('promote_to_main')]
    public ?bool $promoteToMain;

    #[Optional('telephony_settings')]
    public ?TelephonySettings $telephonySettings;

    /**
     * The tools that the assistant can use. These may be templated with [dynamic variables](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables).
     *
     * @var list<WebhookTool|RetrievalTool|HandoffTool|HangupTool|TransferTool|SipReferTool|DtmfTool>|null $tools
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
     *   sendDtmf: array<string,mixed>,
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
     *   apiKeyRef?: string|null,
     *   backgroundAudio?: UnionMember0|UnionMember1|UnionMember2|null,
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
        ?bool $promoteToMain = null,
        TelephonySettings|array|null $telephonySettings = null,
        ?array $tools = null,
        TranscriptionSettings|array|null $transcription = null,
        VoiceSettings|array|null $voiceSettings = null,
    ): self {
        $obj = new self;

        null !== $description && $obj['description'] = $description;
        null !== $dynamicVariables && $obj['dynamicVariables'] = $dynamicVariables;
        null !== $dynamicVariablesWebhookURL && $obj['dynamicVariablesWebhookURL'] = $dynamicVariablesWebhookURL;
        null !== $enabledFeatures && $obj['enabledFeatures'] = $enabledFeatures;
        null !== $greeting && $obj['greeting'] = $greeting;
        null !== $insightSettings && $obj['insightSettings'] = $insightSettings;
        null !== $instructions && $obj['instructions'] = $instructions;
        null !== $llmAPIKeyRef && $obj['llmAPIKeyRef'] = $llmAPIKeyRef;
        null !== $messagingSettings && $obj['messagingSettings'] = $messagingSettings;
        null !== $model && $obj['model'] = $model;
        null !== $name && $obj['name'] = $name;
        null !== $privacySettings && $obj['privacySettings'] = $privacySettings;
        null !== $promoteToMain && $obj['promoteToMain'] = $promoteToMain;
        null !== $telephonySettings && $obj['telephonySettings'] = $telephonySettings;
        null !== $tools && $obj['tools'] = $tools;
        null !== $transcription && $obj['transcription'] = $transcription;
        null !== $voiceSettings && $obj['voiceSettings'] = $voiceSettings;

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
        $obj['dynamicVariables'] = $dynamicVariables;

        return $obj;
    }

    /**
     * If the dynamic_variables_webhook_url is set for the assistant, we will send a request at the start of the conversation. See our [guide](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables) for more information.
     */
    public function withDynamicVariablesWebhookURL(
        string $dynamicVariablesWebhookURL
    ): self {
        $obj = clone $this;
        $obj['dynamicVariablesWebhookURL'] = $dynamicVariablesWebhookURL;

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
        $obj['greeting'] = $greeting;

        return $obj;
    }

    /**
     * @param InsightSettings|array{insightGroupID?: string|null} $insightSettings
     */
    public function withInsightSettings(
        InsightSettings|array $insightSettings
    ): self {
        $obj = clone $this;
        $obj['insightSettings'] = $insightSettings;

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
        $obj['llmAPIKeyRef'] = $llmAPIKeyRef;

        return $obj;
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
        $obj = clone $this;
        $obj['messagingSettings'] = $messagingSettings;

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
     * @param PrivacySettings|array{dataRetention?: bool|null} $privacySettings
     */
    public function withPrivacySettings(
        PrivacySettings|array $privacySettings
    ): self {
        $obj = clone $this;
        $obj['privacySettings'] = $privacySettings;

        return $obj;
    }

    /**
     * Indicates whether the assistant should be promoted to the main version. Defaults to true.
     */
    public function withPromoteToMain(bool $promoteToMain): self
    {
        $obj = clone $this;
        $obj['promoteToMain'] = $promoteToMain;

        return $obj;
    }

    /**
     * @param TelephonySettings|array{
     *   defaultTexmlAppID?: string|null, supportsUnauthenticatedWebCalls?: bool|null
     * } $telephonySettings
     */
    public function withTelephonySettings(
        TelephonySettings|array $telephonySettings
    ): self {
        $obj = clone $this;
        $obj['telephonySettings'] = $telephonySettings;

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
     *   sendDtmf: array<string,mixed>,
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
     *   apiKeyRef?: string|null,
     *   backgroundAudio?: UnionMember0|UnionMember1|UnionMember2|null,
     *   voiceSpeed?: float|null,
     * } $voiceSettings
     */
    public function withVoiceSettings(VoiceSettings|array $voiceSettings): self
    {
        $obj = clone $this;
        $obj['voiceSettings'] = $voiceSettings;

        return $obj;
    }
}
