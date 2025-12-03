<?php

declare(strict_types=1);

namespace Telnyx\NumberReservations;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\NumberReservations\NumberReservation\Status;

/**
 * @phpstan-type NumberReservationShape = array{
 *   id?: string|null,
 *   created_at?: \DateTimeInterface|null,
 *   customer_reference?: string|null,
 *   phone_numbers?: list<ReservedPhoneNumber>|null,
 *   record_type?: string|null,
 *   status?: value-of<Status>|null,
 *   updated_at?: \DateTimeInterface|null,
 * }
 */
final class NumberReservation implements BaseModel, ResponseConverter
{
    /** @use SdkModel<NumberReservationShape> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public ?string $id;

    /**
     * An ISO 8901 datetime string denoting when the numbers reservation was created.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $created_at;

    /**
     * A customer reference string for customer look ups.
     */
    #[Api(optional: true)]
    public ?string $customer_reference;

    /** @var list<ReservedPhoneNumber>|null $phone_numbers */
    #[Api(list: ReservedPhoneNumber::class, optional: true)]
    public ?array $phone_numbers;

    #[Api(optional: true)]
    public ?string $record_type;

    /**
     * The status of the entire reservation.
     *
     * @var value-of<Status>|null $status
     */
    #[Api(enum: Status::class, optional: true)]
    public ?string $status;

    /**
     * An ISO 8901 datetime string for when the number reservation was updated.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $updated_at;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<ReservedPhoneNumber> $phone_numbers
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?string $id = null,
        ?\DateTimeInterface $created_at = null,
        ?string $customer_reference = null,
        ?array $phone_numbers = null,
        ?string $record_type = null,
        Status|string|null $status = null,
        ?\DateTimeInterface $updated_at = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $created_at && $obj->created_at = $created_at;
        null !== $customer_reference && $obj->customer_reference = $customer_reference;
        null !== $phone_numbers && $obj->phone_numbers = $phone_numbers;
        null !== $record_type && $obj->record_type = $record_type;
        null !== $status && $obj['status'] = $status;
        null !== $updated_at && $obj->updated_at = $updated_at;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * An ISO 8901 datetime string denoting when the numbers reservation was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->created_at = $createdAt;

        return $obj;
    }

    /**
     * A customer reference string for customer look ups.
     */
    public function withCustomerReference(string $customerReference): self
    {
        $obj = clone $this;
        $obj->customer_reference = $customerReference;

        return $obj;
    }

    /**
     * @param list<ReservedPhoneNumber> $phoneNumbers
     */
    public function withPhoneNumbers(array $phoneNumbers): self
    {
        $obj = clone $this;
        $obj->phone_numbers = $phoneNumbers;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->record_type = $recordType;

        return $obj;
    }

    /**
     * The status of the entire reservation.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * An ISO 8901 datetime string for when the number reservation was updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updated_at = $updatedAt;

        return $obj;
    }
}
