<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI;

use Telnyx\AI\Assistants\AssistantChatResponse;
use Telnyx\AI\Assistants\AssistantDeleteResponse;
use Telnyx\AI\Assistants\AssistantImportParams\Provider;
use Telnyx\AI\Assistants\AssistantSendSMSResponse;
use Telnyx\AI\Assistants\AssistantsList;
use Telnyx\AI\Assistants\AssistantTool;
use Telnyx\AI\Assistants\EnabledFeatures;
use Telnyx\AI\Assistants\InferenceEmbedding;
use Telnyx\AI\Assistants\InsightSettings;
use Telnyx\AI\Assistants\MessagingSettings;
use Telnyx\AI\Assistants\PrivacySettings;
use Telnyx\AI\Assistants\TelephonySettings;
use Telnyx\AI\Assistants\TranscriptionSettings;
use Telnyx\AI\Assistants\TranscriptionSettings\Model;
use Telnyx\AI\Assistants\VoiceSettings;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface AssistantsContract
{
    /**
     * @api
     *
     * @param string $instructions System instructions for the assistant. These may be templated with [dynamic variables](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables)
     * @param string $model ID of the model to use. You can use the [Get models API](https://developers.telnyx.com/api/inference/inference-embedding/get-models-public-models-get) to see all of your available models,
     * @param array<string,mixed> $dynamicVariables Map of dynamic variables and their default values
     * @param string $dynamicVariablesWebhookURL If the dynamic_variables_webhook_url is set for the assistant, we will send a request at the start of the conversation. See our [guide](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables) for more information.
     * @param list<'telephony'|'messaging'|EnabledFeatures> $enabledFeatures
     * @param string $greeting Text that the assistant will use to start the conversation. This may be templated with [dynamic variables](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables)
     * @param array{insightGroupID?: string}|InsightSettings $insightSettings
     * @param string $llmAPIKeyRef This is only needed when using third-party inference providers. The `identifier` for an integration secret [/v2/integration_secrets](https://developers.telnyx.com/api/secrets-manager/integration-secrets/create-integration-secret) that refers to your LLM provider's API key. Warning: Free plans are unlikely to work with this integration.
     * @param array{
     *   defaultMessagingProfileID?: string, deliveryStatusWebhookURL?: string
     * }|MessagingSettings $messagingSettings
     * @param array{dataRetention?: bool}|PrivacySettings $privacySettings
     * @param array{
     *   defaultTexmlAppID?: string, supportsUnauthenticatedWebCalls?: bool
     * }|TelephonySettings $telephonySettings
     * @param list<AssistantTool|array<string,mixed>> $tools The tools that the assistant can use. These may be templated with [dynamic variables](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables)
     * @param array{
     *   language?: string,
     *   model?: 'deepgram/flux'|'deepgram/nova-3'|'deepgram/nova-2'|'azure/fast'|'distil-whisper/distil-large-v2'|'openai/whisper-large-v3-turbo'|Model,
     *   region?: string,
     *   settings?: array{
     *     eotThreshold?: float,
     *     eotTimeoutMs?: int,
     *     numerals?: bool,
     *     smartFormat?: bool,
     *   },
     * }|TranscriptionSettings $transcription
     * @param array{
     *   voice: string,
     *   apiKeyRef?: string,
     *   backgroundAudio?: array<string,mixed>,
     *   voiceSpeed?: float,
     * }|VoiceSettings $voiceSettings
     *
     * @throws APIException
     */
    public function create(
        string $instructions,
        string $model,
        string $name,
        ?string $description = null,
        ?array $dynamicVariables = null,
        ?string $dynamicVariablesWebhookURL = null,
        ?array $enabledFeatures = null,
        ?string $greeting = null,
        array|InsightSettings|null $insightSettings = null,
        ?string $llmAPIKeyRef = null,
        array|MessagingSettings|null $messagingSettings = null,
        array|PrivacySettings|null $privacySettings = null,
        array|TelephonySettings|null $telephonySettings = null,
        ?array $tools = null,
        array|TranscriptionSettings|null $transcription = null,
        array|VoiceSettings|null $voiceSettings = null,
        ?RequestOptions $requestOptions = null,
    ): InferenceEmbedding;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $assistantID,
        ?string $callControlID = null,
        bool $fetchDynamicVariablesFromWebhook = false,
        ?string $from = null,
        ?string $to = null,
        ?RequestOptions $requestOptions = null,
    ): InferenceEmbedding;

    /**
     * @api
     *
     * @param array<string,mixed> $dynamicVariables Map of dynamic variables and their default values
     * @param string $dynamicVariablesWebhookURL If the dynamic_variables_webhook_url is set for the assistant, we will send a request at the start of the conversation. See our [guide](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables) for more information.
     * @param list<'telephony'|'messaging'|EnabledFeatures> $enabledFeatures
     * @param string $greeting Text that the assistant will use to start the conversation. This may be templated with [dynamic variables](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables)
     * @param array{insightGroupID?: string}|InsightSettings $insightSettings
     * @param string $instructions System instructions for the assistant. These may be templated with [dynamic variables](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables)
     * @param string $llmAPIKeyRef This is only needed when using third-party inference providers. The `identifier` for an integration secret [/v2/integration_secrets](https://developers.telnyx.com/api/secrets-manager/integration-secrets/create-integration-secret) that refers to your LLM provider's API key. Warning: Free plans are unlikely to work with this integration.
     * @param array{
     *   defaultMessagingProfileID?: string, deliveryStatusWebhookURL?: string
     * }|MessagingSettings $messagingSettings
     * @param string $model ID of the model to use. You can use the [Get models API](https://developers.telnyx.com/api/inference/inference-embedding/get-models-public-models-get) to see all of your available models,
     * @param array{dataRetention?: bool}|PrivacySettings $privacySettings
     * @param bool $promoteToMain Indicates whether the assistant should be promoted to the main version. Defaults to true.
     * @param array{
     *   defaultTexmlAppID?: string, supportsUnauthenticatedWebCalls?: bool
     * }|TelephonySettings $telephonySettings
     * @param list<AssistantTool|array<string,mixed>> $tools The tools that the assistant can use. These may be templated with [dynamic variables](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables)
     * @param array{
     *   language?: string,
     *   model?: 'deepgram/flux'|'deepgram/nova-3'|'deepgram/nova-2'|'azure/fast'|'distil-whisper/distil-large-v2'|'openai/whisper-large-v3-turbo'|Model,
     *   region?: string,
     *   settings?: array{
     *     eotThreshold?: float,
     *     eotTimeoutMs?: int,
     *     numerals?: bool,
     *     smartFormat?: bool,
     *   },
     * }|TranscriptionSettings $transcription
     * @param array{
     *   voice: string,
     *   apiKeyRef?: string,
     *   backgroundAudio?: array<string,mixed>,
     *   voiceSpeed?: float,
     * }|VoiceSettings $voiceSettings
     *
     * @throws APIException
     */
    public function update(
        string $assistantID,
        ?string $description = null,
        ?array $dynamicVariables = null,
        ?string $dynamicVariablesWebhookURL = null,
        ?array $enabledFeatures = null,
        ?string $greeting = null,
        array|InsightSettings|null $insightSettings = null,
        ?string $instructions = null,
        ?string $llmAPIKeyRef = null,
        array|MessagingSettings|null $messagingSettings = null,
        ?string $model = null,
        ?string $name = null,
        array|PrivacySettings|null $privacySettings = null,
        bool $promoteToMain = true,
        array|TelephonySettings|null $telephonySettings = null,
        ?array $tools = null,
        array|TranscriptionSettings|null $transcription = null,
        array|VoiceSettings|null $voiceSettings = null,
        ?RequestOptions $requestOptions = null,
    ): InferenceEmbedding;

    /**
     * @api
     *
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): AssistantsList;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $assistantID,
        ?RequestOptions $requestOptions = null
    ): AssistantDeleteResponse;

    /**
     * @api
     *
     * @param string $content The message content sent by the client to the assistant
     * @param string $conversationID A unique identifier for the conversation thread, used to maintain context
     * @param string $name The optional display name of the user sending the message
     *
     * @throws APIException
     */
    public function chat(
        string $assistantID,
        string $content,
        string $conversationID,
        ?string $name = null,
        ?RequestOptions $requestOptions = null,
    ): AssistantChatResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function clone(
        string $assistantID,
        ?RequestOptions $requestOptions = null
    ): InferenceEmbedding;

    /**
     * @api
     *
     * @throws APIException
     */
    public function getTexml(
        string $assistantID,
        ?RequestOptions $requestOptions = null
    ): string;

    /**
     * @api
     *
     * @param string $apiKeyRef Integration secret pointer that refers to the API key for the external provider. This should be an identifier for an integration secret created via /v2/integration_secrets.
     * @param 'elevenlabs'|'vapi'|'retell'|Provider $provider the external provider to import assistants from
     *
     * @throws APIException
     */
    public function import(
        string $apiKeyRef,
        string|Provider $provider,
        ?RequestOptions $requestOptions = null,
    ): AssistantsList;

    /**
     * @api
     *
     * @param array<string,string|int|bool> $conversationMetadata
     *
     * @throws APIException
     */
    public function sendSMS(
        string $assistantID,
        string $from,
        string $text,
        string $to,
        ?array $conversationMetadata = null,
        ?bool $shouldCreateConversation = null,
        ?RequestOptions $requestOptions = null,
    ): AssistantSendSMSResponse;
}
