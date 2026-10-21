<?php

declare(strict_types=1);

namespace Telnyx\TtsIntegrations;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;
use Telnyx\TtsIntegrations\CommunityTtsEngine\ReviewStatus;

/**
 * The full record of a community TTS engine you own. Select its voices by the engine's `name`, as `<name>.<voice_id>`, with your own key for it (`api_key_ref`).
 *
 * @phpstan-import-type CommunityTtsEngineCapabilitiesShape from \Telnyx\TtsIntegrations\CommunityTtsEngineCapabilities
 *
 * @phpstan-type CommunityTtsEngineShape = array{
 *   id: string,
 *   capabilities: CommunityTtsEngineCapabilities|CommunityTtsEngineCapabilitiesShape,
 *   name: string,
 *   status: CommunityTtsEngineStatus|value-of<CommunityTtsEngineStatus>,
 *   supportedAudioFormats: list<CommunityTtsAudioFormat|value-of<CommunityTtsAudioFormat>>,
 *   visibility: CommunityTtsEngineVisibility|value-of<CommunityTtsEngineVisibility>,
 *   voicesURL: string,
 *   websocketURL: string,
 *   connectTimeoutMs?: int|null,
 *   contactEmail?: string|null,
 *   createdAt?: \DateTimeInterface|null,
 *   dataRetentionPolicyURL?: string|null,
 *   documentationURL?: string|null,
 *   reviewNotes?: string|null,
 *   reviewStatus?: null|ReviewStatus|value-of<ReviewStatus>,
 *   reviewedAt?: \DateTimeInterface|null,
 *   updatedAt?: \DateTimeInterface|null,
 *   voicesAPIKeyRef?: string|null,
 *   voicesCount?: int|null,
 *   voicesDegraded?: bool|null,
 *   voicesFetchedAt?: \DateTimeInterface|null,
 * }
 */
final class CommunityTtsEngine implements BaseModel
{
    /** @use SdkModel<CommunityTtsEngineShape> */
    use SdkModel;

    #[Required]
    public string $id;

    /**
     * What the engine supports. An unknown key is rejected.
     */
    #[Required]
    public CommunityTtsEngineCapabilities $capabilities;

    /**
     * The engine's unique name: the first part of its voices.
     */
    #[Required]
    public string $name;

    /**
     * Whether the engine can serve traffic right now, independent of `visibility` and `review_status`. `draft`: not yet approved (new and awaiting its first review, rejected and awaiting a fix, or approved earlier and awaiting re-review after a review-sensitive change). `active`: serving traffic. `disabled`: owner-paused, reversible via `enable`. `suspended`: paused by Telnyx (repeated failures of a public engine, or an abuse action); the owner cannot clear this by calling `enable`, and Telnyx can reinstate it.
     *
     * @var value-of<CommunityTtsEngineStatus> $status
     */
    #[Required(enum: CommunityTtsEngineStatus::class)]
    public string $status;

    /** @var list<value-of<CommunityTtsAudioFormat>> $supportedAudioFormats */
    #[Required('supported_audio_formats', list: CommunityTtsAudioFormat::class)]
    public array $supportedAudioFormats;

    /**
     * `private`: only your organization can use the engine. `public`: any organization can, once it is `active`.
     *
     * @var value-of<CommunityTtsEngineVisibility> $visibility
     */
    #[Required(enum: CommunityTtsEngineVisibility::class)]
    public string $visibility;

    #[Required('voices_url')]
    public string $voicesURL;

    #[Required('websocket_url')]
    public string $websocketURL;

    #[Optional('connect_timeout_ms')]
    public ?int $connectTimeoutMs;

    #[Optional('contact_email', nullable: true)]
    public ?string $contactEmail;

    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    #[Optional('data_retention_policy_url', nullable: true)]
    public ?string $dataRetentionPolicyURL;

    #[Optional('documentation_url', nullable: true)]
    public ?string $documentationURL;

    /**
     * The reviewer's notes on a rejection.
     */
    #[Optional('review_notes', nullable: true)]
    public ?string $reviewNotes;

    /**
     * `null`: never submitted, or an approved engine whose review-sensitive field changed and awaits re-review. `pending`: submitted. `approved`: approved. `rejected`: rejected, with `review_notes`.
     *
     * @var value-of<ReviewStatus>|null $reviewStatus
     */
    #[Optional('review_status', enum: ReviewStatus::class, nullable: true)]
    public ?string $reviewStatus;

    #[Optional('reviewed_at', nullable: true)]
    public ?\DateTimeInterface $reviewedAt;

    #[Optional('updated_at', nullable: true)]
    public ?\DateTimeInterface $updatedAt;

    #[Optional('voices_api_key_ref', nullable: true)]
    public ?string $voicesAPIKeyRef;

    /**
     * The number of voices in the stored list.
     */
    #[Optional('voices_count')]
    public ?int $voicesCount;

    /**
     * `true` after three failed reads in a row, until a read succeeds. A degraded engine keeps serving from its last list.
     */
    #[Optional('voices_degraded')]
    public ?bool $voicesDegraded;

    /**
     * When the stored list was last read successfully.
     */
    #[Optional('voices_fetched_at', nullable: true)]
    public ?\DateTimeInterface $voicesFetchedAt;

