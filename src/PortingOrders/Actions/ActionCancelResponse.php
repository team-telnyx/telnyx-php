<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\Actions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\PortingOrders\Actions\ActionCancelResponse\Meta;
use Telnyx\PortingOrders\PortingOrder;

/**
 * @phpstan-type action_cancel_response = array{data?: PortingOrder, meta?: Meta}
 */
final class ActionCancelResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<action_cancel_response> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public ?PortingOrder $data;

    #[Api(optional: true)]
    public ?Meta $meta;

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
        ?PortingOrder $data = null,
        ?Meta $meta = null
    ): self {
        $obj = new self;

        null !== $data && $obj->data = $data;
        null !== $meta && $obj->meta = $meta;

        return $obj;
    }

    public function withData(PortingOrder $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }

    public function withMeta(Meta $meta): self
    {
        $obj = clone $this;
        $obj->meta = $meta;

        return $obj;
    }
}
