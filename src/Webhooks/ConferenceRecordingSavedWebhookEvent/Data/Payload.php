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
        $obj = new self;

        null !== $callControlID && $obj['callControlID'] = $callControlID;
        null !== $callSessionID && $obj['callSessionID'] = $callSessionID;
        null !== $channels && $obj['channels'] = $channels;
        null !== $clientState && $obj['clientState'] = $clientState;
        null !== $conferenceID && $obj['conferenceID'] = $conferenceID;
        null !== $connectionID && $obj['connectionID'] = $connectionID;
        null !== $format && $obj['format'] = $format;
        null !== $publicRecordingURLs && $obj['publicRecordingURLs'] = $publicRecordingURLs;
        null !== $recordingEndedAt && $obj['recordingEndedAt'] = $recordingEndedAt;
        null !== $recordingID && $obj['recordingID'] = $recordingID;
        null !== $recordingStartedAt && $obj['recordingStartedAt'] = $recordingStartedAt;
        null !== $recordingURLs && $obj['recordingURLs'] = $recordingURLs;

        return $obj;
    }

    /**
     * Participant's call ID used to issue commands via Call Control API.
     */
    public function withCallControlID(string $callControlID): self
    {
        $obj = clone $this;
        $obj['callControlID'] = $callControlID;

        return $obj;
    }

    /**
     * ID that is unique to the call session and can be used to correlate webhook events. Call session is a group of related call legs that logically belong to the same phone call, e.g. an inbound and outbound leg of a transferred call.
     */
    public function withCallSessionID(string $callSessionID): self
    {
        $obj = clone $this;
        $obj['callSessionID'] = $callSessionID;

        return $obj;
    }

    /**
     * Whether recording was recorded in `single` or `dual` channel.
     *
     * @param Channels|value-of<Channels> $channels
     */
    public function withChannels(Channels|string $channels): self
    {
        $obj = clone $this;
        $obj['channels'] = $channels;

        return $obj;
    }

    /**
     * State received from a command.
     */
    public function withClientState(string $clientState): self
    {
        $obj = clone $this;
        $obj['clientState'] = $clientState;

        return $obj;
    }

    /**
     * ID of the conference that is being recorded.
     */
    public function withConferenceID(string $conferenceID): self
    {
        $obj = clone $this;
        $obj['conferenceID'] = $conferenceID;

        return $obj;
    }

    /**
     * Call Control App ID (formerly Telnyx connection ID) used in the call.
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj['connectionID'] = $connectionID;

        return $obj;
    }

    /**
     * The audio file format used when storing the call recording. Can be either `mp3` or `wav`.
     *
     * @param Format|value-of<Format> $format
     */
    public function withFormat(Format|string $format): self
    {
        $obj = clone $this;
        $obj['format'] = $format;

        return $obj;
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
        $obj = clone $this;
        $obj['publicRecordingURLs'] = $publicRecordingURLs;

        return $obj;
    }

    /**
     * ISO 8601 datetime of when recording ended.
     */
    public function withRecordingEndedAt(
        \DateTimeInterface $recordingEndedAt
    ): self {
        $obj = clone $this;
        $obj['recordingEndedAt'] = $recordingEndedAt;

        return $obj;
    }

    /**
     * ID of the conference recording.
     */
    public function withRecordingID(string $recordingID): self
    {
        $obj = clone $this;
        $obj['recordingID'] = $recordingID;

        return $obj;
    }

    /**
     * ISO 8601 datetime of when recording started.
     */
    public function withRecordingStartedAt(
        \DateTimeInterface $recordingStartedAt
    ): self {
        $obj = clone $this;
        $obj['recordingStartedAt'] = $recordingStartedAt;

        return $obj;
    }

    /**
     * Recording URLs in requested format. These URLs are valid for 10 minutes. After 10 minutes, you may retrieve recordings via API using Reports -> Call Recordings documentation, or via Mission Control under Reporting -> Recordings.
     *
     * @param RecordingURLs|array{mp3?: string|null, wav?: string|null} $recordingURLs
     */
    public function withRecordingURLs(RecordingURLs|array $recordingURLs): self
    {
        $obj = clone $this;
        $obj['recordingURLs'] = $recordingURLs;

        return $obj;
    }
}
