<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Assistants;

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
use Telnyx\AI\Assistants\TranscriptionSettingsConfig;
use Telnyx\AI\Assistants\VoiceSettings;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface VersionsContract
{
    /**
     * @api
     *
     * @param string $versionID Path param:
     * @param string $assistantID Path param:
     * @param bool $includeMcpServers Query param:
     *
     * @throws APIException
     */
    public function retrieve(
        string $versionID,
        string $assistantID,
        ?bool $includeMcpServers = null,
        ?RequestOptions $requestOptions = null,
    ): InferenceEmbedding;

    /**
     * @api
     *
     * @param string $versionID Path param:
     * @param string $assistantID Path param:
     * @param string $description Body param:
     * @param array<string,mixed> $dynamicVariables Body param: Map of dynamic variables and their default values
     * @param string $dynamicVariablesWebhookURL Body param: If the dynamic_variables_webhook_url is set for the assistant, we will send a request at the start of the conversation. See our [guide](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables) for more information.
     * @param list<'telephony'|'messaging'|EnabledFeatures> $enabledFeatures Body param:
     * @param string $greeting Body param: Text that the assistant will use to start the conversation. This may be templated with [dynamic variables](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables)
     * @param array{
     *   insightGroupID?: string
     * }|InsightSettings $insightSettings Body param:
     * @param string $instructions Body param: System instructions for the assistant. These may be templated with [dynamic variables](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables)
     * @param string $llmAPIKeyRef Body param: This is only needed when using third-party inference providers. The `identifier` for an integration secret [/v2/integration_secrets](https://developers.telnyx.com/api/secrets-manager/integration-secrets/create-integration-secret) that refers to your LLM provider's API key. Warning: Free plans are unlikely to work with this integration.
     * @param array{
     *   defaultMessagingProfileID?: string, deliveryStatusWebhookURL?: string
     * }|MessagingSettings $messagingSettings Body param:
     * @param string $model Body param: ID of the model to use. You can use the [Get models API](https://developers.telnyx.com/api/inference/inference-embedding/get-models-public-models-get) to see all of your available models,
     * @param string $name Body param:
     * @param array{dataRetention?: bool}|PrivacySettings $privacySettings Body param:
     * @param array{
     *   defaultTexmlAppID?: string, supportsUnauthenticatedWebCalls?: bool
     * }|TelephonySettings $telephonySettings Body param:
     * @param list<AssistantTool|array<string,mixed>> $tools Body param: The tools that the assistant can use. These may be templated with [dynamic variables](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables)
     * @param array{
     *   language?: string,
     *   model?: 'deepgram/flux'|'deepgram/nova-3'|'deepgram/nova-2'|'azure/fast'|'distil-whisper/distil-large-v2'|'openai/whisper-large-v3-turbo'|Model,
     *   region?: string,
     *   settings?: array{
     *     eotThreshold?: float,
     *     eotTimeoutMs?: int,
     *     numerals?: bool,
     *     smartFormat?: bool,
     *   }|TranscriptionSettingsConfig,
     * }|TranscriptionSettings $transcription Body param:
     * @param array{
     *   voice: string,
     *   apiKeyRef?: string,
     *   backgroundAudio?: array<string,mixed>,
     *   voiceSpeed?: float,
     * }|VoiceSettings $voiceSettings Body param:
     *
     * @throws APIException
     */
    public function update(
        string $versionID,
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
        string $assistantID,
        ?RequestOptions $requestOptions = null
    ): AssistantsList;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $versionID,
        string $assistantID,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function promote(
        string $versionID,
        string $assistantID,
        ?RequestOptions $requestOptions = null,
    ): InferenceEmbedding;
}
