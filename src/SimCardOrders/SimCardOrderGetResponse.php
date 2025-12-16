<?php

declare(strict_types=1);

namespace Telnyx\SimCardOrders;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type SimCardOrderShape from \Telnyx\SimCardOrders\SimCardOrder
 *
 * @phpstan-type SimCardOrderGetResponseShape = array{
 *   data?: null|SimCardOrder|SimCardOrderShape
 * }
 */
final class SimCardOrderGetResponse implements BaseModel
{
    /** @use SdkModel<SimCardOrderGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?SimCardOrder $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param SimCardOrderShape $data
     */
    public static function with(SimCardOrder|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param SimCardOrderShape $data
     */
    public function withData(SimCardOrder|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
