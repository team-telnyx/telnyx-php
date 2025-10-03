<?php

declare(strict_types=1);

namespace Telnyx\RecordingTranscriptions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type recording_transcription_delete_response = array{
 *   data?: RecordingTranscription
 * }
 */
final class RecordingTranscriptionDeleteResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<recording_transcription_delete_response> */
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
     */
    public static function with(?RecordingTranscription $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(RecordingTranscription $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
