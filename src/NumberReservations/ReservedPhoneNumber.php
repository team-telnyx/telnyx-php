<?php

declare(strict_types=1);

namespace Telnyx\NumberReservations;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NumberReservations\ReservedPhoneNumber\Status;

/**
 * @phpstan-type ReservedPhoneNumberShape = array{
 *   id?: string,
 *   createdAt?: \DateTimeInterface,
 *   expiredAt?: \DateTimeInterface,
 *   phoneNumber?: string,
 *   recordType?: string,
 *   status?: value-of<Status>,
 *   updatedAt?: \DateTimeInterface,
 * }
 */
final class ReservedPhoneNumber implements BaseModel
{
    /** @use SdkModel<ReservedPhoneNumberShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?string $id;

    /**
     * An ISO 8901 datetime string denoting when the individual number reservation was created.
     */
    #[Api('created_at', optional: true)]
    public ?\DateTimeInterface $createdAt;

    /**
     * An ISO 8901 datetime string for when the individual number reservation is going to expire.
     */
    #[Api('expired_at', optional: true)]
    public ?\DateTimeInterface $expiredAt;

    #[Api('phone_number', optional: true)]
    public ?string $phoneNumber;

    #[Api('record_type', optional: true)]
    public ?string $recordType;

    /**
     * The status of the phone number's reservation.
     *
     * @var value-of<Status>|null $status
     */
    #[Api(enum: Status::class, optional: true)]
    public ?string $status;

    /**
     * An ISO 8901 datetime string for when the the individual number reservation was updated.
     */
    #[Api('updated_at', optional: true)]
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
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $expiredAt && $obj->expiredAt = $expiredAt;
        null !== $phoneNumber && $obj->phoneNumber = $phoneNumber;
        null !== $recordType && $obj->recordType = $recordType;
        null !== $status && $obj['status'] = $status;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * An ISO 8901 datetime string denoting when the individual number reservation was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * An ISO 8901 datetime string for when the individual number reservation is going to expire.
     */
    public function withExpiredAt(\DateTimeInterface $expiredAt): self
    {
        $obj = clone $this;
        $obj->expiredAt = $expiredAt;

        return $obj;
    }

    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phoneNumber = $phoneNumber;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType;

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
        $obj->updatedAt = $updatedAt;

        return $obj;
    }
}
