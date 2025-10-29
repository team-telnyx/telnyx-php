<?php

declare(strict_types=1);

namespace Telnyx\NumberReservations\Actions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\NumberReservations\NumberReservation;

/**
 * @phpstan-type ActionExtendResponseShape = array{data?: NumberReservation}
 */
final class ActionExtendResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<ActionExtendResponseShape> */
    use SdkModel;

    use SdkResponse;

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
