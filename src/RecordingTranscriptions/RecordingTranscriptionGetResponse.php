<?php

declare(strict_types=1);

namespace Telnyx\RecordingTranscriptions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\RecordingTranscriptions\RecordingTranscription\RecordType;
use Telnyx\RecordingTranscriptions\RecordingTranscription\Status;

/**
 * @phpstan-type RecordingTranscriptionGetResponseShape = array{
 *   data?: RecordingTranscription|null
 * }
 */
final class RecordingTranscriptionGetResponse implements BaseModel
{
    /** @use SdkModel<RecordingTranscriptionGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?RecordingTranscription $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param RecordingTranscription|array{
     *   id?: string|null,
     *   createdAt?: string|null,
     *   durationMillis?: int|null,
     *   recordType?: value-of<RecordType>|null,
     *   recordingID?: string|null,
     *   status?: value-of<Status>|null,
     *   transcriptionText?: string|null,
     *   updatedAt?: string|null,
     * } $data
     */
    public static function with(RecordingTranscription|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param RecordingTranscription|array{
     *   id?: string|null,
     *   createdAt?: string|null,
     *   durationMillis?: int|null,
     *   recordType?: value-of<RecordType>|null,
     *   recordingID?: string|null,
     *   status?: value-of<Status>|null,
     *   transcriptionText?: string|null,
     *   updatedAt?: string|null,
     * } $data
     */
    public function withData(RecordingTranscription|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
