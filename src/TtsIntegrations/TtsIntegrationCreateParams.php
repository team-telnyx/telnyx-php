<?php

declare(strict_types=1);

namespace Telnyx\TtsIntegrations;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * Register a WebSocket text-to-speech engine. Telnyx reads the engine's `voices_url` while it registers the engine and refuses the registration with a `422` if the list is unreachable or invalid. The engine starts at `status: draft` and cannot serve other organizations' traffic until Telnyx approves it (your own organization can try it with its own key meanwhile). It is `visibility: private` unless you set `public`: a private engine can be used only by your organization, a public one by any organization once it is `active`. See the [Community TTS engines guide](/docs/voice/tts/community-engines) for the full review flow.
 *
 * `websocket_url` must be `wss://` and `voices_url` must be `https://`, both on a public host; a plain `ws://` URL is rejected, and so is a credential embedded in either. Callers bring their own key for your engine: Telnyx stores none, so there is nothing to register here for synthesis. `voices_api_key_ref` is optional and used only to read your voice list.
 *
 * @see Telnyx\Services\TtsIntegrationsService::create()
 *
 * @phpstan-import-type CommunityTtsEngineCapabilitiesShape from \Telnyx\TtsIntegrations\CommunityTtsEngineCapabilities
 *
 * @phpstan-type TtsIntegrationCreateParamsShape = array{
 *   capabilities: CommunityTtsEngineCapabilities|CommunityTtsEngineCapabilitiesShape,
 *   name: string,
 *   supportedAudioFormats: list<CommunityTtsAudioFormat|value-of<CommunityTtsAudioFormat>>,
 *   voicesURL: string,
 *   websocketURL: string,
 *   connectTimeoutMs?: int|null,
 *   contactEmail?: string|null,
 *   dataRetentionPolicyURL?: string|null,
 *   documentationURL?: string|null,
 *   visibility?: null|CommunityTtsEngineVisibility|value-of<CommunityTtsEngineVisibility>,
 *   voicesAPIKeyRef?: string|null,
 * }
 */
final class TtsIntegrationCreateParams implements BaseModel
{
    /** @use SdkModel<TtsIntegrationCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * What the engine supports. An unknown key is rejected.
     */
    #[Required]
    public CommunityTtsEngineCapabilities $capabilities;

    /**
     * The engine's unique name, and the first part of its voices (`<name>.<voice_id>`). 1-64 characters: lowercase letters, digits, hyphens and underscores, starting with a letter or digit. Built-in vendor names and the generic voice names `male`, `female`, `man`, `woman`, `alice` and `custom` are reserved. Unique across all Telnyx accounts and cannot be changed later. A deleted engine's name stays reserved for the organization that owned it.
     */
    #[Required]
    public string $name;

    /**
     * The audio formats the engine can produce, at least one, without duplicates.
     *
     * @var list<value-of<CommunityTtsAudioFormat>> $supportedAudioFormats
     */
    #[Required('supported_audio_formats', list: CommunityTtsAudioFormat::class)]
    public array $supportedAudioFormats;

    /**
     * The `https://` URL of the engine's voice listing, with the same host rules. It answers `GET` with `{"voices": [{"provider", "name", "voice_id", "language", "gender"}]}`: at most 1000 voices, each `voice_id` unique and matching `^[A-Za-z0-9][A-Za-z0-9_-]{0,127}$`, each `language` at most 35 characters. Telnyx reads it when the engine is registered or updated, every 15 minutes, and on `refresh_voices`.
     */
    #[Required('voices_url')]
    public string $voicesURL;

    /**
     * The `wss://` URL Telnyx connects to. It must be reachable on the public internet: plain `ws://`, private, loopback, link-local, shared, documentation, multicast and reserved addresses, and internal hostnames are rejected, as are credentials embedded in the URL or in credential-looking query parameters. At most 2048 characters.
     */
    #[Required('websocket_url')]
    public string $websocketURL;

    /**
     * How long Telnyx waits for the WebSocket connection to open, from 500 to 10000. Default: 3000.
     */
    #[Optional('connect_timeout_ms')]
    public ?int $connectTimeoutMs;

