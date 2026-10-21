<?php

declare(strict_types=1);

namespace Telnyx\TtsIntegrations\TtsIntegrationGetDiscoverableResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;
use Telnyx\TtsIntegrations\CommunityTtsAudioFormat;
use Telnyx\TtsIntegrations\CommunityTtsEngineCapabilities;
use Telnyx\TtsIntegrations\CommunityTtsEngineStatus;
use Telnyx\TtsIntegrations\CommunityTtsEngineVisibility;

/**
 * What a caller needs to choose an engine. It carries no publisher contact details, review notes or credential references.
 *
 * @phpstan-import-type CommunityTtsEngineCapabilitiesShape from \Telnyx\TtsIntegrations\CommunityTtsEngineCapabilities
 *
 * @phpstan-type DataShape = array{
 *   id: string,
 *   name: string,
 *   status: CommunityTtsEngineStatus|value-of<CommunityTtsEngineStatus>,
 *   visibility: CommunityTtsEngineVisibility|value-of<CommunityTtsEngineVisibility>,
 *   capabilities?: null|CommunityTtsEngineCapabilities|CommunityTtsEngineCapabilitiesShape,
 *   connectTimeoutMs?: int|null,
 *   createdAt?: \DateTimeInterface|null,
 *   dataRetentionPolicyURL?: string|null,
 *   documentationURL?: string|null,
 *   supportedAudioFormats?: list<CommunityTtsAudioFormat|value-of<CommunityTtsAudioFormat>>|null,
 *   voicesCount?: int|null,
 *   websocketURL?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required]
    public string $name;

    /**
     * Whether the engine can serve traffic right now, independent of `visibility` and `review_status`. `draft`: not yet approved (new and awaiting its first review, rejected and awaiting a fix, or approved earlier and awaiting re-review after a review-sensitive change). `active`: serving traffic. `disabled`: owner-paused, reversible via `enable`. `suspended`: paused by Telnyx (repeated failures of a public engine, or an abuse action); the owner cannot clear this by calling `enable`, and Telnyx can reinstate it.
     *
     * @var value-of<CommunityTtsEngineStatus> $status
     */
    #[Required(enum: CommunityTtsEngineStatus::class)]
    public string $status;

    /**
     * `private`: only your organization can use the engine. `public`: any organization can, once it is `active`.
     *
     * @var value-of<CommunityTtsEngineVisibility> $visibility
     */
    #[Required(enum: CommunityTtsEngineVisibility::class)]
    public string $visibility;

    /**
     * What the engine supports. An unknown key is rejected.
     */
    #[Optional]
    public ?CommunityTtsEngineCapabilities $capabilities;

    #[Optional('connect_timeout_ms')]
    public ?int $connectTimeoutMs;

    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    #[Optional('data_retention_policy_url', nullable: true)]
    public ?string $dataRetentionPolicyURL;

    #[Optional('documentation_url', nullable: true)]
    public ?string $documentationURL;

    /** @var list<value-of<CommunityTtsAudioFormat>>|null $supportedAudioFormats */
    #[Optional('supported_audio_formats', list: CommunityTtsAudioFormat::class)]
    public ?array $supportedAudioFormats;

    #[Optional('voices_count')]
    public ?int $voicesCount;

    #[Optional('websocket_url')]
    public ?string $websocketURL;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(id: ..., name: ..., status: ..., visibility: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)->withID(...)->withName(...)->withStatus(...)->withVisibility(...)
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
     * @param CommunityTtsEngineStatus|value-of<CommunityTtsEngineStatus> $status
     * @param CommunityTtsEngineVisibility|value-of<CommunityTtsEngineVisibility> $visibility
     * @param CommunityTtsEngineCapabilities|CommunityTtsEngineCapabilitiesShape|null $capabilities
     * @param list<CommunityTtsAudioFormat|value-of<CommunityTtsAudioFormat>>|null $supportedAudioFormats
     */
    public static function with(
        string $id,
        string $name,
        CommunityTtsEngineStatus|string $status,
        CommunityTtsEngineVisibility|string $visibility,
        string|Omitted|null $dataRetentionPolicyURL = Omitted::VALUE,
        string|Omitted|null $documentationURL = Omitted::VALUE,
        CommunityTtsEngineCapabilities|array|null $capabilities = null,
        ?int $connectTimeoutMs = null,
        ?\DateTimeInterface $createdAt = null,
        ?array $supportedAudioFormats = null,
        ?int $voicesCount = null,
        ?string $websocketURL = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['name'] = $name;
        $self['status'] = $status;
        $self['visibility'] = $visibility;

        null !== $capabilities && $self['capabilities'] = $capabilities;
        null !== $connectTimeoutMs && $self['connectTimeoutMs'] = $connectTimeoutMs;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        Omitted::VALUE !== $dataRetentionPolicyURL && $self['dataRetentionPolicyURL'] = $dataRetentionPolicyURL;
        Omitted::VALUE !== $documentationURL && $self['documentationURL'] = $documentationURL;
        null !== $supportedAudioFormats && $self['supportedAudioFormats'] = $supportedAudioFormats;
        null !== $voicesCount && $self['voicesCount'] = $voicesCount;
        null !== $websocketURL && $self['websocketURL'] = $websocketURL;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Whether the engine can serve traffic right now, independent of `visibility` and `review_status`. `draft`: not yet approved (new and awaiting its first review, rejected and awaiting a fix, or approved earlier and awaiting re-review after a review-sensitive change). `active`: serving traffic. `disabled`: owner-paused, reversible via `enable`. `suspended`: paused by Telnyx (repeated failures of a public engine, or an abuse action); the owner cannot clear this by calling `enable`, and Telnyx can reinstate it.
     *
     * @param CommunityTtsEngineStatus|value-of<CommunityTtsEngineStatus> $status
     */
    public function withStatus(CommunityTtsEngineStatus|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

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

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

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

    public function withVoicesCount(int $voicesCount): self
    {
        $self = clone $this;
        $self['voicesCount'] = $voicesCount;

        return $self;
    }

    public function withWebsocketURL(string $websocketURL): self
    {
        $self = clone $this;
        $self['websocketURL'] = $websocketURL;

        return $self;
    }
}
