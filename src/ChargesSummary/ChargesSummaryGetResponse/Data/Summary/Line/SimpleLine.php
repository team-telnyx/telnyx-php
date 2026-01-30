<?php

declare(strict_types=1);

namespace Telnyx\ChargesSummary\ChargesSummaryGetResponse\Data\Summary\Line;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type SimpleLineShape = array{
 *   alias: string, amount: string, name: string, quantity: int, type: 'simple'
 * }
 */
final class SimpleLine implements BaseModel
{
    /** @use SdkModel<SimpleLineShape> */
    use SdkModel;

    /** @var 'simple' $type */
    #[Required]
    public string $type = 'simple';

    /**
     * Service alias.
     */
    #[Required]
    public string $alias;

    /**
     * Total amount as decimal string.
     */
    #[Required]
    public string $amount;

    /**
     * Service name.
     */
    #[Required]
    public string $name;

    /**
     * Number of items.
     */
    #[Required]
    public int $quantity;

    /**
     * `new SimpleLine()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SimpleLine::with(alias: ..., amount: ..., name: ..., quantity: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SimpleLine)
     *   ->withAlias(...)
     *   ->withAmount(...)
     *   ->withName(...)
     *   ->withQuantity(...)
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
        $self = new self;

        $self['alias'] = $alias;
        $self['amount'] = $amount;
        $self['name'] = $name;
        $self['quantity'] = $quantity;

        return $self;
    }

    /**
     * Service alias.
     */
    public function withAlias(string $alias): self
    {
        $self = clone $this;
        $self['alias'] = $alias;

        return $self;
    }

    /**
     * Total amount as decimal string.
     */
    public function withAmount(string $amount): self
    {
        $self = clone $this;
        $self['amount'] = $amount;

        return $self;
    }

    /**
     * Service name.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Number of items.
     */
    public function withQuantity(int $quantity): self
    {
        $self = clone $this;
        $self['quantity'] = $quantity;

        return $self;
    }

    /**
     * @param 'simple' $type
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
