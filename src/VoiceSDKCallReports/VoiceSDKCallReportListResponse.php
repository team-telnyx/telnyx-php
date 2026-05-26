<?php

declare(strict_types=1);

namespace Telnyx\VoiceSDKCallReports;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\VoiceSDKCallReports\VoiceSDKCallReportListResponse\Logs;
use Telnyx\VoiceSDKCallReports\VoiceSDKCallReportListResponse\Logs\Entries;
use Telnyx\VoiceSDKCallReports\VoiceSDKCallReportListResponse\Stats;
use Telnyx\VoiceSDKCallReports\VoiceSDKCallReportListResponse\Stats\UnionMember1;

/**
 * A raw call report stats JSON payload. The schema is intentionally permissive because Voice SDK clients can add fields over time.
 *
 * @phpstan-import-type LogsVariants from \Telnyx\VoiceSDKCallReports\VoiceSDKCallReportListResponse\Logs
 * @phpstan-import-type StatsVariants from \Telnyx\VoiceSDKCallReports\VoiceSDKCallReportListResponse\Stats
 * @phpstan-import-type LogsShape from \Telnyx\VoiceSDKCallReports\VoiceSDKCallReportListResponse\Logs
 * @phpstan-import-type StatsShape from \Telnyx\VoiceSDKCallReports\VoiceSDKCallReportListResponse\Stats
 *
 * @phpstan-type VoiceSDKCallReportListResponseShape = array{
 *   callID?: string|null,
 *   callReportID?: string|null,
 *   createdAt?: \DateTimeInterface|null,
 *   flushReason?: array<string,mixed>|null,
 *   logs?: LogsShape|null,
 *   organizationID?: string|null,
 *   segment?: int|null,
 *   stats?: StatsShape|null,
 *   storedAt?: \DateTimeInterface|null,
 *   summary?: array<string,mixed>|null,
 *   telnyxLegID?: string|null,
 *   telnyxSessionID?: string|null,
 *   userAgent?: string|null,
 *   userID?: string|null,
 *   version?: string|null,
 *   voiceSDKID?: string|null,
 *   voiceSDKIDDecoded?: array<string,mixed>|null,
 *   voiceSDKSessionID?: string|null,
 * }
 */
final class VoiceSDKCallReportListResponse implements BaseModel
{
    /** @use SdkModel<VoiceSDKCallReportListResponseShape> */
    use SdkModel;

    /**
     * Unique call identifier.
     */
    #[Optional('call_id')]
    public ?string $callID;

    /**
     * User-scoped storage grouping identifier derived from the authenticated user. This is not a unique per-call report identifier and may be shared by multiple calls for the same user.
     */
    #[Optional('call_report_id')]
    public ?string $callReportID;

    /**
     * Creation timestamp when present.
     */
    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * Reason the SDK flushed this stats report segment, for example an intermediate socket-close flush.
     *
     * @var array<string,mixed>|null $flushReason
     */
    #[Optional(map: 'mixed')]
    public ?array $flushReason;

    /**
     * Raw logs payload emitted by the Voice SDK and stored without normalization. Live responses commonly return an array of log entries, but object-shaped log payloads are also allowed for compatibility.
     *
     * @var LogsVariants|null $logs
     */
    #[Optional(union: Logs::class)]
    public array|Entries|null $logs;

    /**
     * Organization associated with the stored call report when provided by the Voice SDK reporting path.
     */
    #[Optional('organization_id')]
    public ?string $organizationID;

    /**
     * Zero-based stats segment index when the SDK sends segmented or intermediate reports.
     */
    #[Optional]
    public ?int $segment;

    /**
     * Raw stats payload emitted by the Voice SDK and stored without normalization. The exact shape can vary by SDK platform and version. Live responses commonly return an array of interval snapshots, but object-shaped stats payloads are also allowed for compatibility.
     *
     * @var StatsVariants|null $stats
     */
    #[Optional(union: Stats::class)]
    public array|UnionMember1|null $stats;

    /**
     * Time when the call report was stored.
     */
    #[Optional('stored_at')]
    public ?\DateTimeInterface $storedAt;

    /**
     * High-level call metadata.
     *
     * @var array<string,mixed>|null $summary
     */
    #[Optional(map: 'mixed')]
    public ?array $summary;

