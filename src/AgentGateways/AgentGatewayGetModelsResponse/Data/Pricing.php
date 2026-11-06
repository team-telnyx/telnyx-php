<?php

declare(strict_types=1);

namespace Telnyx\AgentGateways\AgentGatewayGetModelsResponse\Data;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * A model's price in USD per million tokens.
 *
 * @phpstan-type PricingShape = array{
 *   cachedInput: float|null,
 *   currency: string,
 *   input: float,
 *   output: float,
 *   unit: string,
 * }
 */
final class Pricing implements BaseModel
{
    /** @use SdkModel<PricingShape> */
    use SdkModel;

    /**
     * USD per million cached input tokens.
     */
    #[Required('cached_input')]
    public ?float $cachedInput;

    /**
     * Always `USD`.
     */
    #[Required]
    public string $currency;

    /**
     * USD per million input tokens.
     */
    #[Required]
    public float $input;

    /**
     * USD per million output tokens.
     */
    #[Required]
    public float $output;

    /**
     * Always `1M_tokens`.
     */
    #[Required]
    public string $unit;

    /**
     * `new Pricing()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Pricing::with(
     *   cachedInput: ..., currency: ..., input: ..., output: ..., unit: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Pricing)
     *   ->withCachedInput(...)
     *   ->withCurrency(...)
     *   ->withInput(...)
     *   ->withOutput(...)
     *   ->withUnit(...)
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
        ?float $cachedInput,
        string $currency,
        float $input,
        float $output,
        string $unit,
    ): self {
        $self = new self;

        $self['cachedInput'] = $cachedInput;
        $self['currency'] = $currency;
        $self['input'] = $input;
        $self['output'] = $output;
        $self['unit'] = $unit;

        return $self;
    }

    /**
     * USD per million cached input tokens.
     */
    public function withCachedInput(?float $cachedInput): self
    {
        $self = clone $this;
        $self['cachedInput'] = $cachedInput;

        return $self;
    }

    /**
     * Always `USD`.
     */
    public function withCurrency(string $currency): self
    {
        $self = clone $this;
        $self['currency'] = $currency;

        return $self;
    }

    /**
     * USD per million input tokens.
     */
    public function withInput(float $input): self
    {
        $self = clone $this;
        $self['input'] = $input;

        return $self;
    }

    /**
     * USD per million output tokens.
     */
    public function withOutput(float $output): self
    {
        $self = clone $this;
        $self['output'] = $output;

        return $self;
    }

    /**
     * Always `1M_tokens`.
     */
    public function withUnit(string $unit): self
    {
        $self = clone $this;
        $self['unit'] = $unit;

        return $self;
    }
}
