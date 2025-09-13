<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NumberBlockOrders\NumberBlockOrder;

/**
 * @phpstan-type number_order_status_update_webhook_event = array{
 *   data?: NumberBlockOrder
 * }
 */
final class NumberOrderStatusUpdateWebhookEvent implements BaseModel
{
    /** @use SdkModel<number_order_status_update_webhook_event> */
    use SdkModel;

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
