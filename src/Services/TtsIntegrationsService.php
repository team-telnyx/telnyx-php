<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\TtsIntegrationsContract;
use Telnyx\Services\TtsIntegrations\ActionsService;
use Telnyx\TtsIntegrations\CommunityTtsAudioFormat;
use Telnyx\TtsIntegrations\CommunityTtsEngine;
use Telnyx\TtsIntegrations\CommunityTtsEngineCapabilities;
use Telnyx\TtsIntegrations\CommunityTtsEngineStatus;
use Telnyx\TtsIntegrations\CommunityTtsEngineVisibility;
use Telnyx\TtsIntegrations\TtsIntegrationGetConformanceRunsResponse;
use Telnyx\TtsIntegrations\TtsIntegrationGetDiscoverableResponse;
use Telnyx\TtsIntegrations\TtsIntegrationGetVoicesResponse;
use Telnyx\TtsIntegrations\TtsIntegrationListParams\Page;
use Telnyx\TtsIntegrations\TtsIntegrationListResponse;

/**
 * Register and manage text-to-speech (TTS) engines you publish, and find the public engines other organizations published, so an AI Assistant, TeXML or Call Control can speak with one of their voices, using your own key for it, instead of a Telnyx-integrated vendor.
 *
 * @phpstan-import-type PageShape from \Telnyx\TtsIntegrations\TtsIntegrationListParams\Page
 * @phpstan-import-type PageShape from \Telnyx\TtsIntegrations\TtsIntegrationRetrieveConformanceRunsParams\Page as PageShape1
 * @phpstan-import-type PageShape from \Telnyx\TtsIntegrations\TtsIntegrationRetrieveDiscoverableParams\Page as PageShape2
 * @phpstan-import-type CommunityTtsEngineCapabilitiesShape from \Telnyx\TtsIntegrations\CommunityTtsEngineCapabilities
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class TtsIntegrationsService implements TtsIntegrationsContract
{
    /**
     * @api
     */
    public TtsIntegrationsRawService $raw;

    /**
     * @api
     */
    public ActionsService $actions;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new TtsIntegrationsRawService($client);
        $this->actions = new ActionsService($client);
    }

    /**
     * @api
     *
     * Register a WebSocket text-to-speech engine. Telnyx reads the engine's `voices_url` while it registers the engine and refuses the registration with a `422` if the list is unreachable or invalid. The engine starts at `status: draft` and cannot serve other organizations' traffic until Telnyx approves it (your own organization can try it with its own key meanwhile). It is `visibility: private` unless you set `public`: a private engine can be used only by your organization, a public one by any organization once it is `active`. See the [Community TTS engines guide](/docs/voice/tts/community-engines) for the full review flow.
     *
     * `websocket_url` must be `wss://` and `voices_url` must be `https://`, both on a public host; a plain `ws://` URL is rejected, and so is a credential embedded in either. Callers bring their own key for your engine: Telnyx stores none, so there is nothing to register here for synthesis. `voices_api_key_ref` is optional and used only to read your voice list.
     *
     * @param CommunityTtsEngineCapabilities|CommunityTtsEngineCapabilitiesShape $capabilities What the engine supports. An unknown key is rejected.
     * @param string $name The engine's unique name, and the first part of its voices (`<name>.<voice_id>`). 1-64 characters: lowercase letters, digits, hyphens and underscores, starting with a letter or digit. Built-in vendor names and the generic voice names `male`, `female`, `man`, `woman`, `alice` and `custom` are reserved. Unique across all Telnyx accounts and cannot be changed later. A deleted engine's name stays reserved for the organization that owned it.
     * @param list<CommunityTtsAudioFormat|value-of<CommunityTtsAudioFormat>> $supportedAudioFormats the audio formats the engine can produce, at least one, without duplicates
     * @param string $voicesURL The `https://` URL of the engine's voice listing, with the same host rules. It answers `GET` with `{"voices": [{"provider", "name", "voice_id", "language", "gender"}]}`: at most 1000 voices, each `voice_id` unique and matching `^[A-Za-z0-9][A-Za-z0-9_-]{0,127}$`, each `language` at most 35 characters. Telnyx reads it when the engine is registered or updated, every 15 minutes, and on `refresh_voices`.
     * @param string $websocketURL The `wss://` URL Telnyx connects to. It must be reachable on the public internet: plain `ws://`, private, loopback, link-local, shared, documentation, multicast and reserved addresses, and internal hostnames are rejected, as are credentials embedded in the URL or in credential-looking query parameters. At most 2048 characters.
     * @param int $connectTimeoutMs How long Telnyx waits for the WebSocket connection to open, from 500 to 10000. Default: 3000.
     * @param string|Omitted|null $contactEmail A contact address stored for the Telnyx platform team. Telnyx does not email it automatically. At most 254 characters.
     * @param string|Omitted|null $dataRetentionPolicyURL URL of the publisher's data retention policy, at most 2048 characters. It is returned in the discoverable listing.
     * @param string|Omitted|null $documentationURL An `https://` page where callers learn how to get a key for the engine and how to use it, with a host and no credentials in it, at most 2048 characters. It is returned in the discoverable listing.
     * @param CommunityTtsEngineVisibility|value-of<CommunityTtsEngineVisibility> $visibility `private`: only your organization can use the engine. `public`: any organization can, once it is `active`.
     * @param string|Omitted|null $voicesAPIKeyRef The identifier of an Integration Secret in your organization. When set, Telnyx sends its value as a bearer token when it reads `voices_url`. It is never used for synthesis. Send `null` on an update to clear it. At most 255 characters.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        CommunityTtsEngineCapabilities|array $capabilities,
        string $name,
        array $supportedAudioFormats,
        string $voicesURL,
        string $websocketURL,
        int $connectTimeoutMs = 3000,
        string|Omitted|null $contactEmail = Omitted::VALUE,
        string|Omitted|null $dataRetentionPolicyURL = Omitted::VALUE,
        string|Omitted|null $documentationURL = Omitted::VALUE,
        CommunityTtsEngineVisibility|string|null $visibility = null,
        string|Omitted|null $voicesAPIKeyRef = Omitted::VALUE,
        RequestOptions|array|null $requestOptions = null,
    ): CommunityTtsEngine {
        $params = array_filter(
            [
                'capabilities' => $capabilities,
                'name' => $name,
                'supportedAudioFormats' => $supportedAudioFormats,
                'voicesURL' => $voicesURL,
                'websocketURL' => $websocketURL,
                'connectTimeoutMs' => $connectTimeoutMs,
                'contactEmail' => $contactEmail,
                'dataRetentionPolicyURL' => $dataRetentionPolicyURL,
                'documentationURL' => $documentationURL,
                'visibility' => $visibility ?? Omitted::VALUE,
                'voicesAPIKeyRef' => $voicesAPIKeyRef,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve one of your own community TTS engines by ID.
     *
     * @param string $id unique identifier of the community TTS engine
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): CommunityTtsEngine {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Same as `PUT`: only the fields you send change.
     *
     * @param string $id unique identifier of the community TTS engine
     * @param CommunityTtsEngineCapabilities|CommunityTtsEngineCapabilitiesShape $capabilities What the engine supports. An unknown key is rejected.
     * @param list<CommunityTtsAudioFormat|value-of<CommunityTtsAudioFormat>> $supportedAudioFormats
     * @param CommunityTtsEngineVisibility|value-of<CommunityTtsEngineVisibility> $visibility `private`: only your organization can use the engine. `public`: any organization can, once it is `active`.
     * @param string $voicesURL see the create request
     * @param string $websocketURL see the create request
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $id,
        CommunityTtsEngineCapabilities|array|null $capabilities = null,
        ?int $connectTimeoutMs = null,
        string|Omitted|null $contactEmail = Omitted::VALUE,
        string|Omitted|null $dataRetentionPolicyURL = Omitted::VALUE,
        string|Omitted|null $documentationURL = Omitted::VALUE,
        ?array $supportedAudioFormats = null,
        CommunityTtsEngineVisibility|string|null $visibility = null,
        string|Omitted|null $voicesAPIKeyRef = Omitted::VALUE,
        ?string $voicesURL = null,
        ?string $websocketURL = null,
        RequestOptions|array|null $requestOptions = null,
    ): CommunityTtsEngine {
        $params = array_filter(
            [
                'capabilities' => $capabilities ?? Omitted::VALUE,
                'connectTimeoutMs' => $connectTimeoutMs ?? Omitted::VALUE,
                'contactEmail' => $contactEmail,
                'dataRetentionPolicyURL' => $dataRetentionPolicyURL,
                'documentationURL' => $documentationURL,
                'supportedAudioFormats' => $supportedAudioFormats ?? Omitted::VALUE,
                'visibility' => $visibility ?? Omitted::VALUE,
                'voicesAPIKeyRef' => $voicesAPIKeyRef,
                'voicesURL' => $voicesURL ?? Omitted::VALUE,
                'websocketURL' => $websocketURL ?? Omitted::VALUE,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List every community TTS engine your organization has registered, at any status or visibility. Use `GET /tts_integrations/discoverable` instead to also see other organizations' public, active engines.
     *
     * @param Page|PageShape $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param CommunityTtsEngineStatus|value-of<CommunityTtsEngineStatus> $status filter by status
     * @param CommunityTtsEngineVisibility|value-of<CommunityTtsEngineVisibility> $visibility filter by visibility
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        Page|array|null $page = null,
        CommunityTtsEngineStatus|string|null $status = null,
        CommunityTtsEngineVisibility|string|null $visibility = null,
        RequestOptions|array|null $requestOptions = null,
    ): TtsIntegrationListResponse {
        $params = array_filter(
            [
                'page' => $page ?? Omitted::VALUE,
                'status' => $status ?? Omitted::VALUE,
                'visibility' => $visibility ?? Omitted::VALUE,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete one of your own community TTS engines. The engine disappears from every listing and lookup and can no longer serve traffic, but its `name` stays reserved for your organization: no other organization can register it, and you can register it again later. An assistant or call still configured with one of its voices cannot use it until an engine with that name exists again.
     *
     * @param string $id unique identifier of the community TTS engine
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Change one of your own community TTS engines. Every field is optional: omit a field to leave it unchanged. `name` cannot be changed. Telnyx reads the `voices_url` again and refuses an update that leaves the engine with an unreadable list. Changing `websocket_url`, `voices_url`, `supported_audio_formats` or `capabilities`, or making a `private` engine `public`, sends the engine back to `status: draft` and clears its review. See the [Community TTS engines guide](/docs/voice/tts/community-engines) for the full review flow.
     *
     * @param string $id unique identifier of the community TTS engine
     * @param CommunityTtsEngineCapabilities|CommunityTtsEngineCapabilitiesShape $capabilities What the engine supports. An unknown key is rejected.
     * @param list<CommunityTtsAudioFormat|value-of<CommunityTtsAudioFormat>> $supportedAudioFormats
     * @param CommunityTtsEngineVisibility|value-of<CommunityTtsEngineVisibility> $visibility `private`: only your organization can use the engine. `public`: any organization can, once it is `active`.
     * @param string $voicesURL see the create request
     * @param string $websocketURL see the create request
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function replace(
        string $id,
        CommunityTtsEngineCapabilities|array|null $capabilities = null,
        ?int $connectTimeoutMs = null,
        string|Omitted|null $contactEmail = Omitted::VALUE,
        string|Omitted|null $dataRetentionPolicyURL = Omitted::VALUE,
        string|Omitted|null $documentationURL = Omitted::VALUE,
        ?array $supportedAudioFormats = null,
        CommunityTtsEngineVisibility|string|null $visibility = null,
        string|Omitted|null $voicesAPIKeyRef = Omitted::VALUE,
        ?string $voicesURL = null,
        ?string $websocketURL = null,
        RequestOptions|array|null $requestOptions = null,
    ): CommunityTtsEngine {
        $params = array_filter(
            [
                'capabilities' => $capabilities ?? Omitted::VALUE,
                'connectTimeoutMs' => $connectTimeoutMs ?? Omitted::VALUE,
                'contactEmail' => $contactEmail,
                'dataRetentionPolicyURL' => $dataRetentionPolicyURL,
                'documentationURL' => $documentationURL,
                'supportedAudioFormats' => $supportedAudioFormats ?? Omitted::VALUE,
                'visibility' => $visibility ?? Omitted::VALUE,
                'voicesAPIKeyRef' => $voicesAPIKeyRef,
                'voicesURL' => $voicesURL ?? Omitted::VALUE,
                'websocketURL' => $websocketURL ?? Omitted::VALUE,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->replace($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * The recorded runs of `test_connection` for one of your engines, newest first. Telnyx keeps the latest 50.
     *
     * @param string $id unique identifier of the community TTS engine
     * @param \Telnyx\TtsIntegrations\TtsIntegrationRetrieveConformanceRunsParams\Page|PageShape1 $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveConformanceRuns(
        string $id,
        \Telnyx\TtsIntegrations\TtsIntegrationRetrieveConformanceRunsParams\Page|array|null $page = null,
        RequestOptions|array|null $requestOptions = null,
    ): TtsIntegrationGetConformanceRunsResponse {
        $params = array_filter(
            ['page' => $page ?? Omitted::VALUE],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveConformanceRuns($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List the engines you can use: your own, at any status, and other organizations' engines that are `public` and `active`. Each entry carries what a caller needs to choose an engine: its `name` (the first part of its voices, `<name>.<voice_id>`), `voices_count`, audio formats, capabilities, and `documentation_url`. It never carries the publisher's contact details, review notes, or `voices_api_key_ref`. Read an engine's voices with `GET /tts_integrations/{id}/voices`.
     *
     * @param \Telnyx\TtsIntegrations\TtsIntegrationRetrieveDiscoverableParams\Page|PageShape2 $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param CommunityTtsEngineStatus|value-of<CommunityTtsEngineStatus> $status filter by status
     * @param CommunityTtsEngineVisibility|value-of<CommunityTtsEngineVisibility> $visibility filter by visibility
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveDiscoverable(
        \Telnyx\TtsIntegrations\TtsIntegrationRetrieveDiscoverableParams\Page|array|null $page = null,
        CommunityTtsEngineStatus|string|null $status = null,
        CommunityTtsEngineVisibility|string|null $visibility = null,
        RequestOptions|array|null $requestOptions = null,
    ): TtsIntegrationGetDiscoverableResponse {
        $params = array_filter(
            [
                'page' => $page ?? Omitted::VALUE,
                'status' => $status ?? Omitted::VALUE,
                'visibility' => $visibility ?? Omitted::VALUE,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveDiscoverable(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * The voices Telnyx last read from the engine's `voices_url`, in the shape the engine published. A caller selects one as `<engine name>.<voice_id>`. The list is replaced only when a new read succeeds, so an engine whose `voices_url` is down keeps serving its last list. `[]` until the first read succeeds.
     *
     * @param string $id unique identifier of the community TTS engine
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveVoices(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): TtsIntegrationGetVoicesResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveVoices($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
