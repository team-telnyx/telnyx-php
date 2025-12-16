<?php

declare(strict_types=1);

namespace Telnyx\Rooms;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type RoomShape from \Telnyx\Rooms\Room
 *
 * @phpstan-type RoomNewResponseShape = array{data?: null|Room|RoomShape}
 */
final class RoomNewResponse implements BaseModel
{
    /** @use SdkModel<RoomNewResponseShape> */
    use SdkModel;

    #[Optional]
    public ?Room $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param RoomShape $data
     */
    public static function with(Room|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param RoomShape $data
     */
    public function withData(Room|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
