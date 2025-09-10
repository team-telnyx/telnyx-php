<?php

declare(strict_types=1);

namespace Telnyx\Rooms;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type room_get_response = array{data?: Room|null}
 */
final class RoomGetResponse implements BaseModel
{
    /** @use SdkModel<room_get_response> */
    use SdkModel;

    #[Api(optional: true)]
    public ?Room $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?Room $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(Room $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
