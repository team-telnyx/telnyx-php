<?php

declare(strict_types=1);

namespace Telnyx\RecordingTranscriptions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type recording_transcription_delete_response = array{
 *   data?: RecordingTranscription
 * }
 * When used in a response, this type parameter can be used to define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class RecordingTranscriptionDeleteResponse implements BaseModel
{
    /** @use SdkModel<recording_transcription_delete_response> */
    use SdkModel;

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
