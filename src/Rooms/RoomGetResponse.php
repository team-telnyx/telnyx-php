<?php

declare(strict_types=1);

namespace Telnyx\Rooms;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type RoomShape from \Telnyx\Rooms\Room
 *
 * @phpstan-type RoomGetResponseShape = array{data?: null|Room|RoomShape}
 */
final class RoomGetResponse implements BaseModel
{
    /** @use SdkModel<RoomGetResponseShape> */
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
     * @param Room|RoomShape|null $data
     */
    public static function with(Room|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param Room|RoomShape $data
     */
    public function withData(Room|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
