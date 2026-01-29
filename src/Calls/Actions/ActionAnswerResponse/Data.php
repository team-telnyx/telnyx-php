<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionAnswerResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{recordingID?: string|null, result?: string|null}
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * The ID of the recording. Only present when the record parameter is set to record-from-answer.
     */
    #[Optional('recording_id')]
    public ?string $recordingID;

    #[Optional]
    public ?string $result;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $recordingID = null,
        ?string $result = null
    ): self {
        $self = new self;

        null !== $recordingID && $self['recordingID'] = $recordingID;
        null !== $result && $self['result'] = $result;

        return $self;
    }

    /**
     * The ID of the recording. Only present when the record parameter is set to record-from-answer.
     */
    public function withRecordingID(string $recordingID): self
    {
        $self = clone $this;
        $self['recordingID'] = $recordingID;

        return $self;
    }

    public function withResult(string $result): self
    {
        $self = clone $this;
        $self['result'] = $result;

        return $self;
    }
}
