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
use Telnyx\AI\Assistants\Versions\VersionDeleteParams;
use Telnyx\AI\Assistants\Versions\VersionPromoteParams;
use Telnyx\AI\Assistants\Versions\VersionRetrieveParams;
use Telnyx\AI\Assistants\Versions\VersionUpdateParams;
use Telnyx\AI\Assistants\VoiceSettings;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Assistants\VersionsContract;

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
     * @param array{
     *   assistant_id: string, include_mcp_servers?: bool
     * }|VersionRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        string $versionID,
        array|VersionRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): InferenceEmbedding {
        [$parsed, $options] = VersionRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );
        $assistantID = $parsed['assistant_id'];
        unset($parsed['assistant_id']);

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
     * @param array{
     *   assistant_id: string,
     *   description?: string,
     *   dynamic_variables?: array<string,mixed>,
     *   dynamic_variables_webhook_url?: string,
     *   enabled_features?: list<"telephony"|"messaging"|EnabledFeatures>,
     *   greeting?: string,
     *   insight_settings?: array{insight_group_id?: string}|InsightSettings,
     *   instructions?: string,
     *   llm_api_key_ref?: string,
     *   messaging_settings?: array{
     *     default_messaging_profile_id?: string, delivery_status_webhook_url?: string
     *   }|MessagingSettings,
     *   model?: string,
     *   name?: string,
     *   privacy_settings?: array{data_retention?: bool}|PrivacySettings,
     *   telephony_settings?: array{
     *     default_texml_app_id?: string, supports_unauthenticated_web_calls?: bool
     *   }|TelephonySettings,
     *   tools?: list<AssistantTool|array<string,mixed>>,
     *   transcription?: array{
     *     language?: string,
     *     model?: "deepgram/flux"|"deepgram/nova-3"|"deepgram/nova-2"|"azure/fast"|"distil-whisper/distil-large-v2"|"openai/whisper-large-v3-turbo",
     *     region?: string,
     *     settings?: array{
     *       eot_threshold?: float,
     *       eot_timeout_ms?: int,
     *       numerals?: bool,
     *       smart_format?: bool,
     *     },
     *   }|TranscriptionSettings,
     *   voice_settings?: array{
     *     voice: string,
     *     api_key_ref?: string,
     *     background_audio?: array<string,mixed>,
     *     voice_speed?: float,
     *   }|VoiceSettings,
     * }|VersionUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $versionID,
        array|VersionUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): InferenceEmbedding {
        [$parsed, $options] = VersionUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $assistantID = $parsed['assistant_id'];
        unset($parsed['assistant_id']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['ai/assistants/%1$s/versions/%2$s', $assistantID, $versionID],
            body: (object) array_diff_key($parsed, ['assistant_id']),
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
     * @param array{assistant_id: string}|VersionDeleteParams $params
     *
     * @throws APIException
     */
    public function delete(
        string $versionID,
        array|VersionDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = VersionDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $assistantID = $parsed['assistant_id'];
        unset($parsed['assistant_id']);

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
     * @param array{assistant_id: string}|VersionPromoteParams $params
     *
     * @throws APIException
     */
    public function promote(
        string $versionID,
        array|VersionPromoteParams $params,
        ?RequestOptions $requestOptions = null,
    ): InferenceEmbedding {
        [$parsed, $options] = VersionPromoteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $assistantID = $parsed['assistant_id'];
        unset($parsed['assistant_id']);

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
