<?php

declare(strict_types=1);

namespace Telnyx\SubNumberOrders;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type NumbersSubNumberOrderShape from \Telnyx\SubNumberOrders\NumbersSubNumberOrder
 *
 * @phpstan-type SubNumberOrderCancelResponseShape = array{
 *   data?: null|NumbersSubNumberOrder|NumbersSubNumberOrderShape
 * }
 */
final class SubNumberOrderCancelResponse implements BaseModel
{
    /** @use SdkModel<SubNumberOrderCancelResponseShape> */
    use SdkModel;

    #[Optional]
    public ?NumbersSubNumberOrder $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param NumbersSubNumberOrder|NumbersSubNumberOrderShape|null $data
     */
    public static function with(NumbersSubNumberOrder|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param NumbersSubNumberOrder|NumbersSubNumberOrderShape $data
     */
    public function withData(NumbersSubNumberOrder|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
