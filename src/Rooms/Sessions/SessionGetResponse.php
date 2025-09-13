<?php

declare(strict_types=1);

namespace Telnyx\Rooms\Sessions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Rooms\RoomSession;

/**
 * @phpstan-type session_get_response = array{data?: RoomSession}
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class SessionGetResponse implements BaseModel
{
    /** @use SdkModel<session_get_response> */
    use SdkModel;

    #[Api(optional: true)]
    public ?RoomSession $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?RoomSession $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(RoomSession $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
