<?php

declare(strict_types=1);

namespace Telnyx\NumberReservations\Actions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NumberReservations\NumberReservation;
use Telnyx\NumberReservations\NumberReservation\Status;
use Telnyx\NumberReservations\ReservedPhoneNumber;

/**
 * @phpstan-type ActionExtendResponseShape = array{data?: NumberReservation|null}
 */
final class ActionExtendResponse implements BaseModel
{
    /** @use SdkModel<ActionExtendResponseShape> */
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
     *   created_at?: \DateTimeInterface|null,
     *   customer_reference?: string|null,
     *   phone_numbers?: list<ReservedPhoneNumber>|null,
     *   record_type?: string|null,
     *   status?: value-of<Status>|null,
     *   updated_at?: \DateTimeInterface|null,
     * } $data
     */
    public static function with(NumberReservation|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param NumberReservation|array{
     *   id?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   customer_reference?: string|null,
     *   phone_numbers?: list<ReservedPhoneNumber>|null,
     *   record_type?: string|null,
     *   status?: value-of<Status>|null,
     *   updated_at?: \DateTimeInterface|null,
     * } $data
     */
    public function withData(NumberReservation|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
