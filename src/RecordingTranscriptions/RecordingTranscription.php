<?php

declare(strict_types=1);

namespace Telnyx\RecordingTranscriptions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\RecordingTranscriptions\RecordingTranscription\RecordType;
use Telnyx\RecordingTranscriptions\RecordingTranscription\Status;

/**
 * @phpstan-type RecordingTranscriptionShape = array{
 *   id?: string|null,
 *   createdAt?: string|null,
 *   durationMillis?: int|null,
 *   recordType?: null|RecordType|value-of<RecordType>,
 *   recordingID?: string|null,
 *   status?: null|Status|value-of<Status>,
 *   transcriptionText?: string|null,
 *   updatedAt?: string|null,
 * }
 */
final class RecordingTranscription implements BaseModel
{
    /** @use SdkModel<RecordingTranscriptionShape> */
    use SdkModel;

    /**
     * Uniquely identifies the recording transcription.
     */
    #[Optional]
    public ?string $id;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Optional('created_at')]
    public ?string $createdAt;

    /**
     * The duration of the recording transcription in milliseconds.
     */
    #[Optional('duration_millis')]
    public ?int $durationMillis;

    /** @var value-of<RecordType>|null $recordType */
    #[Optional('record_type', enum: RecordType::class)]
    public ?string $recordType;

    /**
     * Uniquely identifies the recording associated with this transcription.
     */
    #[Optional('recording_id')]
    public ?string $recordingID;

    /**
     * The status of the recording transcription. Only `completed` has transcription text available.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    /**
     * The recording's transcribed text.
     */
    #[Optional('transcription_text')]
    public ?string $transcriptionText;

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
     * @param RecordType|value-of<RecordType>|null $recordType
     * @param Status|value-of<Status>|null $status
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
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $durationMillis && $self['durationMillis'] = $durationMillis;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $recordingID && $self['recordingID'] = $recordingID;
        null !== $status && $self['status'] = $status;
        null !== $transcriptionText && $self['transcriptionText'] = $transcriptionText;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Uniquely identifies the recording transcription.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * The duration of the recording transcription in milliseconds.
     */
    public function withDurationMillis(int $durationMillis): self
    {
        $self = clone $this;
        $self['durationMillis'] = $durationMillis;

        return $self;
    }

    /**
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(RecordType|string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * Uniquely identifies the recording associated with this transcription.
     */
    public function withRecordingID(string $recordingID): self
    {
        $self = clone $this;
        $self['recordingID'] = $recordingID;

        return $self;
    }

    /**
     * The status of the recording transcription. Only `completed` has transcription text available.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * The recording's transcribed text.
     */
    public function withTranscriptionText(string $transcriptionText): self
    {
        $self = clone $this;
        $self['transcriptionText'] = $transcriptionText;

        return $self;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
