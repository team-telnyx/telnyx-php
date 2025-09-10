<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PhoneNumberExtensions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type phone_number_extension_new_response = array{
 *   data?: PortingPhoneNumberExtension|null
 * }
 */
final class PhoneNumberExtensionNewResponse implements BaseModel
{
    /** @use SdkModel<phone_number_extension_new_response> */
    use SdkModel;

    #[Api(optional: true)]
    public ?PortingPhoneNumberExtension $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?PortingPhoneNumberExtension $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(PortingPhoneNumberExtension $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
