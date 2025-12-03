<?php

declare(strict_types=1);

namespace Telnyx\InexplicitNumberOrders;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type InexplicitNumberOrderGetResponseShape = array{
 *   data?: InexplicitNumberOrderResponse|null
 * }
 */
final class InexplicitNumberOrderGetResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<InexplicitNumberOrderGetResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public ?InexplicitNumberOrderResponse $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?InexplicitNumberOrderResponse $data = null
    ): self {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(InexplicitNumberOrderResponse $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
