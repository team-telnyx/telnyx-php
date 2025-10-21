<?php

declare(strict_types=1);

namespace Telnyx\NumberReservations;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Creates a Phone Number Reservation for multiple numbers.
 *
 * @see Telnyx\NumberReservations->create
 *
 * @phpstan-type number_reservation_create_params = array{
 *   customerReference?: string, phoneNumbers?: list<ReservedPhoneNumber>
 * }
 */
final class NumberReservationCreateParams implements BaseModel
{
    /** @use SdkModel<number_reservation_create_params> */
    use SdkModel;
    use SdkParams;

    /**
     * A customer reference string for customer look ups.
     */
    #[Api('customer_reference', optional: true)]
    public ?string $customerReference;

    /** @var list<ReservedPhoneNumber>|null $phoneNumbers */
    #[Api('phone_numbers', list: ReservedPhoneNumber::class, optional: true)]
    public ?array $phoneNumbers;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<ReservedPhoneNumber> $phoneNumbers
     */
    public static function with(
        ?string $customerReference = null,
        ?array $phoneNumbers = null
    ): self {
        $obj = new self;

        null !== $customerReference && $obj->customerReference = $customerReference;
        null !== $phoneNumbers && $obj->phoneNumbers = $phoneNumbers;

        return $obj;
    }

    /**
     * A customer reference string for customer look ups.
     */
    public function withCustomerReference(string $customerReference): self
    {
        $obj = clone $this;
        $obj->customerReference = $customerReference;

        return $obj;
    }

    /**
     * @param list<ReservedPhoneNumber> $phoneNumbers
     */
    public function withPhoneNumbers(array $phoneNumbers): self
    {
        $obj = clone $this;
        $obj->phoneNumbers = $phoneNumbers;

        return $obj;
    }
}
