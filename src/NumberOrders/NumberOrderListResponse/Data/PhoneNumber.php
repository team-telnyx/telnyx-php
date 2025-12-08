<?php

declare(strict_types=1);

namespace Telnyx\NumberOrders\NumberOrderListResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * The unique phone numbers given as arguments in the job creation.
 *
 * @phpstan-type PhoneNumberShape = array{
 *   id?: string|null, phone_number?: string|null
 * }
 */
final class PhoneNumber implements BaseModel
{
    /** @use SdkModel<PhoneNumberShape> */
    use SdkModel;

    /**
     * The phone number's ID.
     */
    #[Optional]
    public ?string $id;

    /**
     * The phone number in e164 format.
     */
    #[Optional]
    public ?string $phone_number;

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
        ?string $phone_number = null
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $phone_number && $obj['phone_number'] = $phone_number;

        return $obj;
    }

    /**
     * The phone number's ID.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * The phone number in e164 format.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phone_number'] = $phoneNumber;

        return $obj;
    }
}
