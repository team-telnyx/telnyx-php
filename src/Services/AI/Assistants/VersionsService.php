<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Assistants;

use Telnyx\AI\Assistants\AssistantsList;
use Telnyx\AI\Assistants\EnabledFeatures;
use Telnyx\AI\Assistants\InferenceEmbedding;
use Telnyx\AI\Assistants\InsightSettings;
use Telnyx\AI\Assistants\MessagingSettings;
use Telnyx\AI\Assistants\PrivacySettings;
use Telnyx\AI\Assistants\TelephonySettings;
use Telnyx\AI\Assistants\TranscriptionSettings;
use Telnyx\AI\Assistants\VoiceSettings;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Assistants\VersionsContract;

/**
 * @phpstan-import-type InsightSettingsShape from \Telnyx\AI\Assistants\InsightSettings
 * @phpstan-import-type MessagingSettingsShape from \Telnyx\AI\Assistants\MessagingSettings
 * @phpstan-import-type PrivacySettingsShape from \Telnyx\AI\Assistants\PrivacySettings
 * @phpstan-import-type TelephonySettingsShape from \Telnyx\AI\Assistants\TelephonySettings
 * @phpstan-import-type AssistantToolShape from \Telnyx\AI\Assistants\AssistantTool
 * @phpstan-import-type TranscriptionSettingsShape from \Telnyx\AI\Assistants\TranscriptionSettings
 * @phpstan-import-type VoiceSettingsShape from \Telnyx\AI\Assistants\VoiceSettings
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class VersionsService implements VersionsContract
{
    /**
     * @api
     */
    public VersionsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new VersionsRawService($client);
    }

    /**
     * @api
     *
     * Retrieves a specific version of an assistant by assistant_id and version_id
     *
     * @param string $versionID Path param:
     * @param string $assistantID Path param:
     * @param bool $includeMcpServers Query param:
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $versionID,
        string $assistantID,
        ?bool $includeMcpServers = null,
        RequestOptions|array|null $requestOptions = null,
    ): InferenceEmbedding {
        $params = Util::removeNulls(
            ['assistantID' => $assistantID, 'includeMcpServers' => $includeMcpServers]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($versionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Updates the configuration of a specific assistant version. Can not update main version
     *
     * @param string $versionID Path param:
     * @param string $assistantID Path param:
     * @param string $description Body param:
     * @param array<string,mixed> $dynamicVariables Body param: Map of dynamic variables and their default values
     * @param string $dynamicVariablesWebhookURL Body param: If the dynamic_variables_webhook_url is set for the assistant, we will send a request at the start of the conversation. See our [guide](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables) for more information.
     * @param list<EnabledFeatures|value-of<EnabledFeatures>> $enabledFeatures Body param:
     * @param string $greeting Body param: Text that the assistant will use to start the conversation. This may be templated with [dynamic variables](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables)
     * @param InsightSettings|InsightSettingsShape $insightSettings Body param:
     * @param string $instructions Body param: System instructions for the assistant. These may be templated with [dynamic variables](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables)
     * @param string $llmAPIKeyRef Body param: This is only needed when using third-party inference providers. The `identifier` for an integration secret [/v2/integration_secrets](https://developers.telnyx.com/api/secrets-manager/integration-secrets/create-integration-secret) that refers to your LLM provider's API key. Warning: Free plans are unlikely to work with this integration.
     * @param MessagingSettings|MessagingSettingsShape $messagingSettings Body param:
     * @param string $model Body param: ID of the model to use. You can use the [Get models API](https://developers.telnyx.com/api/inference/inference-embedding/get-models-public-models-get) to see all of your available models,
     * @param string $name Body param:
     * @param PrivacySettings|PrivacySettingsShape $privacySettings Body param:
     * @param TelephonySettings|TelephonySettingsShape $telephonySettings Body param:
     * @param list<AssistantToolShape> $tools Body param: The tools that the assistant can use. These may be templated with [dynamic variables](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables)
     * @param TranscriptionSettings|TranscriptionSettingsShape $transcription Body param:
     * @param VoiceSettings|VoiceSettingsShape $voiceSettings Body param:
     * @param RequestOpts|null $requestOptions
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
        InsightSettings|array|null $insightSettings = null,
        ?string $instructions = null,
        ?string $llmAPIKeyRef = null,
        MessagingSettings|array|null $messagingSettings = null,
        ?string $model = null,
        ?string $name = null,
        PrivacySettings|array|null $privacySettings = null,
        TelephonySettings|array|null $telephonySettings = null,
        ?array $tools = null,
        TranscriptionSettings|array|null $transcription = null,
        VoiceSettings|array|null $voiceSettings = null,
        RequestOptions|array|null $requestOptions = null,
    ): InferenceEmbedding {
        $params = Util::removeNulls(
            [
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
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($versionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieves all versions of a specific assistant with complete configuration and metadata
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $assistantID,
        RequestOptions|array|null $requestOptions = null
    ): AssistantsList {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($assistantID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Permanently removes a specific version of an assistant. Can not delete main version
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $versionID,
        string $assistantID,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(['assistantID' => $assistantID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($versionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Promotes a specific version to be the main/current version of the assistant. This will delete any existing canary deploy configuration and send all live production traffic to this version.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function promote(
        string $versionID,
        string $assistantID,
        RequestOptions|array|null $requestOptions = null,
    ): InferenceEmbedding {
        $params = Util::removeNulls(['assistantID' => $assistantID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->promote($versionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
