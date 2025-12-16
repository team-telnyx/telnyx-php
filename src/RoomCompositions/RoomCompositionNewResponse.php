<?php

declare(strict_types=1);

namespace Telnyx\RoomCompositions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type RoomCompositionShape from \Telnyx\RoomCompositions\RoomComposition
 *
 * @phpstan-type RoomCompositionNewResponseShape = array{
 *   data?: null|RoomComposition|RoomCompositionShape
 * }
 */
final class RoomCompositionNewResponse implements BaseModel
{
    /** @use SdkModel<RoomCompositionNewResponseShape> */
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
     * @param RoomCompositionShape $data
     */
    public static function with(RoomComposition|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param RoomCompositionShape $data
     */
    public function withData(RoomComposition|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
