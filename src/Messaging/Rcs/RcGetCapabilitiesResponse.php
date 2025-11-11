<?php

declare(strict_types=1);

namespace Telnyx\Messaging\Rcs;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type RcGetCapabilitiesResponseShape = array{
 *   data?: RcsCapabilities|null
 * }
 */
final class RcGetCapabilitiesResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<RcGetCapabilitiesResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public ?RcsCapabilities $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?RcsCapabilities $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(RcsCapabilities $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
