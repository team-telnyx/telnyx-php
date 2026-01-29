<?php

declare(strict_types=1);

namespace Telnyx\RoomParticipants;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\RoomParticipant;

/**
 * @phpstan-import-type RoomParticipantShape from \Telnyx\RoomParticipant
 *
 * @phpstan-type RoomParticipantGetResponseShape = array{
 *   data?: null|RoomParticipant|RoomParticipantShape
 * }
 */
final class RoomParticipantGetResponse implements BaseModel
{
    /** @use SdkModel<RoomParticipantGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?RoomParticipant $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param RoomParticipant|RoomParticipantShape|null $data
     */
    public static function with(RoomParticipant|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param RoomParticipant|RoomParticipantShape $data
     */
    public function withData(RoomParticipant|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
