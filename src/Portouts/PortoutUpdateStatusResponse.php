<?php

declare(strict_types=1);

namespace Telnyx\Portouts;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type portout_update_status_response = array{data?: PortoutDetails}
 */
final class PortoutUpdateStatusResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<portout_update_status_response> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public ?PortoutDetails $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?PortoutDetails $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(PortoutDetails $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
