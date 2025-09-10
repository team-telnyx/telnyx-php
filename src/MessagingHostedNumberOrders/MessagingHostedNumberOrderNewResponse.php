<?php

declare(strict_types=1);

namespace Telnyx\MessagingHostedNumberOrders;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MessagingHostedNumberOrder;

/**
 * @phpstan-type messaging_hosted_number_order_new_response = array{
 *   data?: MessagingHostedNumberOrder|null
 * }
 */
final class MessagingHostedNumberOrderNewResponse implements BaseModel
{
    /** @use SdkModel<messaging_hosted_number_order_new_response> */
    use SdkModel;

    #[Api(optional: true)]
    public ?MessagingHostedNumberOrder $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?MessagingHostedNumberOrder $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(MessagingHostedNumberOrder $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
