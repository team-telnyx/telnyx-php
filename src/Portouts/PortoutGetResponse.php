<?php

declare(strict_types=1);

namespace Telnyx\Portouts;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PortoutDetailsShape from \Telnyx\Portouts\PortoutDetails
 *
 * @phpstan-type PortoutGetResponseShape = array{
 *   data?: null|PortoutDetails|PortoutDetailsShape
 * }
 */
final class PortoutGetResponse implements BaseModel
{
    /** @use SdkModel<PortoutGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?PortoutDetails $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param PortoutDetailsShape $data
     */
    public static function with(PortoutDetails|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param PortoutDetailsShape $data
     */
    public function withData(PortoutDetails|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
