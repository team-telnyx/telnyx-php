<?php

declare(strict_types=1);

namespace Telnyx\NumberReservations;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type NumberReservationShape from \Telnyx\NumberReservations\NumberReservation
 *
 * @phpstan-type NumberReservationGetResponseShape = array{
 *   data?: null|NumberReservation|NumberReservationShape
 * }
 */
final class NumberReservationGetResponse implements BaseModel
{
    /** @use SdkModel<NumberReservationGetResponseShape> */
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
     * @param NumberReservationShape $data
     */
    public static function with(NumberReservation|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param NumberReservationShape $data
     */
    public function withData(NumberReservation|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
