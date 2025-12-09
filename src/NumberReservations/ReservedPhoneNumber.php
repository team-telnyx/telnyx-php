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
 *   createdAt?: \DateTimeInterface|null,
 *   expiredAt?: \DateTimeInterface|null,
 *   phoneNumber?: string|null,
 *   recordType?: string|null,
 *   status?: value-of<Status>|null,
 *   updatedAt?: \DateTimeInterface|null,
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
    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * An ISO 8901 datetime string for when the individual number reservation is going to expire.
     */
    #[Optional('expired_at')]
    public ?\DateTimeInterface $expiredAt;

    #[Optional('phone_number')]
    public ?string $phoneNumber;

    #[Optional('record_type')]
    public ?string $recordType;

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
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?string $id = null,
        ?\DateTimeInterface $createdAt = null,
        ?\DateTimeInterface $expiredAt = null,
        ?string $phoneNumber = null,
        ?string $recordType = null,
        Status|string|null $status = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $expiredAt && $self['expiredAt'] = $expiredAt;
        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;
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
     * An ISO 8901 datetime string denoting when the individual number reservation was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * An ISO 8901 datetime string for when the individual number reservation is going to expire.
     */
    public function withExpiredAt(\DateTimeInterface $expiredAt): self
    {
        $self = clone $this;
        $self['expiredAt'] = $expiredAt;

        return $self;
    }

    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * The status of the phone number's reservation.
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
     * An ISO 8901 datetime string for when the the individual number reservation was updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
