<?php

declare(strict_types=1);

namespace Telnyx\Pricing\Products;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type RateVariants from \Telnyx\Pricing\Products\PricingTier\Rate
 * @phpstan-import-type RateShape from \Telnyx\Pricing\Products\PricingTier\Rate
 *
 * @phpstan-type PricingTierShape = array{max: int|null, min: int, rate: RateShape}
 */
final class PricingTier implements BaseModel
{
    /** @use SdkModel<PricingTierShape> */
    use SdkModel;

    /**
     * Upper bound of the tier (exclusive). Null means no upper limit.
     */
    #[Required]
    public ?int $max;

    /**
     * Lower bound of the tier (inclusive).
     */
    #[Required]
    public int $min;

    /**
     * Rate for this tier. Numeric for standard products, string for inference products.
     *
     * @var RateVariants $rate
     */
    #[Required]
    public float|string $rate;

    /**
     * `new PricingTier()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PricingTier::with(max: ..., min: ..., rate: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PricingTier)->withMax(...)->withMin(...)->withRate(...)
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
     *
     * @param RateShape $rate
     */
    public static function with(?int $max, int $min, float|string $rate): self
    {
        $self = new self;

        $self['max'] = $max;
        $self['min'] = $min;
        $self['rate'] = $rate;

        return $self;
    }

    /**
     * Upper bound of the tier (exclusive). Null means no upper limit.
     */
    public function withMax(?int $max): self
    {
        $self = clone $this;
        $self['max'] = $max;

        return $self;
    }

    /**
     * Lower bound of the tier (inclusive).
     */
    public function withMin(int $min): self
    {
        $self = clone $this;
        $self['min'] = $min;

        return $self;
    }

    /**
     * Rate for this tier. Numeric for standard products, string for inference products.
     *
     * @param RateShape $rate
     */
    public function withRate(float|string $rate): self
    {
        $self = clone $this;
        $self['rate'] = $rate;

        return $self;
    }
}
