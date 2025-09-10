<?php

declare(strict_types=1);

namespace Telnyx\RoomParticipants;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\RoomParticipant;

/**
 * @phpstan-type room_participant_get_response = array{data?: RoomParticipant|null}
 */
final class RoomParticipantGetResponse implements BaseModel
{
    /** @use SdkModel<room_participant_get_response> */
    use SdkModel;

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
