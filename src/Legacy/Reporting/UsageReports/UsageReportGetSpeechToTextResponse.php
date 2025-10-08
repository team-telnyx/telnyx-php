<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\UsageReports;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type usage_report_get_speech_to_text_response = array{data?: mixed}
 */
final class UsageReportGetSpeechToTextResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<usage_report_get_speech_to_text_response> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public mixed $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(mixed $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(mixed $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
