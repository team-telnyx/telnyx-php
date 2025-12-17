<?php

declare(strict_types=1);

namespace Telnyx\SubNumberOrders;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type SubNumberOrderShape from \Telnyx\SubNumberOrders\SubNumberOrder
 *
 * @phpstan-type SubNumberOrderCancelResponseShape = array{
 *   data?: null|SubNumberOrder|SubNumberOrderShape
 * }
 */
final class SubNumberOrderCancelResponse implements BaseModel
{
    /** @use SdkModel<SubNumberOrderCancelResponseShape> */
    use SdkModel;

    #[Optional]
    public ?SubNumberOrder $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param SubNumberOrder|SubNumberOrderShape|null $data
     */
    public static function with(SubNumberOrder|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param SubNumberOrder|SubNumberOrderShape $data
     */
    public function withData(SubNumberOrder|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
