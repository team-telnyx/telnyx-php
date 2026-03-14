<?php

declare(strict_types=1);

namespace Telnyx\RecordingTranscriptions\RecordingTranscriptionListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\RecordingTranscriptions\RecordingTranscriptionListParams\Filter\CreatedAt;

/**
 * Filter recording transcriptions by various attributes.
 *
 * @phpstan-import-type CreatedAtShape from \Telnyx\RecordingTranscriptions\RecordingTranscriptionListParams\Filter\CreatedAt
 *
 * @phpstan-type FilterShape = array{
 *   createdAt?: null|CreatedAt|CreatedAtShape, recordingID?: string|null
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    #[Optional('created_at')]
    public ?CreatedAt $createdAt;

    /**
     * If present, transcriptions will be filtered to those associated with the given recording.
     */
    #[Optional('recording_id')]
    public ?string $recordingID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CreatedAt|CreatedAtShape|null $createdAt
     */
    public static function with(
        CreatedAt|array|null $createdAt = null,
        ?string $recordingID = null
    ): self {
        $self = new self;

        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $recordingID && $self['recordingID'] = $recordingID;

        return $self;
    }

    /**
     * @param CreatedAt|CreatedAtShape $createdAt
     */
    public function withCreatedAt(CreatedAt|array $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * If present, transcriptions will be filtered to those associated with the given recording.
     */
    public function withRecordingID(string $recordingID): self
    {
        $self = clone $this;
        $self['recordingID'] = $recordingID;

        return $self;
    }
}
