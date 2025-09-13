<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\PhoneNumbers;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type phone_number_update_response = array{
 *   data?: ExternalConnectionPhoneNumber
 * }
 * When used in a response, this type parameter can be used to define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class PhoneNumberUpdateResponse implements BaseModel
{
    /** @use SdkModel<phone_number_update_response> */
    use SdkModel;

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
