<?php

declare(strict_types=1);

namespace Telnyx\RecordingTranscriptions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\RecordingTranscriptions\RecordingTranscription\RecordType;
use Telnyx\RecordingTranscriptions\RecordingTranscription\Status;

/**
 * @phpstan-type RecordingTranscriptionShape = array{
 *   id?: string|null,
 *   created_at?: string|null,
 *   duration_millis?: int|null,
 *   record_type?: value-of<RecordType>|null,
 *   recording_id?: string|null,
 *   status?: value-of<Status>|null,
 *   transcription_text?: string|null,
 *   updated_at?: string|null,
 * }
 */
final class RecordingTranscription implements BaseModel
{
    /** @use SdkModel<RecordingTranscriptionShape> */
    use SdkModel;

    /**
     * Uniquely identifies the recording transcription.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Api(optional: true)]
    public ?string $created_at;

    /**
     * The duration of the recording transcription in milliseconds.
     */
    #[Api(optional: true)]
    public ?int $duration_millis;

    /** @var value-of<RecordType>|null $record_type */
    #[Api(enum: RecordType::class, optional: true)]
    public ?string $record_type;

    /**
     * Uniquely identifies the recording associated with this transcription.
     */
    #[Api(optional: true)]
    public ?string $recording_id;

    /**
     * The status of the recording transcription. Only `completed` has transcription text available.
     *
     * @var value-of<Status>|null $status
     */
    #[Api(enum: Status::class, optional: true)]
    public ?string $status;

    /**
     * The recording's transcribed text.
     */
    #[Api(optional: true)]
    public ?string $transcription_text;

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
     * @param RecordType|value-of<RecordType> $record_type
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?string $id = null,
        ?string $created_at = null,
        ?int $duration_millis = null,
        RecordType|string|null $record_type = null,
        ?string $recording_id = null,
        Status|string|null $status = null,
        ?string $transcription_text = null,
        ?string $updated_at = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $duration_millis && $obj['duration_millis'] = $duration_millis;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $recording_id && $obj['recording_id'] = $recording_id;
        null !== $status && $obj['status'] = $status;
        null !== $transcription_text && $obj['transcription_text'] = $transcription_text;
        null !== $updated_at && $obj['updated_at'] = $updated_at;

        return $obj;
    }

    /**
     * Uniquely identifies the recording transcription.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    /**
     * The duration of the recording transcription in milliseconds.
     */
    public function withDurationMillis(int $durationMillis): self
    {
        $obj = clone $this;
        $obj['duration_millis'] = $durationMillis;

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
     * Uniquely identifies the recording associated with this transcription.
     */
    public function withRecordingID(string $recordingID): self
    {
        $obj = clone $this;
        $obj['recording_id'] = $recordingID;

        return $obj;
    }

    /**
     * The status of the recording transcription. Only `completed` has transcription text available.
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
     * The recording's transcribed text.
     */
    public function withTranscriptionText(string $transcriptionText): self
    {
        $obj = clone $this;
        $obj['transcription_text'] = $transcriptionText;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj['updated_at'] = $updatedAt;

        return $obj;
    }
}
