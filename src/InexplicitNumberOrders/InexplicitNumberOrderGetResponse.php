<?php

declare(strict_types=1);

namespace Telnyx\InexplicitNumberOrders;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type InexplicitNumberOrderResponseShape from \Telnyx\InexplicitNumberOrders\InexplicitNumberOrderResponse
 *
 * @phpstan-type InexplicitNumberOrderGetResponseShape = array{
 *   data?: null|InexplicitNumberOrderResponse|InexplicitNumberOrderResponseShape
 * }
 */
final class InexplicitNumberOrderGetResponse implements BaseModel
{
    /** @use SdkModel<InexplicitNumberOrderGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?InexplicitNumberOrderResponse $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param InexplicitNumberOrderResponseShape $data
     */
    public static function with(
        InexplicitNumberOrderResponse|array|null $data = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param InexplicitNumberOrderResponseShape $data
     */
    public function withData(InexplicitNumberOrderResponse|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
