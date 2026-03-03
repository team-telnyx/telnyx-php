<?php

declare(strict_types=1);

namespace Telnyx\SessionAnalysis\SessionAnalysisGetResponse\Root;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type CostShape = array{
 *   cumulativeCost: string, currency: string, eventCost: string
 * }
 */
final class Cost implements BaseModel
{
    /** @use SdkModel<CostShape> */
    use SdkModel;

    /**
     * Cumulative cost including all descendants.
     */
    #[Required('cumulative_cost')]
    public string $cumulativeCost;

    /**
     * ISO 4217 currency code.
     */
    #[Required]
    public string $currency;

    /**
     * Cost of this individual event.
     */
    #[Required('event_cost')]
    public string $eventCost;

    /**
     * `new Cost()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Cost::with(cumulativeCost: ..., currency: ..., eventCost: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Cost)->withCumulativeCost(...)->withCurrency(...)->withEventCost(...)
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
        string $cumulativeCost,
        string $currency,
        string $eventCost
    ): self {
        $self = new self;

        $self['cumulativeCost'] = $cumulativeCost;
        $self['currency'] = $currency;
        $self['eventCost'] = $eventCost;

        return $self;
    }

    /**
     * Cumulative cost including all descendants.
     */
    public function withCumulativeCost(string $cumulativeCost): self
    {
        $self = clone $this;
        $self['cumulativeCost'] = $cumulativeCost;

        return $self;
    }

    /**
     * ISO 4217 currency code.
     */
    public function withCurrency(string $currency): self
    {
        $self = clone $this;
        $self['currency'] = $currency;

        return $self;
    }

    /**
     * Cost of this individual event.
     */
    public function withEventCost(string $eventCost): self
    {
        $self = clone $this;
        $self['eventCost'] = $eventCost;

        return $self;
    }
}
