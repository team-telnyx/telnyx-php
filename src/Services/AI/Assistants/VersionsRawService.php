<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Assistants;

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
use Telnyx\AI\Assistants\Versions\VersionDeleteParams;
use Telnyx\AI\Assistants\Versions\VersionPromoteParams;
use Telnyx\AI\Assistants\Versions\VersionRetrieveParams;
use Telnyx\AI\Assistants\Versions\VersionUpdateParams;
use Telnyx\AI\Assistants\VoiceSettings;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Assistants\VersionsRawContract;

final class VersionsRawService implements VersionsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieves a specific version of an assistant by assistant_id and version_id
     *
     * @param string $versionID Path param:
     * @param array{
     *   assistantID: string, includeMcpServers?: bool
     * }|VersionRetrieveParams $params
     *
     * @return BaseResponse<InferenceEmbedding>
     *
     * @throws APIException
     */
    public function retrieve(
        string $versionID,
        array|VersionRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = VersionRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );
        $assistantID = $parsed['assistantID'];
        unset($parsed['assistantID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['ai/assistants/%1$s/versions/%2$s', $assistantID, $versionID],
            query: Util::array_transform_keys(
                $parsed,
                ['includeMcpServers' => 'include_mcp_servers']
            ),
            options: $options,
            convert: InferenceEmbedding::class,
        );
    }

    /**
     * @api
     *
     * Updates the configuration of a specific assistant version. Can not update main version
     *
     * @param string $versionID Path param:
     * @param array{
     *   assistantID: string,
     *   description?: string,
     *   dynamicVariables?: array<string,mixed>,
     *   dynamicVariablesWebhookURL?: string,
     *   enabledFeatures?: list<'telephony'|'messaging'|EnabledFeatures>,
     *   greeting?: string,
     *   insightSettings?: array{insightGroupID?: string}|InsightSettings,
     *   instructions?: string,
     *   llmAPIKeyRef?: string,
     *   messagingSettings?: array{
     *     defaultMessagingProfileID?: string, deliveryStatusWebhookURL?: string
     *   }|MessagingSettings,
     *   model?: string,
     *   name?: string,
     *   privacySettings?: array{dataRetention?: bool}|PrivacySettings,
     *   telephonySettings?: array{
     *     defaultTexmlAppID?: string, supportsUnauthenticatedWebCalls?: bool
     *   }|TelephonySettings,
     *   tools?: list<AssistantTool|array<string,mixed>>,
     *   transcription?: array{
     *     language?: string,
     *     model?: 'deepgram/flux'|'deepgram/nova-3'|'deepgram/nova-2'|'azure/fast'|'distil-whisper/distil-large-v2'|'openai/whisper-large-v3-turbo'|Model,
     *     region?: string,
     *     settings?: array<mixed>|TranscriptionSettingsConfig,
     *   }|TranscriptionSettings,
     *   voiceSettings?: array{
     *     voice: string,
     *     apiKeyRef?: string,
     *     backgroundAudio?: array<string,mixed>,
     *     voiceSpeed?: float,
     *   }|VoiceSettings,
     * }|VersionUpdateParams $params
     *
     * @return BaseResponse<InferenceEmbedding>
     *
     * @throws APIException
     */
    public function update(
        string $versionID,
        array|VersionUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = VersionUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $assistantID = $parsed['assistantID'];
        unset($parsed['assistantID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['ai/assistants/%1$s/versions/%2$s', $assistantID, $versionID],
            body: (object) array_diff_key($parsed, array_flip(['assistantID'])),
            options: $options,
            convert: InferenceEmbedding::class,
        );
    }

    /**
     * @api
     *
     * Retrieves all versions of a specific assistant with complete configuration and metadata
     *
     * @return BaseResponse<AssistantsList>
     *
     * @throws APIException
     */
    public function list(
        string $assistantID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * @param array{assistantID: string}|VersionDeleteParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $versionID,
        array|VersionDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = VersionDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $assistantID = $parsed['assistantID'];
        unset($parsed['assistantID']);

        // @phpstan-ignore-next-line return.type
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
     * @param array{assistantID: string}|VersionPromoteParams $params
     *
     * @return BaseResponse<InferenceEmbedding>
     *
     * @throws APIException
     */
    public function promote(
        string $versionID,
        array|VersionPromoteParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = VersionPromoteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $assistantID = $parsed['assistantID'];
        unset($parsed['assistantID']);

        // @phpstan-ignore-next-line return.type
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
