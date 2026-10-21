<?php

declare(strict_types=1);

namespace Telnyx\TtsIntegrations;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * Same as `PUT`: only the fields you send change.
 *
 * @see Telnyx\Services\TtsIntegrationsService::update()
 *
 * @phpstan-import-type CommunityTtsEngineCapabilitiesShape from \Telnyx\TtsIntegrations\CommunityTtsEngineCapabilities
 *
 * @phpstan-type TtsIntegrationUpdateParamsShape = array{
 *   capabilities?: null|CommunityTtsEngineCapabilities|CommunityTtsEngineCapabilitiesShape,
 *   connectTimeoutMs?: int|null,
 *   contactEmail?: string|null,
 *   dataRetentionPolicyURL?: string|null,
 *   documentationURL?: string|null,
 *   supportedAudioFormats?: list<CommunityTtsAudioFormat|value-of<CommunityTtsAudioFormat>>|null,
 *   visibility?: null|CommunityTtsEngineVisibility|value-of<CommunityTtsEngineVisibility>,
 *   voicesAPIKeyRef?: string|null,
 *   voicesURL?: string|null,
 *   websocketURL?: string|null,
 * }
 */
final class TtsIntegrationUpdateParams implements BaseModel
{
    /** @use SdkModel<TtsIntegrationUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * What the engine supports. An unknown key is rejected.
     */
    #[Optional]
    public ?CommunityTtsEngineCapabilities $capabilities;

    #[Optional('connect_timeout_ms')]
    public ?int $connectTimeoutMs;

    #[Optional('contact_email', nullable: true)]
    public ?string $contactEmail;

    #[Optional('data_retention_policy_url', nullable: true)]
    public ?string $dataRetentionPolicyURL;

    #[Optional('documentation_url', nullable: true)]
    public ?string $documentationURL;

    /** @var list<value-of<CommunityTtsAudioFormat>>|null $supportedAudioFormats */
    #[Optional('supported_audio_formats', list: CommunityTtsAudioFormat::class)]
    public ?array $supportedAudioFormats;

    /**
     * `private`: only your organization can use the engine. `public`: any organization can, once it is `active`.
     *
     * @var value-of<CommunityTtsEngineVisibility>|null $visibility
     */
    #[Optional(enum: CommunityTtsEngineVisibility::class)]
    public ?string $visibility;

    #[Optional('voices_api_key_ref', nullable: true)]
    public ?string $voicesAPIKeyRef;

    /**
     * See the create request.
     */
    #[Optional('voices_url')]
    public ?string $voicesURL;

    /**
     * See the create request.
     */
    #[Optional('websocket_url')]
    public ?string $websocketURL;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CommunityTtsEngineCapabilities|CommunityTtsEngineCapabilitiesShape|null $capabilities
     * @param list<CommunityTtsAudioFormat|value-of<CommunityTtsAudioFormat>>|null $supportedAudioFormats
     * @param CommunityTtsEngineVisibility|value-of<CommunityTtsEngineVisibility>|null $visibility
     */
    public static function with(
        string|Omitted|null $contactEmail = Omitted::VALUE,
        string|Omitted|null $dataRetentionPolicyURL = Omitted::VALUE,
        string|Omitted|null $documentationURL = Omitted::VALUE,
        string|Omitted|null $voicesAPIKeyRef = Omitted::VALUE,
        CommunityTtsEngineCapabilities|array|null $capabilities = null,
        ?int $connectTimeoutMs = null,
        ?array $supportedAudioFormats = null,
        CommunityTtsEngineVisibility|string|null $visibility = null,
        ?string $voicesURL = null,
        ?string $websocketURL = null,
    ): self {
        $self = new self;

        null !== $capabilities && $self['capabilities'] = $capabilities;
        null !== $connectTimeoutMs && $self['connectTimeoutMs'] = $connectTimeoutMs;
        Omitted::VALUE !== $contactEmail && $self['contactEmail'] = $contactEmail;
        Omitted::VALUE !== $dataRetentionPolicyURL && $self['dataRetentionPolicyURL'] = $dataRetentionPolicyURL;
        Omitted::VALUE !== $documentationURL && $self['documentationURL'] = $documentationURL;
        null !== $supportedAudioFormats && $self['supportedAudioFormats'] = $supportedAudioFormats;
        null !== $visibility && $self['visibility'] = $visibility;
        Omitted::VALUE !== $voicesAPIKeyRef && $self['voicesAPIKeyRef'] = $voicesAPIKeyRef;
        null !== $voicesURL && $self['voicesURL'] = $voicesURL;
        null !== $websocketURL && $self['websocketURL'] = $websocketURL;

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

    public function withConnectTimeoutMs(int $connectTimeoutMs): self
    {
        $self = clone $this;
        $self['connectTimeoutMs'] = $connectTimeoutMs;

        return $self;
    }

    public function withContactEmail(?string $contactEmail): self
    {
        $self = clone $this;
        $self['contactEmail'] = $contactEmail;

        return $self;
    }

    public function withDataRetentionPolicyURL(
        ?string $dataRetentionPolicyURL
    ): self {
        $self = clone $this;
        $self['dataRetentionPolicyURL'] = $dataRetentionPolicyURL;

        return $self;
    }

    public function withDocumentationURL(?string $documentationURL): self
    {
        $self = clone $this;
        $self['documentationURL'] = $documentationURL;

        return $self;
    }

    /**
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

    public function withVoicesAPIKeyRef(?string $voicesAPIKeyRef): self
    {
        $self = clone $this;
        $self['voicesAPIKeyRef'] = $voicesAPIKeyRef;

        return $self;
    }

    /**
     * See the create request.
     */
    public function withVoicesURL(string $voicesURL): self
    {
        $self = clone $this;
        $self['voicesURL'] = $voicesURL;

        return $self;
    }

    /**
     * See the create request.
     */
    public function withWebsocketURL(string $websocketURL): self
    {
        $self = clone $this;
        $self['websocketURL'] = $websocketURL;

        return $self;
    }
}
