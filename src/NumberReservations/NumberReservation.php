<?php

declare(strict_types=1);

namespace Telnyx\NumberReservations;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NumberReservations\NumberReservation\Status;

/**
 * @phpstan-import-type ReservedPhoneNumberShape from \Telnyx\NumberReservations\ReservedPhoneNumber
 *
 * @phpstan-type NumberReservationShape = array{
 *   id?: string|null,
 *   createdAt?: \DateTimeInterface|null,
 *   customerReference?: string|null,
 *   phoneNumbers?: list<ReservedPhoneNumberShape>|null,
 *   recordType?: string|null,
 *   status?: null|Status|value-of<Status>,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class NumberReservation implements BaseModel
{
    /** @use SdkModel<NumberReservationShape> */
    use SdkModel;

    #[Optional]
    public ?string $id;

    /**
     * An ISO 8901 datetime string denoting when the numbers reservation was created.
     */
    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * A customer reference string for customer look ups.
     */
    #[Optional('customer_reference')]
    public ?string $customerReference;

    /** @var list<ReservedPhoneNumber>|null $phoneNumbers */
    #[Optional('phone_numbers', list: ReservedPhoneNumber::class)]
    public ?array $phoneNumbers;

    #[Optional('record_type')]
    public ?string $recordType;

    /**
     * The status of the entire reservation.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    /**
     * An ISO 8901 datetime string for when the number reservation was updated.
     */
    #[Optional('updated_at')]
    public ?\DateTimeInterface $updatedAt;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<ReservedPhoneNumberShape>|null $phoneNumbers
     * @param Status|value-of<Status>|null $status
     */
    public static function with(
        ?string $id = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $customerReference = null,
        ?array $phoneNumbers = null,
        ?string $recordType = null,
        Status|string|null $status = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $customerReference && $self['customerReference'] = $customerReference;
        null !== $phoneNumbers && $self['phoneNumbers'] = $phoneNumbers;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $status && $self['status'] = $status;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * An ISO 8901 datetime string denoting when the numbers reservation was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

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
     * @param list<ReservedPhoneNumberShape> $phoneNumbers
     */
    public function withPhoneNumbers(array $phoneNumbers): self
    {
        $self = clone $this;
        $self['phoneNumbers'] = $phoneNumbers;

        return $self;
    }

    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * The status of the entire reservation.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * An ISO 8901 datetime string for when the number reservation was updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
