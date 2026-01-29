<?php

declare(strict_types=1);

namespace Telnyx\NumberOrders\NumberOrderListParams\Filter;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Filter number orders by date range.
 *
 * @phpstan-type CreatedAtShape = array{gt?: string|null, lt?: string|null}
 */
final class CreatedAt implements BaseModel
{
    /** @use SdkModel<CreatedAtShape> */
    use SdkModel;

    /**
     * Filter number orders later than this value.
     */
    #[Optional]
    public ?string $gt;

    /**
     * Filter number orders earlier than this value.
     */
    #[Optional]
    public ?string $lt;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $gt = null, ?string $lt = null): self
    {
        $self = new self;

        null !== $gt && $self['gt'] = $gt;
        null !== $lt && $self['lt'] = $lt;

        return $self;
    }

    /**
     * Filter number orders later than this value.
     */
    public function withGt(string $gt): self
    {
        $self = clone $this;
        $self['gt'] = $gt;

        return $self;
    }

    /**
     * Filter number orders earlier than this value.
     */
    public function withLt(string $lt): self
    {
        $self = clone $this;
        $self['lt'] = $lt;

        return $self;
    }
}
