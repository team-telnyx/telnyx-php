<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\ConferenceRecordingSavedWebhookEvent\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\ConferenceRecordingSavedWebhookEvent\Data\Payload\Channels;
use Telnyx\Webhooks\ConferenceRecordingSavedWebhookEvent\Data\Payload\Format;
use Telnyx\Webhooks\ConferenceRecordingSavedWebhookEvent\Data\Payload\PublicRecordingURLs;
use Telnyx\Webhooks\ConferenceRecordingSavedWebhookEvent\Data\Payload\RecordingURLs;

/**
 * @phpstan-type PayloadShape = array{
 *   callControlID?: string|null,
 *   callSessionID?: string|null,
 *   channels?: value-of<Channels>|null,
 *   clientState?: string|null,
 *   conferenceID?: string|null,
 *   connectionID?: string|null,
 *   format?: value-of<Format>|null,
 *   publicRecordingURLs?: PublicRecordingURLs|null,
 *   recordingEndedAt?: \DateTimeInterface|null,
 *   recordingID?: string|null,
 *   recordingStartedAt?: \DateTimeInterface|null,
 *   recordingURLs?: RecordingURLs|null,
 * }
 */
final class Payload implements BaseModel
{
    /** @use SdkModel<PayloadShape> */
    use SdkModel;

    /**
     * Participant's call ID used to issue commands via Call Control API.
     */
    #[Optional('call_control_id')]
    public ?string $callControlID;

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
     * ID of the conference that is being recorded.
     */
    #[Optional('conference_id')]
    public ?string $conferenceID;

    /**
     * Call Control App ID (formerly Telnyx connection ID) used in the call.
     */
    #[Optional('connection_id')]
    public ?string $connectionID;

    /**
     * The audio file format used when storing the call recording. Can be either `mp3` or `wav`.
     *
     * @var value-of<Format>|null $format
     */
    #[Optional(enum: Format::class)]
    public ?string $format;

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
     * ID of the conference recording.
     */
    #[Optional('recording_id')]
    public ?string $recordingID;

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
     * @param Channels|value-of<Channels> $channels
     * @param Format|value-of<Format> $format
     * @param PublicRecordingURLs|array{
     *   mp3?: string|null, wav?: string|null
     * } $publicRecordingURLs
     * @param RecordingURLs|array{mp3?: string|null, wav?: string|null} $recordingURLs
     */
    public static function with(
        ?string $callControlID = null,
        ?string $callSessionID = null,
        Channels|string|null $channels = null,
        ?string $clientState = null,
        ?string $conferenceID = null,
        ?string $connectionID = null,
        Format|string|null $format = null,
        PublicRecordingURLs|array|null $publicRecordingURLs = null,
        ?\DateTimeInterface $recordingEndedAt = null,
        ?string $recordingID = null,
        ?\DateTimeInterface $recordingStartedAt = null,
        RecordingURLs|array|null $recordingURLs = null,
    ): self {
        $self = new self;

        null !== $callControlID && $self['callControlID'] = $callControlID;
        null !== $callSessionID && $self['callSessionID'] = $callSessionID;
        null !== $channels && $self['channels'] = $channels;
        null !== $clientState && $self['clientState'] = $clientState;
        null !== $conferenceID && $self['conferenceID'] = $conferenceID;
        null !== $connectionID && $self['connectionID'] = $connectionID;
        null !== $format && $self['format'] = $format;
        null !== $publicRecordingURLs && $self['publicRecordingURLs'] = $publicRecordingURLs;
        null !== $recordingEndedAt && $self['recordingEndedAt'] = $recordingEndedAt;
        null !== $recordingID && $self['recordingID'] = $recordingID;
        null !== $recordingStartedAt && $self['recordingStartedAt'] = $recordingStartedAt;
        null !== $recordingURLs && $self['recordingURLs'] = $recordingURLs;

        return $self;
    }

    /**
     * Participant's call ID used to issue commands via Call Control API.
     */
    public function withCallControlID(string $callControlID): self
    {
        $self = clone $this;
        $self['callControlID'] = $callControlID;

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
     * ID of the conference that is being recorded.
     */
    public function withConferenceID(string $conferenceID): self
    {
        $self = clone $this;
        $self['conferenceID'] = $conferenceID;

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
     * The audio file format used when storing the call recording. Can be either `mp3` or `wav`.
     *
     * @param Format|value-of<Format> $format
     */
    public function withFormat(Format|string $format): self
    {
        $self = clone $this;
        $self['format'] = $format;

        return $self;
    }

    /**
     * Recording URLs in requested format. The URL is valid for as long as the file exists. For security purposes, this feature is activated on a per request basis.  Please contact customer support with your Account ID to request activation.
     *
     * @param PublicRecordingURLs|array{
     *   mp3?: string|null, wav?: string|null
     * } $publicRecordingURLs
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
     * ID of the conference recording.
     */
    public function withRecordingID(string $recordingID): self
    {
        $self = clone $this;
        $self['recordingID'] = $recordingID;

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
     * @param RecordingURLs|array{mp3?: string|null, wav?: string|null} $recordingURLs
     */
    public function withRecordingURLs(RecordingURLs|array $recordingURLs): self
    {
        $self = clone $this;
        $self['recordingURLs'] = $recordingURLs;

        return $self;
    }
}
