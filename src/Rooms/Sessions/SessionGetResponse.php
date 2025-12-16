<?php

declare(strict_types=1);

namespace Telnyx\Rooms\Sessions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Rooms\RoomSession;

/**
 * @phpstan-import-type RoomSessionShape from \Telnyx\Rooms\RoomSession
 *
 * @phpstan-type SessionGetResponseShape = array{
 *   data?: null|RoomSession|RoomSessionShape
 * }
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
     * @param RoomSessionShape $data
     */
    public static function with(RoomSession|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param RoomSessionShape $data
     */
    public function withData(RoomSession|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
