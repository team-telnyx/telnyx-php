<?php

declare(strict_types=1);

namespace Telnyx\SimCardOrders;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type sim_card_order_new_response = array{data?: SimCardOrder}
 * When used in a response, this type parameter can be used to define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class SimCardOrderNewResponse implements BaseModel
{
    /** @use SdkModel<sim_card_order_new_response> */
    use SdkModel;

    #[Api(optional: true)]
    public ?SimCardOrder $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?SimCardOrder $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(SimCardOrder $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
