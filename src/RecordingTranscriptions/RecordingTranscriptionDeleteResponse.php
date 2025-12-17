<?php

declare(strict_types=1);

namespace Telnyx\RecordingTranscriptions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type RecordingTranscriptionShape from \Telnyx\RecordingTranscriptions\RecordingTranscription
 *
 * @phpstan-type RecordingTranscriptionDeleteResponseShape = array{
 *   data?: null|RecordingTranscription|RecordingTranscriptionShape
 * }
 */
final class RecordingTranscriptionDeleteResponse implements BaseModel
{
    /** @use SdkModel<RecordingTranscriptionDeleteResponseShape> */
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
     * @param RecordingTranscription|RecordingTranscriptionShape|null $data
     */
    public static function with(RecordingTranscription|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param RecordingTranscription|RecordingTranscriptionShape $data
     */
    public function withData(RecordingTranscription|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
