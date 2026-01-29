<?php

declare(strict_types=1);

namespace Telnyx\NumberReservations;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Creates a Phone Number Reservation for multiple numbers.
 *
 * @see Telnyx\Services\NumberReservationsService::create()
 *
 * @phpstan-import-type ReservedPhoneNumberShape from \Telnyx\NumberReservations\ReservedPhoneNumber
 *
 * @phpstan-type NumberReservationCreateParamsShape = array{
 *   customerReference?: string|null,
 *   phoneNumbers?: list<ReservedPhoneNumber|ReservedPhoneNumberShape>|null,
 * }
 */
final class NumberReservationCreateParams implements BaseModel
{
    /** @use SdkModel<NumberReservationCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * A customer reference string for customer look ups.
     */
    #[Optional('customer_reference')]
    public ?string $customerReference;

    /** @var list<ReservedPhoneNumber>|null $phoneNumbers */
    #[Optional('phone_numbers', list: ReservedPhoneNumber::class)]
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
     * @param list<ReservedPhoneNumber|ReservedPhoneNumberShape>|null $phoneNumbers
     */
    public static function with(
        ?string $customerReference = null,
        ?array $phoneNumbers = null
    ): self {
        $self = new self;

        null !== $customerReference && $self['customerReference'] = $customerReference;
        null !== $phoneNumbers && $self['phoneNumbers'] = $phoneNumbers;

        return $self;
    }

    /**
     * A customer reference string for customer look ups.
     */
    public function withCustomerReference(string $customerReference): self
    {
        $self = clone $this;
        $self['customerReference'] = $customerReference;

        return $self;
    }

    /**
     * @param list<ReservedPhoneNumber|ReservedPhoneNumberShape> $phoneNumbers
     */
    public function withPhoneNumbers(array $phoneNumbers): self
    {
        $self = clone $this;
        $self['phoneNumbers'] = $phoneNumbers;

        return $self;
    }
}
