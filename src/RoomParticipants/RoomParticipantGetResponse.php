<?php

declare(strict_types=1);

namespace Telnyx\RoomParticipants;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\RoomParticipant;

/**
 * @phpstan-type room_participant_get_response = array{data?: RoomParticipant}
 */
final class RoomParticipantGetResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<room_participant_get_response> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public ?RoomParticipant $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?RoomParticipant $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(RoomParticipant $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
