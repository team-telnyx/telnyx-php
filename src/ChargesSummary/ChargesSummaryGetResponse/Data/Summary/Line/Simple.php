<?php

declare(strict_types=1);

namespace Telnyx\ChargesSummary\ChargesSummaryGetResponse\Data\Summary\Line;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type SimpleShape = array{
 *   alias: string, amount: string, name: string, quantity: int, type: "simple"
 * }
 */
final class Simple implements BaseModel
{
    /** @use SdkModel<SimpleShape> */
    use SdkModel;

    /** @var "simple" $type */
    #[Api]
    public string $type = 'simple';

    /**
     * Service alias.
     */
    #[Api]
    public string $alias;

    /**
     * Total amount as decimal string.
     */
    #[Api]
    public string $amount;

    /**
     * Service name.
     */
    #[Api]
    public string $name;

    /**
     * Number of items.
     */
    #[Api]
    public int $quantity;

    /**
     * `new Simple()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Simple::with(alias: ..., amount: ..., name: ..., quantity: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Simple)->withAlias(...)->withAmount(...)->withName(...)->withQuantity(...)
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
        string $alias,
        string $amount,
        string $name,
        int $quantity
    ): self {
        $obj = new self;

        $obj->alias = $alias;
        $obj->amount = $amount;
        $obj->name = $name;
        $obj->quantity = $quantity;

        return $obj;
    }

    /**
     * Service alias.
     */
    public function withAlias(string $alias): self
    {
        $obj = clone $this;
        $obj->alias = $alias;

        return $obj;
    }

    /**
     * Total amount as decimal string.
     */
    public function withAmount(string $amount): self
    {
        $obj = clone $this;
        $obj->amount = $amount;

        return $obj;
    }

    /**
     * Service name.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * Number of items.
     */
    public function withQuantity(int $quantity): self
    {
        $obj = clone $this;
        $obj->quantity = $quantity;

        return $obj;
    }
}
