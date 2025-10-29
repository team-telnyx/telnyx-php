<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionAnswerResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{recordingID?: string, result?: string}
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * The ID of the recording. Only present when the record parameter is set to record-from-answer.
     */
    #[Api('recording_id', optional: true)]
    public ?string $recordingID;

    #[Api(optional: true)]
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
        $obj = new self;

        null !== $recordingID && $obj->recordingID = $recordingID;
        null !== $result && $obj->result = $result;

        return $obj;
    }

    /**
     * The ID of the recording. Only present when the record parameter is set to record-from-answer.
     */
    public function withRecordingID(string $recordingID): self
    {
        $obj = clone $this;
        $obj->recordingID = $recordingID;

        return $obj;
    }

    public function withResult(string $result): self
    {
        $obj = clone $this;
        $obj->result = $result;

        return $obj;
    }
}
