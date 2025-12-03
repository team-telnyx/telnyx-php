<?php

declare(strict_types=1);

namespace Telnyx\Recordings;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\Recordings\RecordingResponseData\Channels;
use Telnyx\Recordings\RecordingResponseData\DownloadURLs;
use Telnyx\Recordings\RecordingResponseData\RecordType;
use Telnyx\Recordings\RecordingResponseData\Source;
use Telnyx\Recordings\RecordingResponseData\Status;

/**
 * @phpstan-type RecordingResponseDataShape = array{
 *   id?: string|null,
 *   call_control_id?: string|null,
 *   call_leg_id?: string|null,
 *   call_session_id?: string|null,
 *   channels?: value-of<Channels>|null,
 *   conference_id?: string|null,
 *   created_at?: string|null,
 *   download_urls?: DownloadURLs|null,
 *   duration_millis?: int|null,
 *   record_type?: value-of<RecordType>|null,
 *   recording_ended_at?: string|null,
 *   recording_started_at?: string|null,
 *   source?: value-of<Source>|null,
 *   status?: value-of<Status>|null,
 *   updated_at?: string|null,
 * }
 */
final class RecordingResponseData implements BaseModel, ResponseConverter
{
    /** @use SdkModel<RecordingResponseDataShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * Uniquely identifies the recording.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * Unique identifier and token for controlling the call.
     */
    #[Api(optional: true)]
    public ?string $call_control_id;

    /**
     * ID unique to the call leg (used to correlate webhook events).
     */
    #[Api(optional: true)]
    public ?string $call_leg_id;

    /**
     * ID that is unique to the call session and can be used to correlate webhook events. Call session is a group of related call legs that logically belong to the same phone call, e.g. an inbound and outbound leg of a transferred call.
     */
    #[Api(optional: true)]
    public ?string $call_session_id;

    /**
     * When `dual`, the final audio file has the first leg on channel A, and the rest on channel B.
     *
     * @var value-of<Channels>|null $channels
     */
    #[Api(enum: Channels::class, optional: true)]
    public ?string $channels;

    /**
     * Uniquely identifies the conference.
     */
    #[Api(optional: true)]
    public ?string $conference_id;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Api(optional: true)]
    public ?string $created_at;

    /**
     * Links to download the recording files.
     */
    #[Api(optional: true)]
    public ?DownloadURLs $download_urls;

    /**
     * The duration of the recording in milliseconds.
     */
    #[Api(optional: true)]
    public ?int $duration_millis;

    /** @var value-of<RecordType>|null $record_type */
    #[Api(enum: RecordType::class, optional: true)]
    public ?string $record_type;

    /**
     * ISO 8601 formatted date of when the recording ended.
     */
    #[Api(optional: true)]
    public ?string $recording_ended_at;

    /**
     * ISO 8601 formatted date of when the recording started.
     */
    #[Api(optional: true)]
    public ?string $recording_started_at;

    /**
     * The kind of event that led to this recording being created.
     *
     * @var value-of<Source>|null $source
     */
    #[Api(enum: Source::class, optional: true)]
    public ?string $source;

    /**
     * The status of the recording. Only `completed` recordings are currently supported.
     *
     * @var value-of<Status>|null $status
     */
    #[Api(enum: Status::class, optional: true)]
    public ?string $status;

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    #[Api(optional: true)]
    public ?string $updated_at;

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
     * @param RecordType|value-of<RecordType> $record_type
     * @param Source|value-of<Source> $source
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?string $id = null,
        ?string $call_control_id = null,
        ?string $call_leg_id = null,
        ?string $call_session_id = null,
        Channels|string|null $channels = null,
        ?string $conference_id = null,
        ?string $created_at = null,
        ?DownloadURLs $download_urls = null,
        ?int $duration_millis = null,
        RecordType|string|null $record_type = null,
        ?string $recording_ended_at = null,
        ?string $recording_started_at = null,
        Source|string|null $source = null,
        Status|string|null $status = null,
        ?string $updated_at = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $call_control_id && $obj->call_control_id = $call_control_id;
        null !== $call_leg_id && $obj->call_leg_id = $call_leg_id;
        null !== $call_session_id && $obj->call_session_id = $call_session_id;
        null !== $channels && $obj['channels'] = $channels;
        null !== $conference_id && $obj->conference_id = $conference_id;
        null !== $created_at && $obj->created_at = $created_at;
        null !== $download_urls && $obj->download_urls = $download_urls;
        null !== $duration_millis && $obj->duration_millis = $duration_millis;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $recording_ended_at && $obj->recording_ended_at = $recording_ended_at;
        null !== $recording_started_at && $obj->recording_started_at = $recording_started_at;
        null !== $source && $obj['source'] = $source;
        null !== $status && $obj['status'] = $status;
        null !== $updated_at && $obj->updated_at = $updated_at;

        return $obj;
    }

    /**
     * Uniquely identifies the recording.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * Unique identifier and token for controlling the call.
     */
    public function withCallControlID(string $callControlID): self
    {
        $obj = clone $this;
        $obj->call_control_id = $callControlID;

        return $obj;
    }

    /**
     * ID unique to the call leg (used to correlate webhook events).
     */
    public function withCallLegID(string $callLegID): self
    {
        $obj = clone $this;
        $obj->call_leg_id = $callLegID;

        return $obj;
    }

    /**
     * ID that is unique to the call session and can be used to correlate webhook events. Call session is a group of related call legs that logically belong to the same phone call, e.g. an inbound and outbound leg of a transferred call.
     */
    public function withCallSessionID(string $callSessionID): self
    {
        $obj = clone $this;
        $obj->call_session_id = $callSessionID;

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
        $obj->conference_id = $conferenceID;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj->created_at = $createdAt;

        return $obj;
    }

    /**
     * Links to download the recording files.
     */
    public function withDownloadURLs(DownloadURLs $downloadURLs): self
    {
        $obj = clone $this;
        $obj->download_urls = $downloadURLs;

        return $obj;
    }

    /**
     * The duration of the recording in milliseconds.
     */
    public function withDurationMillis(int $durationMillis): self
    {
        $obj = clone $this;
        $obj->duration_millis = $durationMillis;

        return $obj;
    }

    /**
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(RecordType|string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }

    /**
     * ISO 8601 formatted date of when the recording ended.
     */
    public function withRecordingEndedAt(string $recordingEndedAt): self
    {
        $obj = clone $this;
        $obj->recording_ended_at = $recordingEndedAt;

        return $obj;
    }

    /**
     * ISO 8601 formatted date of when the recording started.
     */
    public function withRecordingStartedAt(string $recordingStartedAt): self
    {
        $obj = clone $this;
        $obj->recording_started_at = $recordingStartedAt;

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
        $obj->updated_at = $updatedAt;

        return $obj;
    }
}
