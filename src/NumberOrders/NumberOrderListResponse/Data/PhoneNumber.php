<?php

declare(strict_types=1);

namespace Telnyx\NumberOrders\NumberOrderListResponse\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * The unique phone numbers given as arguments in the job creation.
 *
 * @phpstan-type phone_number = array{id?: string, phoneNumber?: string}
 */
final class PhoneNumber implements BaseModel
{
    /** @use SdkModel<phone_number> */
    use SdkModel;

    /**
     * The phone number's ID.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * The phone number in e164 format.
     */
    #[Api('phone_number', optional: true)]
    public ?string $phoneNumber;

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
        ?string $id = null,
        ?string $phoneNumber = null
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $phoneNumber && $obj->phoneNumber = $phoneNumber;

        return $obj;
    }

    /**
     * The phone number's ID.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * The phone number in e164 format.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phoneNumber = $phoneNumber;

        return $obj;
    }
}
