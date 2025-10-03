<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\BatchDetailRecords\Voice;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type voice_get_response = array{data?: CdrDetailedReqResponse}
 */
final class VoiceGetResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<voice_get_response> */
    use SdkModel;

    use SdkResponse;

    /**
     * Response object for CDR detailed report.
     */
    #[Api(optional: true)]
    public ?CdrDetailedReqResponse $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?CdrDetailedReqResponse $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    /**
     * Response object for CDR detailed report.
     */
    public function withData(CdrDetailedReqResponse $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
