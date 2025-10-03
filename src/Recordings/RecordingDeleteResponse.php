<?php

declare(strict_types=1);

namespace Telnyx\Recordings;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type recording_delete_response = array{data?: RecordingResponseData}
 */
final class RecordingDeleteResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<recording_delete_response> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public ?RecordingResponseData $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?RecordingResponseData $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(RecordingResponseData $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
