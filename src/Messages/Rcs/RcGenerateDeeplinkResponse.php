<?php

declare(strict_types=1);

namespace Telnyx\Messages\Rcs;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messages\Rcs\RcGenerateDeeplinkResponse\Data;

/**
 * @phpstan-type rc_generate_deeplink_response = array{data: Data}
 */
final class RcGenerateDeeplinkResponse implements BaseModel
{
    /** @use SdkModel<rc_generate_deeplink_response> */
    use SdkModel;

    #[Api]
    public Data $data;

    /**
     * `new RcGenerateDeeplinkResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RcGenerateDeeplinkResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RcGenerateDeeplinkResponse)->withData(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(Data $data): self
    {
        $obj = new self;

        $obj->data = $data;

        return $obj;
    }

    public function withData(Data $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
