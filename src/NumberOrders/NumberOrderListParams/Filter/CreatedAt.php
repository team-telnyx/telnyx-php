<?php

declare(strict_types=1);

namespace Telnyx\NumberOrders\NumberOrderListParams\Filter;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Filter number orders by date range.
 *
 * @phpstan-type created_at = array{gt?: string, lt?: string}
 */
final class CreatedAt implements BaseModel
{
    /** @use SdkModel<created_at> */
    use SdkModel;

    /**
     * Filter number orders later than this value.
     */
    #[Api(optional: true)]
    public ?string $gt;

    /**
     * Filter number orders earlier than this value.
     */
    #[Api(optional: true)]
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

        null !== $gt && $obj->gt = $gt;
        null !== $lt && $obj->lt = $lt;

        return $obj;
    }

    /**
     * Filter number orders later than this value.
     */
    public function withGt(string $gt): self
    {
        $obj = clone $this;
        $obj->gt = $gt;

        return $obj;
    }

    /**
     * Filter number orders earlier than this value.
     */
    public function withLt(string $lt): self
    {
        $obj = clone $this;
        $obj->lt = $lt;

        return $obj;
    }
}