    /**
     * `new CommunityTtsEngine()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CommunityTtsEngine::with(
     *   id: ...,
     *   capabilities: ...,
     *   name: ...,
     *   status: ...,
     *   supportedAudioFormats: ...,
     *   visibility: ...,
     *   voicesURL: ...,
     *   websocketURL: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CommunityTtsEngine)
     *   ->withID(...)
     *   ->withCapabilities(...)
     *   ->withName(...)
     *   ->withStatus(...)
     *   ->withSupportedAudioFormats(...)
     *   ->withVisibility(...)
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
     * @param CommunityTtsEngineStatus|value-of<CommunityTtsEngineStatus> $status
     * @param list<CommunityTtsAudioFormat|value-of<CommunityTtsAudioFormat>> $supportedAudioFormats
     * @param CommunityTtsEngineVisibility|value-of<CommunityTtsEngineVisibility> $visibility
     * @param Omitted|ReviewStatus|value-of<ReviewStatus>|null $reviewStatus
     */
    public static function with(
        string $id,
        CommunityTtsEngineCapabilities|array $capabilities,
        string $name,
        CommunityTtsEngineStatus|string $status,
        array $supportedAudioFormats,
        CommunityTtsEngineVisibility|string $visibility,
        string $voicesURL,
        string $websocketURL,
        string|Omitted|null $contactEmail = Omitted::VALUE,
        string|Omitted|null $dataRetentionPolicyURL = Omitted::VALUE,
        string|Omitted|null $documentationURL = Omitted::VALUE,
        string|Omitted|null $reviewNotes = Omitted::VALUE,
        Omitted|ReviewStatus|string|null $reviewStatus = Omitted::VALUE,
        \DateTimeInterface|Omitted|null $reviewedAt = Omitted::VALUE,
        \DateTimeInterface|Omitted|null $updatedAt = Omitted::VALUE,
        string|Omitted|null $voicesAPIKeyRef = Omitted::VALUE,
        \DateTimeInterface|Omitted|null $voicesFetchedAt = Omitted::VALUE,
        ?int $connectTimeoutMs = null,
        ?\DateTimeInterface $createdAt = null,
        ?int $voicesCount = null,
        ?bool $voicesDegraded = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['capabilities'] = $capabilities;
        $self['name'] = $name;
        $self['status'] = $status;
        $self['supportedAudioFormats'] = $supportedAudioFormats;
        $self['visibility'] = $visibility;
        $self['voicesURL'] = $voicesURL;
        $self['websocketURL'] = $websocketURL;

        null !== $connectTimeoutMs && $self['connectTimeoutMs'] = $connectTimeoutMs;
        Omitted::VALUE !== $contactEmail && $self['contactEmail'] = $contactEmail;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        Omitted::VALUE !== $dataRetentionPolicyURL && $self['dataRetentionPolicyURL'] = $dataRetentionPolicyURL;
        Omitted::VALUE !== $documentationURL && $self['documentationURL'] = $documentationURL;
        Omitted::VALUE !== $reviewNotes && $self['reviewNotes'] = $reviewNotes;
        Omitted::VALUE !== $reviewStatus && $self['reviewStatus'] = $reviewStatus;
        Omitted::VALUE !== $reviewedAt && $self['reviewedAt'] = $reviewedAt;
        Omitted::VALUE !== $updatedAt && $self['updatedAt'] = $updatedAt;
        Omitted::VALUE !== $voicesAPIKeyRef && $self['voicesAPIKeyRef'] = $voicesAPIKeyRef;
        null !== $voicesCount && $self['voicesCount'] = $voicesCount;
        null !== $voicesDegraded && $self['voicesDegraded'] = $voicesDegraded;
        Omitted::VALUE !== $voicesFetchedAt && $self['voicesFetchedAt'] = $voicesFetchedAt;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

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
     * The engine's unique name: the first part of its voices.
     */
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

    public function withVoicesURL(string $voicesURL): self
    {
        $self = clone $this;
        $self['voicesURL'] = $voicesURL;

        return $self;
    }

    public function withWebsocketURL(string $websocketURL): self
    {
        $self = clone $this;
        $self['websocketURL'] = $websocketURL;

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
     * The reviewer's notes on a rejection.
     */
    public function withReviewNotes(?string $reviewNotes): self
    {
        $self = clone $this;
        $self['reviewNotes'] = $reviewNotes;

        return $self;
    }

    /**
     * `null`: never submitted, or an approved engine whose review-sensitive field changed and awaits re-review. `pending`: submitted. `approved`: approved. `rejected`: rejected, with `review_notes`.
     *
     * @param ReviewStatus|value-of<ReviewStatus>|null $reviewStatus
     */
    public function withReviewStatus(
        ReviewStatus|string|null $reviewStatus
    ): self {
        $self = clone $this;
        $self['reviewStatus'] = $reviewStatus;

        return $self;
    }

    public function withReviewedAt(?\DateTimeInterface $reviewedAt): self
    {
        $self = clone $this;
        $self['reviewedAt'] = $reviewedAt;

        return $self;
    }

    public function withUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    public function withVoicesAPIKeyRef(?string $voicesAPIKeyRef): self
    {
        $self = clone $this;
        $self['voicesAPIKeyRef'] = $voicesAPIKeyRef;

        return $self;
    }

    /**
     * The number of voices in the stored list.
     */
    public function withVoicesCount(int $voicesCount): self
    {
        $self = clone $this;
        $self['voicesCount'] = $voicesCount;

        return $self;
    }

    /**
     * `true` after three failed reads in a row, until a read succeeds. A degraded engine keeps serving from its last list.
     */
    public function withVoicesDegraded(bool $voicesDegraded): self
    {
        $self = clone $this;
        $self['voicesDegraded'] = $voicesDegraded;

        return $self;
    }

    /**
     * When the stored list was last read successfully.
     */
    public function withVoicesFetchedAt(
        ?\DateTimeInterface $voicesFetchedAt
    ): self {
        $self = clone $this;
        $self['voicesFetchedAt'] = $voicesFetchedAt;

        return $self;
    }
}
