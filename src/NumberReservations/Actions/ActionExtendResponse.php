<?php

declare(strict_types=1);

namespace Telnyx\NumberReservations\Actions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NumberReservations\NumberReservation;

/**
 * @phpstan-import-type NumberReservationShape from \Telnyx\NumberReservations\NumberReservation
 *
 * @phpstan-type ActionExtendResponseShape = array{
 *   data?: null|NumberReservation|NumberReservationShape
 * }
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
     * @param NumberReservation|NumberReservationShape|null $data
     */
    public static function with(NumberReservation|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param NumberReservation|NumberReservationShape $data
     */
    public function withData(NumberReservation|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
