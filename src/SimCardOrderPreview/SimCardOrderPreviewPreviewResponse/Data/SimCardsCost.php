<?php

declare(strict_types=1);

namespace Telnyx\SimCardOrderPreview\SimCardOrderPreviewPreviewResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type SimCardsCostShape = array{
 *   amount?: string|null, currency?: string|null
 * }
 */
final class SimCardsCost implements BaseModel
{
    /** @use SdkModel<SimCardsCostShape> */
    use SdkModel;

    /**
     * A string representing the cost amount.
     */
    #[Optional]
    public ?string $amount;

    /**
     * ISO 4217 currency string.
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
     * A string representing the cost amount.
     */
    public function withAmount(string $amount): self
    {
        $self = clone $this;
        $self['amount'] = $amount;

        return $self;
    }

    /**
     * ISO 4217 currency string.
     */
    public function withCurrency(string $currency): self
    {
        $self = clone $this;
        $self['currency'] = $currency;

        return $self;
    }
}
