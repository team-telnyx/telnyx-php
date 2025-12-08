<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionAnswerResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   recording_id?: string|null, result?: string|null
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * The ID of the recording. Only present when the record parameter is set to record-from-answer.
     */
    #[Optional]
    public ?string $recording_id;

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
        ?string $recording_id = null,
        ?string $result = null
    ): self {
        $obj = new self;

        null !== $recording_id && $obj['recording_id'] = $recording_id;
        null !== $result && $obj['result'] = $result;

        return $obj;
    }

    /**
     * The ID of the recording. Only present when the record parameter is set to record-from-answer.
     */
    public function withRecordingID(string $recordingID): self
    {
        $obj = clone $this;
        $obj['recording_id'] = $recordingID;

        return $obj;
    }

    public function withResult(string $result): self
    {
        $obj = clone $this;
        $obj['result'] = $result;

        return $obj;
    }
}
