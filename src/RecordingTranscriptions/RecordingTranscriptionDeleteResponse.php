<?php

declare(strict_types=1);

namespace Telnyx\RecordingTranscriptions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\RecordingTranscriptions\RecordingTranscription\RecordType;
use Telnyx\RecordingTranscriptions\RecordingTranscription\Status;

/**
 * @phpstan-type RecordingTranscriptionDeleteResponseShape = array{
 *   data?: RecordingTranscription|null
 * }
 */
final class RecordingTranscriptionDeleteResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<RecordingTranscriptionDeleteResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
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
     *   created_at?: string|null,
     *   duration_millis?: int|null,
     *   record_type?: value-of<RecordType>|null,
     *   recording_id?: string|null,
     *   status?: value-of<Status>|null,
     *   transcription_text?: string|null,
     *   updated_at?: string|null,
     * } $data
     */
    public static function with(RecordingTranscription|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param RecordingTranscription|array{
     *   id?: string|null,
     *   created_at?: string|null,
     *   duration_millis?: int|null,
     *   record_type?: value-of<RecordType>|null,
     *   recording_id?: string|null,
     *   status?: value-of<Status>|null,
     *   transcription_text?: string|null,
     *   updated_at?: string|null,
     * } $data
     */
    public function withData(RecordingTranscription|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
