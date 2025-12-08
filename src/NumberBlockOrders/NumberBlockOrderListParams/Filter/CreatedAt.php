<?php

declare(strict_types=1);

namespace Telnyx\NumberBlockOrders\NumberBlockOrderListParams\Filter;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Filter number block orders by date range.
 *
 * @phpstan-type CreatedAtShape = array{gt?: string|null, lt?: string|null}
 */
final class CreatedAt implements BaseModel
{
    /** @use SdkModel<CreatedAtShape> */
    use SdkModel;

    /**
     * Filter number block orders later than this value.
     */
    #[Optional]
    public ?string $gt;

    /**
     * Filter number block orders earlier than this value.
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
        $obj = new self;

        null !== $gt && $obj['gt'] = $gt;
        null !== $lt && $obj['lt'] = $lt;

        return $obj;
    }

    /**
     * Filter number block orders later than this value.
     */
    public function withGt(string $gt): self
    {
        $obj = clone $this;
        $obj['gt'] = $gt;

        return $obj;
    }

    /**
     * Filter number block orders earlier than this value.
     */
    public function withLt(string $lt): self
    {
        $obj = clone $this;
        $obj['lt'] = $lt;

        return $obj;
    }
}
