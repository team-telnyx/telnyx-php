<?php

declare(strict_types=1);

namespace Telnyx\NumberReservations;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NumberReservations\ReservedPhoneNumber\Status;

/**
 * @phpstan-type ReservedPhoneNumberShape = array{
 *   id?: string|null,
 *   created_at?: \DateTimeInterface|null,
 *   expired_at?: \DateTimeInterface|null,
 *   phone_number?: string|null,
 *   record_type?: string|null,
 *   status?: value-of<Status>|null,
 *   updated_at?: \DateTimeInterface|null,
 * }
 */
final class ReservedPhoneNumber implements BaseModel
{
    /** @use SdkModel<ReservedPhoneNumberShape> */
    use SdkModel;

    #[Optional]
    public ?string $id;

    /**
     * An ISO 8901 datetime string denoting when the individual number reservation was created.
     */
    #[Optional]
    public ?\DateTimeInterface $created_at;

    /**
     * An ISO 8901 datetime string for when the individual number reservation is going to expire.
     */
    #[Optional]
    public ?\DateTimeInterface $expired_at;

    #[Optional]
    public ?string $phone_number;

    #[Optional]
    public ?string $record_type;

    /**
     * The status of the phone number's reservation.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    /**
     * An ISO 8901 datetime string for when the the individual number reservation was updated.
     */
    #[Optional]
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
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?string $id = null,
        ?\DateTimeInterface $created_at = null,
        ?\DateTimeInterface $expired_at = null,
        ?string $phone_number = null,
        ?string $record_type = null,
        Status|string|null $status = null,
        ?\DateTimeInterface $updated_at = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $expired_at && $obj['expired_at'] = $expired_at;
        null !== $phone_number && $obj['phone_number'] = $phone_number;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $status && $obj['status'] = $status;
        null !== $updated_at && $obj['updated_at'] = $updated_at;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * An ISO 8901 datetime string denoting when the individual number reservation was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    /**
     * An ISO 8901 datetime string for when the individual number reservation is going to expire.
     */
    public function withExpiredAt(\DateTimeInterface $expiredAt): self
    {
        $obj = clone $this;
        $obj['expired_at'] = $expiredAt;

        return $obj;
    }

    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phone_number'] = $phoneNumber;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }

    /**
     * The status of the phone number's reservation.
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
     * An ISO 8901 datetime string for when the the individual number reservation was updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updated_at'] = $updatedAt;

        return $obj;
    }
}