    /**
     * Telnyx call leg identifier for correlating the report with call-control, SIP, and media troubleshooting data.
     */
    #[Optional('telnyx_leg_id')]
    public ?string $telnyxLegID;

    /**
     * Telnyx RTC session identifier for correlating the report with Voice SDK signaling and media-session logs.
     */
    #[Optional('telnyx_session_id')]
    public ?string $telnyxSessionID;

    /**
     * Voice SDK user agent string reported by the client. This is the preferred SDK/platform/version dimension when present.
     */
    #[Optional('user_agent')]
    public ?string $userAgent;

    /**
     * Authenticated user that owns the call report.
     */
    #[Optional('user_id')]
    public ?string $userID;

    /**
     * Legacy SDK version value when the client reports one separately from the user agent.
     */
    #[Optional]
    public ?string $version;

    /**
     * Voice SDK instance identifier.
     */
    #[Optional('voice_sdk_id')]
    public ?string $voiceSDKID;

    /**
     * Decoded Voice SDK identifier metadata emitted by voice-sdk-proxy when available.
     *
     * @var array<string,mixed>|null $voiceSDKIDDecoded
     */
    #[Optional('voice_sdk_id_decoded', map: 'mixed')]
    public ?array $voiceSDKIDDecoded;

    /**
     * Voice SDK session correlation identifier used to group stats segments for the same SDK session.
     */
    #[Optional('voice_sdk_session_id')]
    public ?string $voiceSDKSessionID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param array<string,mixed>|null $flushReason
     * @param LogsShape|null $logs
     * @param StatsShape|null $stats
     * @param array<string,mixed>|null $summary
     * @param array<string,mixed>|null $voiceSDKIDDecoded
     */
    public static function with(
        ?string $callID = null,
        ?string $callReportID = null,
        ?\DateTimeInterface $createdAt = null,
        ?array $flushReason = null,
        array|Entries|null $logs = null,
        ?string $organizationID = null,
        ?int $segment = null,
        array|UnionMember1|null $stats = null,
        ?\DateTimeInterface $storedAt = null,
        ?array $summary = null,
        ?string $telnyxLegID = null,
        ?string $telnyxSessionID = null,
        ?string $userAgent = null,
        ?string $userID = null,
        ?string $version = null,
        ?string $voiceSDKID = null,
        ?array $voiceSDKIDDecoded = null,
        ?string $voiceSDKSessionID = null,
    ): self {
        $self = new self;

        null !== $callID && $self['callID'] = $callID;
        null !== $callReportID && $self['callReportID'] = $callReportID;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $flushReason && $self['flushReason'] = $flushReason;
        null !== $logs && $self['logs'] = $logs;
        null !== $organizationID && $self['organizationID'] = $organizationID;
        null !== $segment && $self['segment'] = $segment;
        null !== $stats && $self['stats'] = $stats;
        null !== $storedAt && $self['storedAt'] = $storedAt;
        null !== $summary && $self['summary'] = $summary;
        null !== $telnyxLegID && $self['telnyxLegID'] = $telnyxLegID;
        null !== $telnyxSessionID && $self['telnyxSessionID'] = $telnyxSessionID;
        null !== $userAgent && $self['userAgent'] = $userAgent;
        null !== $userID && $self['userID'] = $userID;
        null !== $version && $self['version'] = $version;
        null !== $voiceSDKID && $self['voiceSDKID'] = $voiceSDKID;
        null !== $voiceSDKIDDecoded && $self['voiceSDKIDDecoded'] = $voiceSDKIDDecoded;
        null !== $voiceSDKSessionID && $self['voiceSDKSessionID'] = $voiceSDKSessionID;

        return $self;
    }

    /**
     * Unique call identifier.
     */
    public function withCallID(string $callID): self
    {
        $self = clone $this;
        $self['callID'] = $callID;

        return $self;
    }

    /**
     * User-scoped storage grouping identifier derived from the authenticated user. This is not a unique per-call report identifier and may be shared by multiple calls for the same user.
     */
    public function withCallReportID(string $callReportID): self
    {
        $self = clone $this;
        $self['callReportID'] = $callReportID;

        return $self;
    }

