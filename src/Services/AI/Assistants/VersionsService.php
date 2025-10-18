<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Assistants;

use Telnyx\AI\Assistants\AssistantsList;
use Telnyx\AI\Assistants\AssistantTool\DtmfTool;
use Telnyx\AI\Assistants\AssistantTool\HandoffTool;
use Telnyx\AI\Assistants\AssistantTool\SipReferTool;
use Telnyx\AI\Assistants\EnabledFeatures;
use Telnyx\AI\Assistants\HangupTool;
use Telnyx\AI\Assistants\InferenceEmbedding;
use Telnyx\AI\Assistants\InsightSettings;
use Telnyx\AI\Assistants\MessagingSettings;
use Telnyx\AI\Assistants\PrivacySettings;
use Telnyx\AI\Assistants\RetrievalTool;
use Telnyx\AI\Assistants\TelephonySettings;
use Telnyx\AI\Assistants\TranscriptionSettings;
use Telnyx\AI\Assistants\TransferTool;
use Telnyx\AI\Assistants\Versions\VersionDeleteParams;
use Telnyx\AI\Assistants\Versions\VersionPromoteParams;
use Telnyx\AI\Assistants\Versions\VersionRetrieveParams;
use Telnyx\AI\Assistants\Versions\VersionUpdateParams;
use Telnyx\AI\Assistants\VoiceSettings;
use Telnyx\AI\Assistants\WebhookTool;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Assistants\VersionsContract;

use const Telnyx\Core\OMIT as omit;

final class VersionsService implements VersionsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieves a specific version of an assistant by assistant_id and version_id
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
    ): InferenceEmbedding {
        $params = [
            'assistantID' => $assistantID, 'includeMcpServers' => $includeMcpServers,
        ];

        return $this->retrieveRaw($versionID, $params, $requestOptions);
    }

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
    ): InferenceEmbedding {
        [$parsed, $options] = VersionRetrieveParams::parseRequest(
            $params,
            $requestOptions
        );
        $assistantID = $parsed['assistantID'];
        unset($parsed['assistantID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['ai/assistants/%1$s/versions/%2$s', $assistantID, $versionID],
            query: $parsed,
            options: $options,
            convert: InferenceEmbedding::class,
        );
    }

    /**
     * @api
     *
     * Updates the configuration of a specific assistant version. Can not update main version
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
    ): InferenceEmbedding {
        $params = [
            'assistantID' => $assistantID,
            'description' => $description,
            'dynamicVariables' => $dynamicVariables,
            'dynamicVariablesWebhookURL' => $dynamicVariablesWebhookURL,
            'enabledFeatures' => $enabledFeatures,
            'greeting' => $greeting,
            'insightSettings' => $insightSettings,
            'instructions' => $instructions,
            'llmAPIKeyRef' => $llmAPIKeyRef,
            'messagingSettings' => $messagingSettings,
            'model' => $model,
            'name' => $name,
            'privacySettings' => $privacySettings,
            'telephonySettings' => $telephonySettings,
            'tools' => $tools,
            'transcription' => $transcription,
            'voiceSettings' => $voiceSettings,
        ];

        return $this->updateRaw($versionID, $params, $requestOptions);
    }

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
    ): InferenceEmbedding {
        [$parsed, $options] = VersionUpdateParams::parseRequest(
            $params,
            $requestOptions
        );
        $assistantID = $parsed['assistantID'];
        unset($parsed['assistantID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['ai/assistants/%1$s/versions/%2$s', $assistantID, $versionID],
            body: (object) array_diff_key($parsed, ['assistantID']),
            options: $options,
            convert: InferenceEmbedding::class,
        );
    }

    /**
     * @api
     *
     * Retrieves all versions of a specific assistant with complete configuration and metadata
     *
     * @throws APIException
     */
    public function list(
        string $assistantID,
        ?RequestOptions $requestOptions = null
    ): AssistantsList {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['ai/assistants/%1$s/versions', $assistantID],
            options: $requestOptions,
            convert: AssistantsList::class,
        );
    }

    /**
     * @api
     *
     * Permanently removes a specific version of an assistant. Can not delete main version
     *
     * @param string $assistantID
     *
     * @throws APIException
     */
    public function delete(
        string $versionID,
        $assistantID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['assistantID' => $assistantID];

        return $this->deleteRaw($versionID, $params, $requestOptions);
    }

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
    ): mixed {
        [$parsed, $options] = VersionDeleteParams::parseRequest(
            $params,
            $requestOptions
        );
        $assistantID = $parsed['assistantID'];
        unset($parsed['assistantID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['ai/assistants/%1$s/versions/%2$s', $assistantID, $versionID],
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Promotes a specific version to be the main/current version of the assistant. This will delete any existing canary deploy configuration and send all live production traffic to this version.
     *
     * @param string $assistantID
     *
     * @throws APIException
     */
    public function promote(
        string $versionID,
        $assistantID,
        ?RequestOptions $requestOptions = null
    ): InferenceEmbedding {
        $params = ['assistantID' => $assistantID];

        return $this->promoteRaw($versionID, $params, $requestOptions);
    }

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
    ): InferenceEmbedding {
        [$parsed, $options] = VersionPromoteParams::parseRequest(
            $params,
            $requestOptions
        );
        $assistantID = $parsed['assistantID'];
        unset($parsed['assistantID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: [
                'ai/assistants/%1$s/versions/%2$s/promote', $assistantID, $versionID,
            ],
            options: $options,
            convert: InferenceEmbedding::class,
        );
    }
}
