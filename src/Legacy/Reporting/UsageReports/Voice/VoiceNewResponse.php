<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\UsageReports\Voice;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Legacy\Reporting\UsageReports\Voice\VoiceNewResponse\Data;

/**
 * @phpstan-type voice_new_response = array{data?: Data}
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class VoiceNewResponse implements BaseModel
{
    /** @use SdkModel<voice_new_response> */
    use SdkModel;

    /**
     * Legacy V2 CDR usage report response.
     */
    #[Api(optional: true)]
    public ?Data $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?Data $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    /**
     * Legacy V2 CDR usage report response.
     */
    public function withData(Data $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