    /**
     * Creation timestamp when present.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Reason the SDK flushed this stats report segment, for example an intermediate socket-close flush.
     *
     * @param array<string,mixed> $flushReason
     */
    public function withFlushReason(array $flushReason): self
    {
        $self = clone $this;
        $self['flushReason'] = $flushReason;

        return $self;
    }

    /**
     * Raw logs payload emitted by the Voice SDK and stored without normalization. Live responses commonly return an array of log entries, but object-shaped log payloads are also allowed for compatibility.
     *
     * @param LogsShape $logs
     */
    public function withLogs(array|Entries $logs): self
    {
        $self = clone $this;
        $self['logs'] = $logs;

        return $self;
    }

    /**
     * Organization associated with the stored call report when provided by the Voice SDK reporting path.
     */
    public function withOrganizationID(string $organizationID): self
    {
        $self = clone $this;
        $self['organizationID'] = $organizationID;

        return $self;
    }

    /**
     * Zero-based stats segment index when the SDK sends segmented or intermediate reports.
     */
    public function withSegment(int $segment): self
    {
        $self = clone $this;
        $self['segment'] = $segment;

        return $self;
    }

    /**
     * Raw stats payload emitted by the Voice SDK and stored without normalization. The exact shape can vary by SDK platform and version. Live responses commonly return an array of interval snapshots, but object-shaped stats payloads are also allowed for compatibility.
     *
     * @param StatsShape $stats
     */
    public function withStats(array|UnionMember1 $stats): self
    {
        $self = clone $this;
        $self['stats'] = $stats;

        return $self;
    }

    /**
     * Time when the call report was stored.
     */
    public function withStoredAt(\DateTimeInterface $storedAt): self
    {
        $self = clone $this;
        $self['storedAt'] = $storedAt;

        return $self;
    }

    /**
     * High-level call metadata.
     *
     * @param array<string,mixed> $summary
     */
    public function withSummary(array $summary): self
    {
        $self = clone $this;
        $self['summary'] = $summary;

        return $self;
    }

    /**
     * Telnyx call leg identifier for correlating the report with call-control, SIP, and media troubleshooting data.
     */
    public function withTelnyxLegID(string $telnyxLegID): self
    {
        $self = clone $this;
        $self['telnyxLegID'] = $telnyxLegID;

        return $self;
    }

    /**
     * Telnyx RTC session identifier for correlating the report with Voice SDK signaling and media-session logs.
     */
    public function withTelnyxSessionID(string $telnyxSessionID): self
    {
        $self = clone $this;
        $self['telnyxSessionID'] = $telnyxSessionID;

        return $self;
    }

    /**
     * Voice SDK user agent string reported by the client. This is the preferred SDK/platform/version dimension when present.
     */
    public function withUserAgent(string $userAgent): self
    {
        $self = clone $this;
        $self['userAgent'] = $userAgent;

        return $self;
    }

    /**
     * Authenticated user that owns the call report.
     */
    public function withUserID(string $userID): self
    {
        $self = clone $this;
        $self['userID'] = $userID;

        return $self;
    }

    /**
     * Legacy SDK version value when the client reports one separately from the user agent.
     */
    public function withVersion(string $version): self
    {
        $self = clone $this;
        $self['version'] = $version;

        return $self;
    }

    /**
     * Voice SDK instance identifier.
     */
    public function withVoiceSdkid(string $voiceSDKID): self
    {
        $self = clone $this;
        $self['voiceSDKID'] = $voiceSDKID;

        return $self;
    }

    /**
     * Decoded Voice SDK identifier metadata emitted by voice-sdk-proxy when available.
     *
     * @param array<string,mixed> $voiceSDKIDDecoded
     */
    public function withVoiceSdkidDecoded(array $voiceSDKIDDecoded): self
    {
        $self = clone $this;
        $self['voiceSDKIDDecoded'] = $voiceSDKIDDecoded;

        return $self;
    }

    /**
     * Voice SDK session correlation identifier used to group stats segments for the same SDK session.
     */
    public function withVoiceSDKSessionID(string $voiceSDKSessionID): self
    {
        $self = clone $this;
        $self['voiceSDKSessionID'] = $voiceSDKSessionID;

        return $self;
    }
}
