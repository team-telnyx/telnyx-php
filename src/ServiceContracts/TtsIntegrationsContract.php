<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\RequestOptions;
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
 * @phpstan-import-type PageShape from \Telnyx\TtsIntegrations\TtsIntegrationListParams\Page
 * @phpstan-import-type PageShape from \Telnyx\TtsIntegrations\TtsIntegrationRetrieveConformanceRunsParams\Page as PageShape1
 * @phpstan-import-type PageShape from \Telnyx\TtsIntegrations\TtsIntegrationRetrieveDiscoverableParams\Page as PageShape2
 * @phpstan-import-type CommunityTtsEngineCapabilitiesShape from \Telnyx\TtsIntegrations\CommunityTtsEngineCapabilities
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface TtsIntegrationsContract
{
    /**
     * @api
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
    ): CommunityTtsEngine;

    /**
     * @api
     *
     * @param string $id unique identifier of the community TTS engine
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): CommunityTtsEngine;

    /**
     * @api
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
    ): CommunityTtsEngine;

    /**
     * @api
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
    ): TtsIntegrationListResponse;

    /**
     * @api
     *
     * @param string $id unique identifier of the community TTS engine
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
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
    ): CommunityTtsEngine;

    /**
     * @api
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
    ): TtsIntegrationGetConformanceRunsResponse;

    /**
     * @api
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
    ): TtsIntegrationGetDiscoverableResponse;

    /**
     * @api
     *
     * @param string $id unique identifier of the community TTS engine
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveVoices(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): TtsIntegrationGetVoicesResponse;
}
