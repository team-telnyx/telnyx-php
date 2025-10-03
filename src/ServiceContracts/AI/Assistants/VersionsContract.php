<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Assistants;

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
use Telnyx\AI\Assistants\Versions\VersionGetResponse;
use Telnyx\AI\Assistants\Versions\VersionPromoteResponse;
use Telnyx\AI\Assistants\Versions\VersionUpdateResponse;
use Telnyx\AI\Assistants\VoiceSettings;
use Telnyx\AI\Assistants\WebhookTool;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface VersionsContract
{
    /**
     * @api
     *
     * @param string $assistantID
     * @param bool $includeMcpServers
     *
     * @throws APIException
     */
    public function retrieve(
        string $versionID,
        $assistantID,
        $includeMcpServers = omit,
        ?RequestOptions $requestOptions = null,
    ): VersionGetResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $versionID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): VersionGetResponse;

    /**
     * @api
     *
     * @param string $assistantID
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
     * @param TelephonySettings $telephonySettings
     * @param list<WebhookTool|RetrievalTool|HandoffTool|HangupTool|TransferTool|SipReferTool|DtmfTool> $tools The tools that the assistant can use. These may be templated with [dynamic variables](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables)
     * @param TranscriptionSettings $transcription
     * @param VoiceSettings $voiceSettings
     *
     * @throws APIException
     */
    public function update(
        string $versionID,
        $assistantID,
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
        $telephonySettings = omit,
        $tools = omit,
        $transcription = omit,
        $voiceSettings = omit,
        ?RequestOptions $requestOptions = null,
    ): VersionUpdateResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        string $versionID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): VersionUpdateResponse;

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
     * @param string $assistantID
     *
     * @throws APIException
     */
    public function delete(
        string $versionID,
        $assistantID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $versionID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param string $assistantID
     *
     * @throws APIException
     */
    public function promote(
        string $versionID,
        $assistantID,
        ?RequestOptions $requestOptions = null
    ): VersionPromoteResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function promoteRaw(
        string $versionID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): VersionPromoteResponse;
}
