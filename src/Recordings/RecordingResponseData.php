<?php

declare(strict_types=1);

namespace Telnyx\Recordings;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Recordings\RecordingResponseData\Channels;
use Telnyx\Recordings\RecordingResponseData\DownloadURLs;
use Telnyx\Recordings\RecordingResponseData\RecordType;
use Telnyx\Recordings\RecordingResponseData\Source;
use Telnyx\Recordings\RecordingResponseData\Status;

/**
 * @phpstan-type RecordingResponseDataShape = array{
 *   id?: string|null,
 *   callControlID?: string|null,
 *   callLegID?: string|null,
 *   callSessionID?: string|null,
 *   channels?: value-of<Channels>|null,
 *   conferenceID?: string|null,
 *   createdAt?: string|null,
 *   downloadURLs?: DownloadURLs|null,
 *   durationMillis?: int|null,
 *   recordType?: value-of<RecordType>|null,
 *   recordingEndedAt?: string|null,
 *   recordingStartedAt?: string|null,
 *   source?: value-of<Source>|null,
 *   status?: value-of<Status>|null,
 *   updatedAt?: string|null,
 * }
 */
final class RecordingResponseData implements BaseModel
{
    /** @use SdkModel<RecordingResponseDataShape> */
    use SdkModel;

    /**
     * Uniquely identifies the recording.
     */
    #[Optional]
    public ?string $id;

    /**
     * Unique identifier and token for controlling the call.
     */
    #[Optional('call_control_id')]
    public ?string $callControlID;

    /**
     * ID unique to the call leg (used to correlate webhook events).
     */
    #[Optional('call_leg_id')]
    public ?string $callLegID;

    /**
     * ID that is unique to the call session and can be used to correlate webhook events. Call session is a group of related call legs that logically belong to the same phone call, e.g. an inbound and outbound leg of a transferred call.
     */
    #[Optional('call_session_id')]
    public ?string $callSessionID;

    /**
     * When `dual`, the final audio file has the first leg on channel A, and the rest on channel B.
     *
     * @var value-of<Channels>|null $channels
     */
    #[Optional(enum: Channels::class)]
    public ?string $channels;

    /**
     * Uniquely identifies the conference.
     */
    #[Optional('conference_id')]
    public ?string $conferenceID;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Optional('created_at')]
    public ?string $createdAt;

    /**
     * Links to download the recording files.
     */
    #[Optional('download_urls')]
    public ?DownloadURLs $downloadURLs;

    /**
     * The duration of the recording in milliseconds.
     */
    #[Optional('duration_millis')]
    public ?int $durationMillis;

    /** @var value-of<RecordType>|null $recordType */
    #[Optional('record_type', enum: RecordType::class)]
    public ?string $recordType;

    /**
     * ISO 8601 formatted date of when the recording ended.
     */
    #[Optional('recording_ended_at')]
    public ?string $recordingEndedAt;

    /**
     * ISO 8601 formatted date of when the recording started.
     */
    #[Optional('recording_started_at')]
    public ?string $recordingStartedAt;

    /**
     * The kind of event that led to this recording being created.
     *
     * @var value-of<Source>|null $source
     */
    #[Optional(enum: Source::class)]
    public ?string $source;

    /**
     * The status of the recording. Only `completed` recordings are currently supported.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    #[Optional('updated_at')]
    public ?string $updatedAt;

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
     * @param DownloadURLs|array{mp3?: string|null, wav?: string|null} $downloadURLs
     * @param RecordType|value-of<RecordType> $recordType
     * @param Source|value-of<Source> $source
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?string $id = null,
        ?string $callControlID = null,
        ?string $callLegID = null,
        ?string $callSessionID = null,
        Channels|string|null $channels = null,
        ?string $conferenceID = null,
        ?string $createdAt = null,
        DownloadURLs|array|null $downloadURLs = null,
        ?int $durationMillis = null,
        RecordType|string|null $recordType = null,
        ?string $recordingEndedAt = null,
        ?string $recordingStartedAt = null,
        Source|string|null $source = null,
        Status|string|null $status = null,
        ?string $updatedAt = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $callControlID && $obj['callControlID'] = $callControlID;
        null !== $callLegID && $obj['callLegID'] = $callLegID;
        null !== $callSessionID && $obj['callSessionID'] = $callSessionID;
        null !== $channels && $obj['channels'] = $channels;
        null !== $conferenceID && $obj['conferenceID'] = $conferenceID;
        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $downloadURLs && $obj['downloadURLs'] = $downloadURLs;
        null !== $durationMillis && $obj['durationMillis'] = $durationMillis;
        null !== $recordType && $obj['recordType'] = $recordType;
        null !== $recordingEndedAt && $obj['recordingEndedAt'] = $recordingEndedAt;
        null !== $recordingStartedAt && $obj['recordingStartedAt'] = $recordingStartedAt;
        null !== $source && $obj['source'] = $source;
        null !== $status && $obj['status'] = $status;
        null !== $updatedAt && $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    /**
     * Uniquely identifies the recording.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * Unique identifier and token for controlling the call.
     */
    public function withCallControlID(string $callControlID): self
    {
        $obj = clone $this;
        $obj['callControlID'] = $callControlID;

        return $obj;
    }

    /**
     * ID unique to the call leg (used to correlate webhook events).
     */
    public function withCallLegID(string $callLegID): self
    {
        $obj = clone $this;
        $obj['callLegID'] = $callLegID;

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
     * When `dual`, the final audio file has the first leg on channel A, and the rest on channel B.
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
     * Uniquely identifies the conference.
     */
    public function withConferenceID(string $conferenceID): self
    {
        $obj = clone $this;
        $obj['conferenceID'] = $conferenceID;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    /**
     * Links to download the recording files.
     *
     * @param DownloadURLs|array{mp3?: string|null, wav?: string|null} $downloadURLs
     */
    public function withDownloadURLs(DownloadURLs|array $downloadURLs): self
    {
        $obj = clone $this;
        $obj['downloadURLs'] = $downloadURLs;

        return $obj;
    }

    /**
     * The duration of the recording in milliseconds.
     */
    public function withDurationMillis(int $durationMillis): self
    {
        $obj = clone $this;
        $obj['durationMillis'] = $durationMillis;

        return $obj;
    }

    /**
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(RecordType|string $recordType): self
    {
        $obj = clone $this;
        $obj['recordType'] = $recordType;

        return $obj;
    }

    /**
     * ISO 8601 formatted date of when the recording ended.
     */
    public function withRecordingEndedAt(string $recordingEndedAt): self
    {
        $obj = clone $this;
        $obj['recordingEndedAt'] = $recordingEndedAt;

        return $obj;
    }

    /**
     * ISO 8601 formatted date of when the recording started.
     */
    public function withRecordingStartedAt(string $recordingStartedAt): self
    {
        $obj = clone $this;
        $obj['recordingStartedAt'] = $recordingStartedAt;

        return $obj;
    }

    /**
     * The kind of event that led to this recording being created.
     *
     * @param Source|value-of<Source> $source
     */
    public function withSource(Source|string $source): self
    {
        $obj = clone $this;
        $obj['source'] = $source;

        return $obj;
    }

    /**
     * The status of the recording. Only `completed` recordings are currently supported.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }
}