    /**
     * A contact address stored for the Telnyx platform team. Telnyx does not email it automatically. At most 254 characters.
     */
    #[Optional('contact_email', nullable: true)]
    public ?string $contactEmail;

    /**
     * URL of the publisher's data retention policy, at most 2048 characters. It is returned in the discoverable listing.
     */
    #[Optional('data_retention_policy_url', nullable: true)]
    public ?string $dataRetentionPolicyURL;

    /**
     * An `https://` page where callers learn how to get a key for the engine and how to use it, with a host and no credentials in it, at most 2048 characters. It is returned in the discoverable listing.
     */
    #[Optional('documentation_url', nullable: true)]
    public ?string $documentationURL;

    /**
     * `private`: only your organization can use the engine. `public`: any organization can, once it is `active`.
     *
     * @var value-of<CommunityTtsEngineVisibility>|null $visibility
     */
    #[Optional(enum: CommunityTtsEngineVisibility::class)]
    public ?string $visibility;

    /**
     * The identifier of an Integration Secret in your organization. When set, Telnyx sends its value as a bearer token when it reads `voices_url`. It is never used for synthesis. Send `null` on an update to clear it. At most 255 characters.
     */
    #[Optional('voices_api_key_ref', nullable: true)]
    public ?string $voicesAPIKeyRef;

    /**
     * `new TtsIntegrationCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TtsIntegrationCreateParams::with(
     *   capabilities: ...,
     *   name: ...,
     *   supportedAudioFormats: ...,
     *   voicesURL: ...,
     *   websocketURL: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TtsIntegrationCreateParams)
     *   ->withCapabilities(...)
     *   ->withName(...)
     *   ->withSupportedAudioFormats(...)
     *   ->withVoicesURL(...)
     *   ->withWebsocketURL(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CommunityTtsEngineCapabilities|CommunityTtsEngineCapabilitiesShape $capabilities
     * @param list<CommunityTtsAudioFormat|value-of<CommunityTtsAudioFormat>> $supportedAudioFormats
     * @param CommunityTtsEngineVisibility|value-of<CommunityTtsEngineVisibility>|null $visibility
     */
    public static function with(
        CommunityTtsEngineCapabilities|array $capabilities,
        string $name,
        array $supportedAudioFormats,
        string $voicesURL,
        string $websocketURL,
        string|Omitted|null $contactEmail = Omitted::VALUE,
        string|Omitted|null $dataRetentionPolicyURL = Omitted::VALUE,
        string|Omitted|null $documentationURL = Omitted::VALUE,
        string|Omitted|null $voicesAPIKeyRef = Omitted::VALUE,
        ?int $connectTimeoutMs = null,
        CommunityTtsEngineVisibility|string|null $visibility = null,
    ): self {
        $self = new self;

        $self['capabilities'] = $capabilities;
        $self['name'] = $name;
        $self['supportedAudioFormats'] = $supportedAudioFormats;
        $self['voicesURL'] = $voicesURL;
        $self['websocketURL'] = $websocketURL;

        null !== $connectTimeoutMs && $self['connectTimeoutMs'] = $connectTimeoutMs;
        Omitted::VALUE !== $contactEmail && $self['contactEmail'] = $contactEmail;
        Omitted::VALUE !== $dataRetentionPolicyURL && $self['dataRetentionPolicyURL'] = $dataRetentionPolicyURL;
        Omitted::VALUE !== $documentationURL && $self['documentationURL'] = $documentationURL;
        null !== $visibility && $self['visibility'] = $visibility;
        Omitted::VALUE !== $voicesAPIKeyRef && $self['voicesAPIKeyRef'] = $voicesAPIKeyRef;

        return $self;
    }

    /**
     * What the engine supports. An unknown key is rejected.
     *
     * @param CommunityTtsEngineCapabilities|CommunityTtsEngineCapabilitiesShape $capabilities
     */
    public function withCapabilities(
        CommunityTtsEngineCapabilities|array $capabilities
    ): self {
        $self = clone $this;
        $self['capabilities'] = $capabilities;

        return $self;
    }

