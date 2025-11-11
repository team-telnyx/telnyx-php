<?php

declare(strict_types=1);

namespace Telnyx\NumberOrders;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type NumberOrderGetResponseShape = array{
 *   data?: NumberOrderWithPhoneNumbers|null
 * }
 */
final class NumberOrderGetResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<NumberOrderGetResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public ?NumberOrderWithPhoneNumbers $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?NumberOrderWithPhoneNumbers $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(NumberOrderWithPhoneNumbers $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
