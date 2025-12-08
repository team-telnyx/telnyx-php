<?php

declare(strict_types=1);

namespace Telnyx\Rooms\Sessions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\RoomParticipant;
use Telnyx\Rooms\RoomSession;

/**
 * @phpstan-type SessionGetResponseShape = array{data?: RoomSession|null}
 */
final class SessionGetResponse implements BaseModel
{
    /** @use SdkModel<SessionGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?RoomSession $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param RoomSession|array{
     *   id?: string|null,
     *   active?: bool|null,
     *   created_at?: \DateTimeInterface|null,
     *   ended_at?: \DateTimeInterface|null,
     *   participants?: list<RoomParticipant>|null,
     *   record_type?: string|null,
     *   room_id?: string|null,
     *   updated_at?: \DateTimeInterface|null,
     * } $data
     */
    public static function with(RoomSession|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param RoomSession|array{
     *   id?: string|null,
     *   active?: bool|null,
     *   created_at?: \DateTimeInterface|null,
     *   ended_at?: \DateTimeInterface|null,
     *   participants?: list<RoomParticipant>|null,
     *   record_type?: string|null,
     *   room_id?: string|null,
     *   updated_at?: \DateTimeInterface|null,
     * } $data
     */
    public function withData(RoomSession|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
