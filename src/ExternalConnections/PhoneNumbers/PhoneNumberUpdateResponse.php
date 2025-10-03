<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\PhoneNumbers;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type phone_number_update_response = array{
 *   data?: ExternalConnectionPhoneNumber
 * }
 */
final class PhoneNumberUpdateResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<phone_number_update_response> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public ?ExternalConnectionPhoneNumber $data;

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
        ?ExternalConnectionPhoneNumber $data = null
    ): self {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(ExternalConnectionPhoneNumber $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
