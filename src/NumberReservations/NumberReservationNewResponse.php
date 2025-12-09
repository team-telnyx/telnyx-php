<?php

declare(strict_types=1);

namespace Telnyx\NumberReservations;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NumberReservations\NumberReservation\Status;

/**
 * @phpstan-type NumberReservationNewResponseShape = array{
 *   data?: NumberReservation|null
 * }
 */
final class NumberReservationNewResponse implements BaseModel
{
    /** @use SdkModel<NumberReservationNewResponseShape> */
    use SdkModel;

    #[Optional]
    public ?NumberReservation $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param NumberReservation|array{
     *   id?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   customerReference?: string|null,
     *   phoneNumbers?: list<ReservedPhoneNumber>|null,
     *   recordType?: string|null,
     *   status?: value-of<Status>|null,
     *   updatedAt?: \DateTimeInterface|null,
     * } $data
     */
    public static function with(NumberReservation|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param NumberReservation|array{
     *   id?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   customerReference?: string|null,
     *   phoneNumbers?: list<ReservedPhoneNumber>|null,
     *   recordType?: string|null,
     *   status?: value-of<Status>|null,
     *   updatedAt?: \DateTimeInterface|null,
     * } $data
     */
    public function withData(NumberReservation|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
