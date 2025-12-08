<?php

declare(strict_types=1);

namespace Telnyx\ChargesSummary;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type MonthDetailShape = array{
 *   mrc: string, quantity: int, otc?: string|null
 * }
 */
final class MonthDetail implements BaseModel
{
    /** @use SdkModel<MonthDetailShape> */
    use SdkModel;

    /**
     * Monthly recurring charge amount as decimal string.
     */
    #[Required]
    public string $mrc;

    /**
     * Number of items.
     */
    #[Required]
    public int $quantity;

    /**
     * One-time charge amount as decimal string.
     */
    #[Optional(nullable: true)]
    public ?string $otc;

    /**
     * `new MonthDetail()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MonthDetail::with(mrc: ..., quantity: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MonthDetail)->withMrc(...)->withQuantity(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        string $mrc,
        int $quantity,
        ?string $otc = null
    ): self {
        $obj = new self;

        $obj['mrc'] = $mrc;
        $obj['quantity'] = $quantity;

        null !== $otc && $obj['otc'] = $otc;

        return $obj;
    }

    /**
     * Monthly recurring charge amount as decimal string.
     */
    public function withMrc(string $mrc): self
    {
        $obj = clone $this;
        $obj['mrc'] = $mrc;

        return $obj;
    }

    /**
     * Number of items.
     */
    public function withQuantity(int $quantity): self
    {
        $obj = clone $this;
        $obj['quantity'] = $quantity;

        return $obj;
    }

    /**
     * One-time charge amount as decimal string.
     */
    public function withOtc(?string $otc): self
    {
        $obj = clone $this;
        $obj['otc'] = $otc;

        return $obj;
    }
}
