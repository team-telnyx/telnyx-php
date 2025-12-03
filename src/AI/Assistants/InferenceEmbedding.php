<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\AI\Assistants\AssistantTool\Handoff;
use Telnyx\AI\Assistants\AssistantTool\Refer;
use Telnyx\AI\Assistants\AssistantTool\SendDtmf;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type InferenceEmbeddingShape = array{
 *   id: string,
 *   created_at: \DateTimeInterface,
 *   instructions: string,
 *   model: string,
 *   name: string,
 *   description?: string|null,
 *   dynamic_variables?: array<string,mixed>|null,
 *   dynamic_variables_webhook_url?: string|null,
 *   enabled_features?: list<value-of<EnabledFeatures>>|null,
 *   greeting?: string|null,
 *   import_metadata?: ImportMetadata|null,
 *   insight_settings?: InsightSettings|null,
 *   llm_api_key_ref?: string|null,
 *   messaging_settings?: MessagingSettings|null,
 *   privacy_settings?: PrivacySettings|null,
 *   telephony_settings?: TelephonySettings|null,
 *   tools?: list<WebhookTool|RetrievalTool|Handoff|HangupTool|TransferTool|Refer|SendDtmf>|null,
 *   transcription?: TranscriptionSettings|null,
 *   voice_settings?: VoiceSettings|null,
 * }
 */
final class InferenceEmbedding implements BaseModel, ResponseConverter
{
    /** @use SdkModel<InferenceEmbeddingShape> */
    use SdkModel;

    use SdkResponse;

    #[Api]
    public string $id;

    #[Api]
    public \DateTimeInterface $created_at;

    /**
     * System instructions for the assistant. These may be templated with [dynamic variables](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables).
     */
    #[Api]
    public string $instructions;

    /**
     * ID of the model to use. You can use the [Get models API](https://developers.telnyx.com/api/inference/inference-embedding/get-models-public-models-get) to see all of your available models,.
     */
    #[Api]
    public string $model;

    #[Api]
    public string $name;

    #[Api(optional: true)]
    public ?string $description;

    /**
     * Map of dynamic variables and their values.
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
    public ?ImportMetadata $import_metadata;

    #[Api(optional: true)]
    public ?InsightSettings $insight_settings;

    /**
     * This is only needed when using third-party inference providers. The `identifier` for an integration secret [/v2/integration_secrets](https://developers.telnyx.com/api/secrets-manager/integration-secrets/create-integration-secret) that refers to your LLM provider's API key. Warning: Free plans are unlikely to work with this integration.
     */
    #[Api(optional: true)]
    public ?string $llm_api_key_ref;

    #[Api(optional: true)]
    public ?MessagingSettings $messaging_settings;

    #[Api(optional: true)]
    public ?PrivacySettings $privacy_settings;

    #[Api(optional: true)]
    public ?TelephonySettings $telephony_settings;

    /**
     * The tools that the assistant can use. These may be templated with [dynamic variables](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables).
     *
     * @var list<WebhookTool|RetrievalTool|Handoff|HangupTool|TransferTool|Refer|SendDtmf>|null $tools
     */
    #[Api(list: AssistantTool::class, optional: true)]
    public ?array $tools;

    #[Api(optional: true)]
    public ?TranscriptionSettings $transcription;

    #[Api(optional: true)]
    public ?VoiceSettings $voice_settings;

    /**
     * `new InferenceEmbedding()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * InferenceEmbedding::with(
     *   id: ..., created_at: ..., instructions: ..., model: ..., name: ...
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
     * @param array<string,mixed> $dynamic_variables
     * @param list<EnabledFeatures|value-of<EnabledFeatures>> $enabled_features
     * @param list<WebhookTool|RetrievalTool|Handoff|HangupTool|TransferTool|Refer|SendDtmf> $tools
     */
    public static function with(
        string $id,
        \DateTimeInterface $created_at,
        string $instructions,
        string $model,
        string $name,
        ?string $description = null,
        ?array $dynamic_variables = null,
        ?string $dynamic_variables_webhook_url = null,
        ?array $enabled_features = null,
        ?string $greeting = null,
        ?ImportMetadata $import_metadata = null,
        ?InsightSettings $insight_settings = null,
        ?string $llm_api_key_ref = null,
        ?MessagingSettings $messaging_settings = null,
        ?PrivacySettings $privacy_settings = null,
        ?TelephonySettings $telephony_settings = null,
        ?array $tools = null,
        ?TranscriptionSettings $transcription = null,
        ?VoiceSettings $voice_settings = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->created_at = $created_at;
        $obj->instructions = $instructions;
        $obj->model = $model;
        $obj->name = $name;

        null !== $description && $obj->description = $description;
        null !== $dynamic_variables && $obj->dynamic_variables = $dynamic_variables;
        null !== $dynamic_variables_webhook_url && $obj->dynamic_variables_webhook_url = $dynamic_variables_webhook_url;
        null !== $enabled_features && $obj['enabled_features'] = $enabled_features;
        null !== $greeting && $obj->greeting = $greeting;
        null !== $import_metadata && $obj->import_metadata = $import_metadata;
        null !== $insight_settings && $obj->insight_settings = $insight_settings;
        null !== $llm_api_key_ref && $obj->llm_api_key_ref = $llm_api_key_ref;
        null !== $messaging_settings && $obj->messaging_settings = $messaging_settings;
        null !== $privacy_settings && $obj->privacy_settings = $privacy_settings;
        null !== $telephony_settings && $obj->telephony_settings = $telephony_settings;
        null !== $tools && $obj->tools = $tools;
        null !== $transcription && $obj->transcription = $transcription;
        null !== $voice_settings && $obj->voice_settings = $voice_settings;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->created_at = $createdAt;

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

    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj->description = $description;

        return $obj;
    }

    /**
     * Map of dynamic variables and their values.
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

    public function withImportMetadata(ImportMetadata $importMetadata): self
    {
        $obj = clone $this;
        $obj->import_metadata = $importMetadata;

        return $obj;
    }

    public function withInsightSettings(InsightSettings $insightSettings): self
    {
        $obj = clone $this;
        $obj->insight_settings = $insightSettings;

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
     * @param list<WebhookTool|RetrievalTool|Handoff|HangupTool|TransferTool|Refer|SendDtmf> $tools
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
