<?php

declare(strict_types=1);

namespace Telnyx\SessionAnalysis\SessionAnalysisGetResponse;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type CostShape = array{currency: string, total: string}
 */
final class Cost implements BaseModel
{
    /** @use SdkModel<CostShape> */
    use SdkModel;

    /**
     * ISO 4217 currency code.
     */
    #[Required]
    public string $currency;

    /**
     * Total session cost as a decimal string.
     */
    #[Required]
    public string $total;

    /**
     * `new Cost()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Cost::with(currency: ..., total: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Cost)->withCurrency(...)->withTotal(...)
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
    public static function with(string $currency, string $total): self
    {
        $self = new self;

        $self['currency'] = $currency;
        $self['total'] = $total;

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
     * Total session cost as a decimal string.
     */
    public function withTotal(string $total): self
    {
        $self = clone $this;
        $self['total'] = $total;

        return $self;
    }
}
