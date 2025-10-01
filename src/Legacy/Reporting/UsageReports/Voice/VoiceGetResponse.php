<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\UsageReports\Voice;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type voice_get_response = array{data?: CdrUsageReportResponseLegacy}
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class VoiceGetResponse implements BaseModel
{
    /** @use SdkModel<voice_get_response> */
    use SdkModel;

    /**
     * Legacy V2 CDR usage report response.
     */
    #[Api(optional: true)]
    public ?CdrUsageReportResponseLegacy $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?CdrUsageReportResponseLegacy $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    /**
     * Legacy V2 CDR usage report response.
     */
    public function withData(CdrUsageReportResponseLegacy $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
