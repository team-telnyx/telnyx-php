<?php

declare(strict_types=1);

namespace Telnyx\RoomCompositions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type RoomCompositionShape from \Telnyx\RoomCompositions\RoomComposition
 *
 * @phpstan-type RoomCompositionGetResponseShape = array{
 *   data?: null|RoomComposition|RoomCompositionShape
 * }
 */
final class RoomCompositionGetResponse implements BaseModel
{
    /** @use SdkModel<RoomCompositionGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?RoomComposition $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param RoomComposition|RoomCompositionShape|null $data
     */
    public static function with(RoomComposition|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param RoomComposition|RoomCompositionShape $data
     */
    public function withData(RoomComposition|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
