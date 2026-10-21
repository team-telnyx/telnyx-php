<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\TtsIntegrationsRawContract;
use Telnyx\TtsIntegrations\CommunityTtsAudioFormat;
use Telnyx\TtsIntegrations\CommunityTtsEngine;
use Telnyx\TtsIntegrations\CommunityTtsEngineCapabilities;
use Telnyx\TtsIntegrations\CommunityTtsEngineStatus;
use Telnyx\TtsIntegrations\CommunityTtsEngineVisibility;
use Telnyx\TtsIntegrations\TtsIntegrationCreateParams;
use Telnyx\TtsIntegrations\TtsIntegrationGetConformanceRunsResponse;
use Telnyx\TtsIntegrations\TtsIntegrationGetDiscoverableResponse;
use Telnyx\TtsIntegrations\TtsIntegrationGetVoicesResponse;
use Telnyx\TtsIntegrations\TtsIntegrationListParams;
use Telnyx\TtsIntegrations\TtsIntegrationListParams\Page;
use Telnyx\TtsIntegrations\TtsIntegrationListResponse;
use Telnyx\TtsIntegrations\TtsIntegrationReplaceParams;
use Telnyx\TtsIntegrations\TtsIntegrationRetrieveConformanceRunsParams;
use Telnyx\TtsIntegrations\TtsIntegrationRetrieveDiscoverableParams;
use Telnyx\TtsIntegrations\TtsIntegrationUpdateParams;

