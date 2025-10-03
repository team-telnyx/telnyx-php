<?php

declare(strict_types=1);

namespace Telnyx\RecordingTranscriptions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\RecordingTranscriptions\RecordingTranscription\RecordType;
use Telnyx\RecordingTranscriptions\RecordingTranscription\Status;

/**
 * @phpstan-type recording_transcription = array{
 *   id?: string,
 *   createdAt?: string,
 *   durationMillis?: int,
 *   recordType?: value-of<RecordType>,
 *   recordingID?: string,
 *   status?: value-of<Status>,
 *   transcriptionText?: string,
 *   updatedAt?: string,
 * }
 */
final class RecordingTranscription implements BaseModel
{
    /** @use SdkModel<recording_transcription> */
    use SdkModel;

    /**
     * Uniquely identifies the recording transcription.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Api('created_at', optional: true)]
    public ?string $createdAt;

    /**
     * The duration of the recording transcription in milliseconds.
     */
    #[Api('duration_millis', optional: true)]
    public ?int $durationMillis;

    /** @var value-of<RecordType>|null $recordType */
    #[Api('record_type', enum: RecordType::class, optional: true)]
    public ?string $recordType;

    /**
     * Uniquely identifies the recording associated with this transcription.
     */
    #[Api('recording_id', optional: true)]
    public ?string $recordingID;

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
    #[Api('transcription_text', optional: true)]
    public ?string $transcriptionText;

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    #[Api('updated_at', optional: true)]
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
     * @param RecordType|value-of<RecordType> $recordType
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?string $id = null,
        ?string $createdAt = null,
        ?int $durationMillis = null,
        RecordType|string|null $recordType = null,
        ?string $recordingID = null,
        Status|string|null $status = null,
        ?string $transcriptionText = null,
        ?string $updatedAt = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $durationMillis && $obj->durationMillis = $durationMillis;
        null !== $recordType && $obj['recordType'] = $recordType;
        null !== $recordingID && $obj->recordingID = $recordingID;
        null !== $status && $obj['status'] = $status;
        null !== $transcriptionText && $obj->transcriptionText = $transcriptionText;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;

        return $obj;
    }

    /**
     * Uniquely identifies the recording transcription.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * The duration of the recording transcription in milliseconds.
     */
    public function withDurationMillis(int $durationMillis): self
    {
        $obj = clone $this;
        $obj->durationMillis = $durationMillis;

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
     * Uniquely identifies the recording associated with this transcription.
     */
    public function withRecordingID(string $recordingID): self
    {
        $obj = clone $this;
        $obj->recordingID = $recordingID;

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
        $obj->transcriptionText = $transcriptionText;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }
}
