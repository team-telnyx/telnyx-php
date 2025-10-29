<?php

declare(strict_types=1);

namespace Telnyx\NumberBlockOrders;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type NumberBlockOrderNewResponseShape = array{data?: NumberBlockOrder}
 */
final class NumberBlockOrderNewResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<NumberBlockOrderNewResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public ?NumberBlockOrder $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?NumberBlockOrder $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(NumberBlockOrder $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