/**
 * Register and manage text-to-speech (TTS) engines you publish, and find the public engines other organizations published, so an AI Assistant, TeXML or Call Control can speak with one of their voices, using your own key for it, instead of a Telnyx-integrated vendor.
 *
 * @phpstan-import-type PageShape from \Telnyx\TtsIntegrations\TtsIntegrationListParams\Page
 * @phpstan-import-type PageShape from \Telnyx\TtsIntegrations\TtsIntegrationRetrieveConformanceRunsParams\Page as PageShape1
 * @phpstan-import-type PageShape from \Telnyx\TtsIntegrations\TtsIntegrationRetrieveDiscoverableParams\Page as PageShape2
 * @phpstan-import-type CommunityTtsEngineCapabilitiesShape from \Telnyx\TtsIntegrations\CommunityTtsEngineCapabilities
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class TtsIntegrationsRawService implements TtsIntegrationsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Register a WebSocket text-to-speech engine. Telnyx reads the engine's `voices_url` while it registers the engine and refuses the registration with a `422` if the list is unreachable or invalid. The engine starts at `status: draft` and cannot serve other organizations' traffic until Telnyx approves it (your own organization can try it with its own key meanwhile). It is `visibility: private` unless you set `public`: a private engine can be used only by your organization, a public one by any organization once it is `active`. See the [Community TTS engines guide](/docs/voice/tts/community-engines) for the full review flow.
     *
     * `websocket_url` must be `wss://` and `voices_url` must be `https://`, both on a public host; a plain `ws://` URL is rejected, and so is a credential embedded in either. Callers bring their own key for your engine: Telnyx stores none, so there is nothing to register here for synthesis. `voices_api_key_ref` is optional and used only to read your voice list.
     *
     * @param array{
     *   capabilities: CommunityTtsEngineCapabilities|CommunityTtsEngineCapabilitiesShape,
     *   name: string,
     *   supportedAudioFormats: list<CommunityTtsAudioFormat|value-of<CommunityTtsAudioFormat>>,
     *   voicesURL: string,
     *   websocketURL: string,
     *   connectTimeoutMs?: int,
     *   contactEmail?: string|null,
     *   dataRetentionPolicyURL?: string|null,
     *   documentationURL?: string|null,
     *   visibility?: CommunityTtsEngineVisibility|value-of<CommunityTtsEngineVisibility>,
     *   voicesAPIKeyRef?: string|null,
     * }|TtsIntegrationCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CommunityTtsEngine>
     *
     * @throws APIException
     */
    public function create(
        array|TtsIntegrationCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TtsIntegrationCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'tts_integrations',
            body: (object) $parsed,
            options: $options,
            convert: CommunityTtsEngine::class,
        );
    }

    /**
     * @api
     *
     * Retrieve one of your own community TTS engines by ID.
     *
     * @param string $id unique identifier of the community TTS engine
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CommunityTtsEngine>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['tts_integrations/%1$s', $id],
            options: $requestOptions,
            convert: CommunityTtsEngine::class,
        );
    }

    /**
     * @api
     *
     * Same as `PUT`: only the fields you send change.
     *
     * @param string $id unique identifier of the community TTS engine
     * @param array{
     *   capabilities?: CommunityTtsEngineCapabilities|CommunityTtsEngineCapabilitiesShape,
     *   connectTimeoutMs?: int,
     *   contactEmail?: string|null,
     *   dataRetentionPolicyURL?: string|null,
     *   documentationURL?: string|null,
     *   supportedAudioFormats?: list<CommunityTtsAudioFormat|value-of<CommunityTtsAudioFormat>>,
     *   visibility?: CommunityTtsEngineVisibility|value-of<CommunityTtsEngineVisibility>,
     *   voicesAPIKeyRef?: string|null,
     *   voicesURL?: string,
     *   websocketURL?: string,
     * }|TtsIntegrationUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CommunityTtsEngine>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|TtsIntegrationUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TtsIntegrationUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['tts_integrations/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: CommunityTtsEngine::class,
        );
    }

    /**
     * @api
     *
     * List every community TTS engine your organization has registered, at any status or visibility. Use `GET /tts_integrations/discoverable` instead to also see other organizations' public, active engines.
     *
     * @param array{
     *   page?: Page|PageShape,
     *   status?: CommunityTtsEngineStatus|value-of<CommunityTtsEngineStatus>,
     *   visibility?: CommunityTtsEngineVisibility|value-of<CommunityTtsEngineVisibility>,
     * }|TtsIntegrationListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TtsIntegrationListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|TtsIntegrationListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TtsIntegrationListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'tts_integrations',
            query: $parsed,
            options: $options,
            convert: TtsIntegrationListResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete one of your own community TTS engines. The engine disappears from every listing and lookup and can no longer serve traffic, but its `name` stays reserved for your organization: no other organization can register it, and you can register it again later. An assistant or call still configured with one of its voices cannot use it until an engine with that name exists again.
     *
     * @param string $id unique identifier of the community TTS engine
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['tts_integrations/%1$s', $id],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Change one of your own community TTS engines. Every field is optional: omit a field to leave it unchanged. `name` cannot be changed. Telnyx reads the `voices_url` again and refuses an update that leaves the engine with an unreadable list. Changing `websocket_url`, `voices_url`, `supported_audio_formats` or `capabilities`, or making a `private` engine `public`, sends the engine back to `status: draft` and clears its review. See the [Community TTS engines guide](/docs/voice/tts/community-engines) for the full review flow.
     *
     * @param string $id unique identifier of the community TTS engine
     * @param array{
     *   capabilities?: CommunityTtsEngineCapabilities|CommunityTtsEngineCapabilitiesShape,
     *   connectTimeoutMs?: int,
     *   contactEmail?: string|null,
     *   dataRetentionPolicyURL?: string|null,
     *   documentationURL?: string|null,
     *   supportedAudioFormats?: list<CommunityTtsAudioFormat|value-of<CommunityTtsAudioFormat>>,
     *   visibility?: CommunityTtsEngineVisibility|value-of<CommunityTtsEngineVisibility>,
     *   voicesAPIKeyRef?: string|null,
     *   voicesURL?: string,
     *   websocketURL?: string,
     * }|TtsIntegrationReplaceParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CommunityTtsEngine>
     *
     * @throws APIException
     */
    public function replace(
        string $id,
        array|TtsIntegrationReplaceParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TtsIntegrationReplaceParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['tts_integrations/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: CommunityTtsEngine::class,
        );
    }

    /**
     * @api
     *
     * The recorded runs of `test_connection` for one of your engines, newest first. Telnyx keeps the latest 50.
     *
     * @param string $id unique identifier of the community TTS engine
     * @param array{
     *   page?: TtsIntegrationRetrieveConformanceRunsParams\Page|PageShape1,
     * }|TtsIntegrationRetrieveConformanceRunsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TtsIntegrationGetConformanceRunsResponse>
     *
     * @throws APIException
     */
    public function retrieveConformanceRuns(
        string $id,
        array|TtsIntegrationRetrieveConformanceRunsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TtsIntegrationRetrieveConformanceRunsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['tts_integrations/%1$s/conformance_runs', $id],
            query: $parsed,
            options: $options,
            convert: TtsIntegrationGetConformanceRunsResponse::class,
        );
    }

    /**
     * @api
     *
     * List the engines you can use: your own, at any status, and other organizations' engines that are `public` and `active`. Each entry carries what a caller needs to choose an engine: its `name` (the first part of its voices, `<name>.<voice_id>`), `voices_count`, audio formats, capabilities, and `documentation_url`. It never carries the publisher's contact details, review notes, or `voices_api_key_ref`. Read an engine's voices with `GET /tts_integrations/{id}/voices`.
     *
     * @param array{
     *   page?: TtsIntegrationRetrieveDiscoverableParams\Page|PageShape2,
     *   status?: CommunityTtsEngineStatus|value-of<CommunityTtsEngineStatus>,
     *   visibility?: CommunityTtsEngineVisibility|value-of<CommunityTtsEngineVisibility>,
     * }|TtsIntegrationRetrieveDiscoverableParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TtsIntegrationGetDiscoverableResponse>
     *
     * @throws APIException
     */
    public function retrieveDiscoverable(
        array|TtsIntegrationRetrieveDiscoverableParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TtsIntegrationRetrieveDiscoverableParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'tts_integrations/discoverable',
            query: $parsed,
            options: $options,
            convert: TtsIntegrationGetDiscoverableResponse::class,
        );
    }

    /**
     * @api
     *
     * The voices Telnyx last read from the engine's `voices_url`, in the shape the engine published. A caller selects one as `<engine name>.<voice_id>`. The list is replaced only when a new read succeeds, so an engine whose `voices_url` is down keeps serving its last list. `[]` until the first read succeeds.
     *
     * @param string $id unique identifier of the community TTS engine
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TtsIntegrationGetVoicesResponse>
     *
     * @throws APIException
     */
    public function retrieveVoices(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['tts_integrations/%1$s/voices', $id],
            options: $requestOptions,
            convert: TtsIntegrationGetVoicesResponse::class,
        );
    }
}
