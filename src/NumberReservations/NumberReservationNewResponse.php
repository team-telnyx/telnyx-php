<?php

declare(strict_types=1);

namespace Telnyx\NumberReservations;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type number_reservation_new_response = array{
 *   data?: NumberReservation|null
 * }
 */
final class NumberReservationNewResponse implements BaseModel
{
    /** @use SdkModel<number_reservation_new_response> */
    use SdkModel;

    #[Api(optional: true)]
    public ?NumberReservation $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?NumberReservation $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(NumberReservation $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
