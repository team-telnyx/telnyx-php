<?php

declare(strict_types=1);

namespace Telnyx\InboundMessagePayload\CostBreakdown;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type RateShape = array{amount?: string|null, currency?: string|null}
 */
final class Rate implements BaseModel
{
    /** @use SdkModel<RateShape> */
    use SdkModel;

    /**
     * The rate amount applied.
     */
    #[Optional]
    public ?string $amount;

    /**
     * The ISO 4217 currency identifier.
     */
    #[Optional]
    public ?string $currency;

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
        ?string $amount = null,
        ?string $currency = null
    ): self {
        $self = new self;

        null !== $amount && $self['amount'] = $amount;
        null !== $currency && $self['currency'] = $currency;

        return $self;
    }

    /**
     * The rate amount applied.
     */
    public function withAmount(string $amount): self
    {
        $self = clone $this;
        $self['amount'] = $amount;

        return $self;
    }

    /**
     * The ISO 4217 currency identifier.
     */
    public function withCurrency(string $currency): self
    {
        $self = clone $this;
        $self['currency'] = $currency;

        return $self;
    }
}