    /**
     * The engine's unique name, and the first part of its voices (`<name>.<voice_id>`). 1-64 characters: lowercase letters, digits, hyphens and underscores, starting with a letter or digit. Built-in vendor names and the generic voice names `male`, `female`, `man`, `woman`, `alice` and `custom` are reserved. Unique across all Telnyx accounts and cannot be changed later. A deleted engine's name stays reserved for the organization that owned it.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The audio formats the engine can produce, at least one, without duplicates.
     *
     * @param list<CommunityTtsAudioFormat|value-of<CommunityTtsAudioFormat>> $supportedAudioFormats
     */
    public function withSupportedAudioFormats(
        array $supportedAudioFormats
    ): self {
        $self = clone $this;
        $self['supportedAudioFormats'] = $supportedAudioFormats;

        return $self;
    }

    /**
     * The `https://` URL of the engine's voice listing, with the same host rules. It answers `GET` with `{"voices": [{"provider", "name", "voice_id", "language", "gender"}]}`: at most 1000 voices, each `voice_id` unique and matching `^[A-Za-z0-9][A-Za-z0-9_-]{0,127}$`, each `language` at most 35 characters. Telnyx reads it when the engine is registered or updated, every 15 minutes, and on `refresh_voices`.
     */
    public function withVoicesURL(string $voicesURL): self
    {
        $self = clone $this;
        $self['voicesURL'] = $voicesURL;

        return $self;
    }

    /**
     * The `wss://` URL Telnyx connects to. It must be reachable on the public internet: plain `ws://`, private, loopback, link-local, shared, documentation, multicast and reserved addresses, and internal hostnames are rejected, as are credentials embedded in the URL or in credential-looking query parameters. At most 2048 characters.
     */
    public function withWebsocketURL(string $websocketURL): self
    {
        $self = clone $this;
        $self['websocketURL'] = $websocketURL;

        return $self;
    }

    /**
     * How long Telnyx waits for the WebSocket connection to open, from 500 to 10000. Default: 3000.
     */
    public function withConnectTimeoutMs(int $connectTimeoutMs): self
    {
        $self = clone $this;
        $self['connectTimeoutMs'] = $connectTimeoutMs;

        return $self;
    }

    /**
     * A contact address stored for the Telnyx platform team. Telnyx does not email it automatically. At most 254 characters.
     */
    public function withContactEmail(?string $contactEmail): self
    {
        $self = clone $this;
        $self['contactEmail'] = $contactEmail;

        return $self;
    }

    /**
     * URL of the publisher's data retention policy, at most 2048 characters. It is returned in the discoverable listing.
     */
    public function withDataRetentionPolicyURL(
        ?string $dataRetentionPolicyURL
    ): self {
        $self = clone $this;
        $self['dataRetentionPolicyURL'] = $dataRetentionPolicyURL;

        return $self;
    }

    /**
     * An `https://` page where callers learn how to get a key for the engine and how to use it, with a host and no credentials in it, at most 2048 characters. It is returned in the discoverable listing.
     */
    public function withDocumentationURL(?string $documentationURL): self
    {
        $self = clone $this;
        $self['documentationURL'] = $documentationURL;

        return $self;
    }

    /**
     * `private`: only your organization can use the engine. `public`: any organization can, once it is `active`.
     *
     * @param CommunityTtsEngineVisibility|value-of<CommunityTtsEngineVisibility> $visibility
     */
    public function withVisibility(
        CommunityTtsEngineVisibility|string $visibility
    ): self {
        $self = clone $this;
        $self['visibility'] = $visibility;

        return $self;
    }

    /**
     * The identifier of an Integration Secret in your organization. When set, Telnyx sends its value as a bearer token when it reads `voices_url`. It is never used for synthesis. Send `null` on an update to clear it. At most 255 characters.
     */
    public function withVoicesAPIKeyRef(?string $voicesAPIKeyRef): self
    {
        $self = clone $this;
        $self['voicesAPIKeyRef'] = $voicesAPIKeyRef;

        return $self;
    }
}
