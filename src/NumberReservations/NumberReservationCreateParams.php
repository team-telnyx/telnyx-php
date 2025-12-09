<?php

declare(strict_types=1);

namespace Telnyx\NumberReservations;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NumberReservations\ReservedPhoneNumber\Status;

/**
 * Creates a Phone Number Reservation for multiple numbers.
 *
 * @see Telnyx\Services\NumberReservationsService::create()
 *
 * @phpstan-type NumberReservationCreateParamsShape = array{
 *   customerReference?: string,
 *   phoneNumbers?: list<ReservedPhoneNumber|array{
 *     id?: string|null,
 *     createdAt?: \DateTimeInterface|null,
 *     expiredAt?: \DateTimeInterface|null,
 *     phoneNumber?: string|null,
 *     recordType?: string|null,
 *     status?: value-of<Status>|null,
 *     updatedAt?: \DateTimeInterface|null,
 *   }>,
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
     * @param list<ReservedPhoneNumber|array{
     *   id?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   expiredAt?: \DateTimeInterface|null,
     *   phoneNumber?: string|null,
     *   recordType?: string|null,
     *   status?: value-of<Status>|null,
     *   updatedAt?: \DateTimeInterface|null,
     * }> $phoneNumbers
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
     * @param list<ReservedPhoneNumber|array{
     *   id?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   expiredAt?: \DateTimeInterface|null,
     *   phoneNumber?: string|null,
     *   recordType?: string|null,
     *   status?: value-of<Status>|null,
     *   updatedAt?: \DateTimeInterface|null,
     * }> $phoneNumbers
     */
    public function withPhoneNumbers(array $phoneNumbers): self
    {
        $self = clone $this;
        $self['phoneNumbers'] = $phoneNumbers;

        return $self;
    }
}
