<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallRecordingSaved;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\CallRecordingSaved\Payload\Channels;
use Telnyx\Webhooks\CallRecordingSaved\Payload\PublicRecordingURLs;
use Telnyx\Webhooks\CallRecordingSaved\Payload\RecordingURLs;

/**
 * @phpstan-import-type PublicRecordingURLsShape from \Telnyx\Webhooks\CallRecordingSaved\Payload\PublicRecordingURLs
 * @phpstan-import-type RecordingURLsShape from \Telnyx\Webhooks\CallRecordingSaved\Payload\RecordingURLs
 *
 * @phpstan-type PayloadShape = array{
 *   callLegID?: string|null,
 *   callSessionID?: string|null,
 *   channels?: null|Channels|value-of<Channels>,
 *   clientState?: string|null,
 *   connectionID?: string|null,
 *   publicRecordingURLs?: null|PublicRecordingURLs|PublicRecordingURLsShape,
 *   recordingEndedAt?: \DateTimeInterface|null,
 *   recordingStartedAt?: \DateTimeInterface|null,
 *   recordingURLs?: null|RecordingURLs|RecordingURLsShape,
 * }
 */
final class Payload implements BaseModel
{
    /** @use SdkModel<PayloadShape> */
    use SdkModel;

    /**
     * ID that is unique to the call and can be used to correlate webhook events.
     */
    #[Optional('call_leg_id')]
    public ?string $callLegID;

    /**
     * ID that is unique to the call session and can be used to correlate webhook events. Call session is a group of related call legs that logically belong to the same phone call, e.g. an inbound and outbound leg of a transferred call.
     */
    #[Optional('call_session_id')]
    public ?string $callSessionID;

    /**
     * Whether recording was recorded in `single` or `dual` channel.
     *
     * @var value-of<Channels>|null $channels
     */
    #[Optional(enum: Channels::class)]
    public ?string $channels;

    /**
     * State received from a command.
     */
    #[Optional('client_state')]
    public ?string $clientState;

    /**
     * Call Control App ID (formerly Telnyx connection ID) used in the call.
     */
    #[Optional('connection_id')]
    public ?string $connectionID;

    /**
     * Recording URLs in requested format. The URL is valid for as long as the file exists. For security purposes, this feature is activated on a per request basis.  Please contact customer support with your Account ID to request activation.
     */
    #[Optional('public_recording_urls')]
    public ?PublicRecordingURLs $publicRecordingURLs;

    /**
     * ISO 8601 datetime of when recording ended.
     */
    #[Optional('recording_ended_at')]
    public ?\DateTimeInterface $recordingEndedAt;

    /**
     * ISO 8601 datetime of when recording started.
     */
    #[Optional('recording_started_at')]
    public ?\DateTimeInterface $recordingStartedAt;

    /**
     * Recording URLs in requested format. These URLs are valid for 10 minutes. After 10 minutes, you may retrieve recordings via API using Reports -> Call Recordings documentation, or via Mission Control under Reporting -> Recordings.
     */
    #[Optional('recording_urls')]
    public ?RecordingURLs $recordingURLs;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Channels|value-of<Channels>|null $channels
     * @param PublicRecordingURLs|PublicRecordingURLsShape|null $publicRecordingURLs
     * @param RecordingURLs|RecordingURLsShape|null $recordingURLs
     */
    public static function with(
        ?string $callLegID = null,
        ?string $callSessionID = null,
        Channels|string|null $channels = null,
        ?string $clientState = null,
        ?string $connectionID = null,
        PublicRecordingURLs|array|null $publicRecordingURLs = null,
        ?\DateTimeInterface $recordingEndedAt = null,
        ?\DateTimeInterface $recordingStartedAt = null,
        RecordingURLs|array|null $recordingURLs = null,
    ): self {
        $self = new self;

        null !== $callLegID && $self['callLegID'] = $callLegID;
        null !== $callSessionID && $self['callSessionID'] = $callSessionID;
        null !== $channels && $self['channels'] = $channels;
        null !== $clientState && $self['clientState'] = $clientState;
        null !== $connectionID && $self['connectionID'] = $connectionID;
        null !== $publicRecordingURLs && $self['publicRecordingURLs'] = $publicRecordingURLs;
        null !== $recordingEndedAt && $self['recordingEndedAt'] = $recordingEndedAt;
        null !== $recordingStartedAt && $self['recordingStartedAt'] = $recordingStartedAt;
        null !== $recordingURLs && $self['recordingURLs'] = $recordingURLs;

        return $self;
    }

    /**
     * ID that is unique to the call and can be used to correlate webhook events.
     */
    public function withCallLegID(string $callLegID): self
    {
        $self = clone $this;
        $self['callLegID'] = $callLegID;

        return $self;
    }

    /**
     * ID that is unique to the call session and can be used to correlate webhook events. Call session is a group of related call legs that logically belong to the same phone call, e.g. an inbound and outbound leg of a transferred call.
     */
    public function withCallSessionID(string $callSessionID): self
    {
        $self = clone $this;
        $self['callSessionID'] = $callSessionID;

        return $self;
    }

    /**
     * Whether recording was recorded in `single` or `dual` channel.
     *
     * @param Channels|value-of<Channels> $channels
     */
    public function withChannels(Channels|string $channels): self
    {
        $self = clone $this;
        $self['channels'] = $channels;

        return $self;
    }

    /**
     * State received from a command.
     */
    public function withClientState(string $clientState): self
    {
        $self = clone $this;
        $self['clientState'] = $clientState;

        return $self;
    }

    /**
     * Call Control App ID (formerly Telnyx connection ID) used in the call.
     */
    public function withConnectionID(string $connectionID): self
    {
        $self = clone $this;
        $self['connectionID'] = $connectionID;

        return $self;
    }

    /**
     * Recording URLs in requested format. The URL is valid for as long as the file exists. For security purposes, this feature is activated on a per request basis.  Please contact customer support with your Account ID to request activation.
     *
     * @param PublicRecordingURLs|PublicRecordingURLsShape $publicRecordingURLs
     */
    public function withPublicRecordingURLs(
        PublicRecordingURLs|array $publicRecordingURLs
    ): self {
        $self = clone $this;
        $self['publicRecordingURLs'] = $publicRecordingURLs;

        return $self;
    }

    /**
     * ISO 8601 datetime of when recording ended.
     */
    public function withRecordingEndedAt(
        \DateTimeInterface $recordingEndedAt
    ): self {
        $self = clone $this;
        $self['recordingEndedAt'] = $recordingEndedAt;

        return $self;
    }

    /**
     * ISO 8601 datetime of when recording started.
     */
    public function withRecordingStartedAt(
        \DateTimeInterface $recordingStartedAt
    ): self {
        $self = clone $this;
        $self['recordingStartedAt'] = $recordingStartedAt;

        return $self;
    }

    /**
     * Recording URLs in requested format. These URLs are valid for 10 minutes. After 10 minutes, you may retrieve recordings via API using Reports -> Call Recordings documentation, or via Mission Control under Reporting -> Recordings.
     *
     * @param RecordingURLs|RecordingURLsShape $recordingURLs
     */
    public function withRecordingURLs(RecordingURLs|array $recordingURLs): self
    {
        $self = clone $this;
        $self['recordingURLs'] = $recordingURLs;

        return $self;
    }
}
