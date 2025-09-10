<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PhoneNumberBlocks;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type phone_number_block_new_response = array{
 *   data?: PortingPhoneNumberBlock|null
 * }
 */
final class PhoneNumberBlockNewResponse implements BaseModel
{
    /** @use SdkModel<phone_number_block_new_response> */
    use SdkModel;

    #[Api(optional: true)]
    public ?PortingPhoneNumberBlock $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?PortingPhoneNumberBlock $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(PortingPhoneNumberBlock $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
