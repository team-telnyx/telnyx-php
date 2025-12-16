<?php

declare(strict_types=1);

namespace Telnyx\NumberBlockOrders;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type NumberBlockOrderShape from \Telnyx\NumberBlockOrders\NumberBlockOrder
 *
 * @phpstan-type NumberBlockOrderGetResponseShape = array{
 *   data?: null|NumberBlockOrder|NumberBlockOrderShape
 * }
 */
final class NumberBlockOrderGetResponse implements BaseModel
{
    /** @use SdkModel<NumberBlockOrderGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?NumberBlockOrder $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param NumberBlockOrderShape $data
     */
    public static function with(NumberBlockOrder|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param NumberBlockOrderShape $data
     */
    public function withData(NumberBlockOrder|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
