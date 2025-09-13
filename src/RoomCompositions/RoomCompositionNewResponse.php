<?php

declare(strict_types=1);

namespace Telnyx\RoomCompositions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type room_composition_new_response = array{data?: RoomComposition}
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class RoomCompositionNewResponse implements BaseModel
{
    /** @use SdkModel<room_composition_new_response> */
    use SdkModel;

    #[Api(optional: true)]
    public ?RoomComposition $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?RoomComposition $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(RoomComposition $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
