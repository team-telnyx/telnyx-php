<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI;

use Telnyx\AI\Assistants\AssistantChatResponse;
use Telnyx\AI\Assistants\AssistantCloneResponse;
use Telnyx\AI\Assistants\AssistantDeleteResponse;
use Telnyx\AI\Assistants\AssistantGetResponse;
use Telnyx\AI\Assistants\AssistantImportParams\Provider;
use Telnyx\AI\Assistants\AssistantNewResponse;
use Telnyx\AI\Assistants\AssistantsList;
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
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface AssistantsContract
{
    /**
     * @api
     *
     * @param string $instructions System instructions for the assistant. These may be templated with [dynamic variables](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables)
     * @param string $model ID of the model to use. You can use the [Get models API](https://developers.telnyx.com/api/inference/inference-embedding/get-models-public-models-get) to see all of your available models,
     * @param string $name
     * @param string $description
     * @param array<string,
     * mixed,> $dynamicVariables Map of dynamic variables and their default values
     * @param string $dynamicVariablesWebhookURL If the dynamic_variables_webhook_url is set for the assistant, we will send a request at the start of the conversation. See our [guide](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables) for more information.
     * @param list<EnabledFeatures|value-of<EnabledFeatures>> $enabledFeatures
     * @param string $greeting Text that the assistant will use to start the conversation. This may be templated with [dynamic variables](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables)
     * @param InsightSettings $insightSettings
     * @param string $llmAPIKeyRef This is only needed when using third-party inference providers. The `identifier` for an integration secret [/v2/integration_secrets](https://developers.telnyx.com/api/secrets-manager/integration-secrets/create-integration-secret) that refers to your LLM provider's API key. Warning: Free plans are unlikely to work with this integration.
     * @param MessagingSettings $messagingSettings
     * @param PrivacySettings $privacySettings
     * @param TelephonySettings $telephonySettings
     * @param list<WebhookTool|RetrievalTool|HandoffTool|HangupTool|TransferTool|SipReferTool|DtmfTool> $tools The tools that the assistant can use. These may be templated with [dynamic variables](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables)
     * @param TranscriptionSettings $transcription
     * @param VoiceSettings $voiceSettings
     */
    public function create(
        $instructions,
        $model,
        $name,
        $description = omit,
        $dynamicVariables = omit,
        $dynamicVariablesWebhookURL = omit,
        $enabledFeatures = omit,
        $greeting = omit,
        $insightSettings = omit,
        $llmAPIKeyRef = omit,
        $messagingSettings = omit,
        $privacySettings = omit,
        $telephonySettings = omit,
        $tools = omit,
        $transcription = omit,
        $voiceSettings = omit,
        ?RequestOptions $requestOptions = null,
    ): AssistantNewResponse;

    /**
     * @api
     *
     * @param string $callControlID
     * @param bool $fetchDynamicVariablesFromWebhook
     * @param string $from
     * @param string $to
     */
    public function retrieve(
        string $assistantID,
        $callControlID = omit,
        $fetchDynamicVariablesFromWebhook = omit,
        $from = omit,
        $to = omit,
        ?RequestOptions $requestOptions = null,
    ): AssistantGetResponse;

    /**
     * @api
     *
     * @param string $description
     * @param array<string,
     * mixed,> $dynamicVariables Map of dynamic variables and their default values
     * @param string $dynamicVariablesWebhookURL If the dynamic_variables_webhook_url is set for the assistant, we will send a request at the start of the conversation. See our [guide](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables) for more information.
     * @param list<EnabledFeatures|value-of<EnabledFeatures>> $enabledFeatures
     * @param string $greeting Text that the assistant will use to start the conversation. This may be templated with [dynamic variables](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables)
     * @param InsightSettings $insightSettings
     * @param string $instructions System instructions for the assistant. These may be templated with [dynamic variables](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables)
     * @param string $llmAPIKeyRef This is only needed when using third-party inference providers. The `identifier` for an integration secret [/v2/integration_secrets](https://developers.telnyx.com/api/secrets-manager/integration-secrets/create-integration-secret) that refers to your LLM provider's API key. Warning: Free plans are unlikely to work with this integration.
     * @param MessagingSettings $messagingSettings
     * @param string $model ID of the model to use. You can use the [Get models API](https://developers.telnyx.com/api/inference/inference-embedding/get-models-public-models-get) to see all of your available models,
     * @param string $name
     * @param PrivacySettings $privacySettings
     * @param bool $promoteToMain Indicates whether the assistant should be promoted to the main version. Defaults to true.
     * @param TelephonySettings $telephonySettings
     * @param list<WebhookTool|RetrievalTool|HandoffTool|HangupTool|TransferTool|SipReferTool|DtmfTool> $tools The tools that the assistant can use. These may be templated with [dynamic variables](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables)
     * @param TranscriptionSettings $transcription
     * @param VoiceSettings $voiceSettings
     */
    public function update(
        string $assistantID,
        $description = omit,
        $dynamicVariables = omit,
        $dynamicVariablesWebhookURL = omit,
        $enabledFeatures = omit,
        $greeting = omit,
        $insightSettings = omit,
        $instructions = omit,
        $llmAPIKeyRef = omit,
        $messagingSettings = omit,
        $model = omit,
        $name = omit,
        $privacySettings = omit,
        $promoteToMain = omit,
        $telephonySettings = omit,
        $tools = omit,
        $transcription = omit,
        $voiceSettings = omit,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): AssistantsList;

    /**
     * @api
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
     */
    public function chat(
        string $assistantID,
        $content,
        $conversationID,
        $name = omit,
        ?RequestOptions $requestOptions = null,
    ): AssistantChatResponse;

    /**
     * @api
     */
    public function clone(
        string $assistantID,
        ?RequestOptions $requestOptions = null
    ): AssistantCloneResponse;

    /**
     * @api
     */
    public function getTexml(
        string $assistantID,
        ?RequestOptions $requestOptions = null
    ): string;

    /**
     * @api
     *
     * @param string $apiKeyRef Integration secret pointer that refers to the API key for the external provider. This should be an identifier for an integration secret created via /v2/integration_secrets.
     * @param Provider|value-of<Provider> $provider the external provider to import assistants from
     */
    public function import(
        $apiKeyRef,
        $provider,
        ?RequestOptions $requestOptions = null
    ): AssistantsList;
}
