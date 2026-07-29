<?php

declare(strict_types=1);

namespace Telnyx\Pricing\Products\ProductGetResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Pricing\Products\PricingTier;

/**
 * A single pricing entry. Standard products include rate, unit, currency, type, country_iso, direction, and tiers. Inference products include model, input_rate, output_rate, cached_input_rate, and their respective tier arrays. Rate-deck products include pricing_type and note fields with null rate and empty tiers.
 *
 * @phpstan-import-type RateVariants from \Telnyx\Pricing\Products\ProductGetResponse\Data\Rate
 * @phpstan-import-type PricingTierShape from \Telnyx\Pricing\Products\PricingTier
 * @phpstan-import-type RateShape from \Telnyx\Pricing\Products\ProductGetResponse\Data\Rate
 *
 * @phpstan-type DataShape = array{
 *   cachedInputRate?: string|null,
 *   cachedInputTiers?: list<PricingTier|PricingTierShape>|null,
 *   countryISO?: string|null,
 *   currency?: string|null,
 *   direction?: string|null,
 *   inputRate?: string|null,
 *   inputTiers?: list<PricingTier|PricingTierShape>|null,
 *   model?: string|null,
 *   name?: string|null,
 *   note?: string|null,
 *   outputRate?: string|null,
 *   outputTiers?: list<PricingTier|PricingTierShape>|null,
 *   pricingType?: string|null,
 *   rate?: RateShape|null,
 *   tiers?: list<PricingTier|PricingTierShape>|null,
 *   type?: string|null,
 *   unit?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Cached input token rate. Present only on inference product entries.
     */
    #[Optional('cached_input_rate')]
    public ?string $cachedInputRate;

    /**
     * Cached input token tiered pricing. Present only on inference product entries.
     *
     * @var list<PricingTier>|null $cachedInputTiers
     */
    #[Optional('cached_input_tiers', list: PricingTier::class)]
    public ?array $cachedInputTiers;

    /**
     * ISO country code. Null for non-geographic products.
     */
    #[Optional('country_iso', nullable: true)]
    public ?string $countryISO;

    /**
     * ISO currency code (e.g., USD).
     */
    #[Optional]
    public ?string $currency;

    /**
     * Direction (e.g., termination). Null for non-directional products.
     */
    #[Optional(nullable: true)]
    public ?string $direction;

    /**
     * Input token rate. Present only on inference product entries.
     */
    #[Optional('input_rate')]
    public ?string $inputRate;

    /**
     * Input token tiered pricing. Present only on inference product entries.
     *
     * @var list<PricingTier>|null $inputTiers
     */
    #[Optional('input_tiers', list: PricingTier::class)]
    public ?array $inputTiers;

    /**
     * Model identifier. Present only on inference product entries.
     */
    #[Optional]
    public ?string $model;

    /**
     * Human-readable name describing the pricing entry.
     */
    #[Optional]
    public ?string $name;

    /**
     * Additional note for rate-deck products (e.g., "Pricing is determined by the WhatsApp rate deck.").
     */
    #[Optional(nullable: true)]
    public ?string $note;

    /**
     * Output token rate. Present only on inference product entries.
     */
    #[Optional('output_rate')]
    public ?string $outputRate;

    /**
     * Output token tiered pricing. Present only on inference product entries.
     *
     * @var list<PricingTier>|null $outputTiers
     */
    #[Optional('output_tiers', list: PricingTier::class)]
    public ?array $outputTiers;

    /**
     * Pricing type for non-standard products (e.g., rate_deck). Absent on standard products.
     */
    #[Optional('pricing_type', nullable: true)]
    public ?string $pricingType;

    /**
     * Per-unit rate. Numeric for standard products, string for inference products. Null for rate-deck products.
     *
     * @var RateVariants|null $rate
     */
    #[Optional(nullable: true)]
    public float|string|null $rate;

    /**
     * Volume-based tiered pricing. Empty for rate-deck products.
     *
     * @var list<PricingTier>|null $tiers
     */
    #[Optional(list: PricingTier::class)]
    public ?array $tiers;

    /**
     * Pricing type (e.g., usage).
     */
    #[Optional]
    public ?string $type;

    /**
     * Unit of measurement (e.g., part, message, GB, per_1k_tokens).
     */
    #[Optional]
    public ?string $unit;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<PricingTier|PricingTierShape>|null $cachedInputTiers
     * @param list<PricingTier|PricingTierShape>|null $inputTiers
     * @param list<PricingTier|PricingTierShape>|null $outputTiers
     * @param RateShape|null $rate
     * @param list<PricingTier|PricingTierShape>|null $tiers
     */
    public static function with(
        ?string $cachedInputRate = null,
        ?array $cachedInputTiers = null,
        ?string $countryISO = null,
        ?string $currency = null,
        ?string $direction = null,
        ?string $inputRate = null,
        ?array $inputTiers = null,
        ?string $model = null,
        ?string $name = null,
        ?string $note = null,
        ?string $outputRate = null,
        ?array $outputTiers = null,
        ?string $pricingType = null,
        float|string|null $rate = null,
        ?array $tiers = null,
        ?string $type = null,
        ?string $unit = null,
    ): self {
        $self = new self;

        null !== $cachedInputRate && $self['cachedInputRate'] = $cachedInputRate;
        null !== $cachedInputTiers && $self['cachedInputTiers'] = $cachedInputTiers;
        null !== $countryISO && $self['countryISO'] = $countryISO;
        null !== $currency && $self['currency'] = $currency;
        null !== $direction && $self['direction'] = $direction;
        null !== $inputRate && $self['inputRate'] = $inputRate;
        null !== $inputTiers && $self['inputTiers'] = $inputTiers;
        null !== $model && $self['model'] = $model;
        null !== $name && $self['name'] = $name;
        null !== $note && $self['note'] = $note;
        null !== $outputRate && $self['outputRate'] = $outputRate;
        null !== $outputTiers && $self['outputTiers'] = $outputTiers;
        null !== $pricingType && $self['pricingType'] = $pricingType;
        null !== $rate && $self['rate'] = $rate;
        null !== $tiers && $self['tiers'] = $tiers;
        null !== $type && $self['type'] = $type;
        null !== $unit && $self['unit'] = $unit;

        return $self;
    }

    /**
     * Cached input token rate. Present only on inference product entries.
     */
    public function withCachedInputRate(string $cachedInputRate): self
    {
        $self = clone $this;
        $self['cachedInputRate'] = $cachedInputRate;

        return $self;
    }

    /**
     * Cached input token tiered pricing. Present only on inference product entries.
     *
     * @param list<PricingTier|PricingTierShape> $cachedInputTiers
     */
    public function withCachedInputTiers(array $cachedInputTiers): self
    {
        $self = clone $this;
        $self['cachedInputTiers'] = $cachedInputTiers;

        return $self;
    }

    /**
     * ISO country code. Null for non-geographic products.
     */
    public function withCountryISO(?string $countryISO): self
    {
        $self = clone $this;
        $self['countryISO'] = $countryISO;

        return $self;
    }

    /**
     * ISO currency code (e.g., USD).
     */
    public function withCurrency(string $currency): self
    {
        $self = clone $this;
        $self['currency'] = $currency;

        return $self;
    }

    /**
     * Direction (e.g., termination). Null for non-directional products.
     */
    public function withDirection(?string $direction): self
    {
        $self = clone $this;
        $self['direction'] = $direction;

        return $self;
    }

    /**
     * Input token rate. Present only on inference product entries.
     */
    public function withInputRate(string $inputRate): self
    {
        $self = clone $this;
        $self['inputRate'] = $inputRate;

        return $self;
    }

    /**
     * Input token tiered pricing. Present only on inference product entries.
     *
     * @param list<PricingTier|PricingTierShape> $inputTiers
     */
    public function withInputTiers(array $inputTiers): self
    {
        $self = clone $this;
        $self['inputTiers'] = $inputTiers;

        return $self;
    }

    /**
     * Model identifier. Present only on inference product entries.
     */
    public function withModel(string $model): self
    {
        $self = clone $this;
        $self['model'] = $model;

        return $self;
    }

    /**
     * Human-readable name describing the pricing entry.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Additional note for rate-deck products (e.g., "Pricing is determined by the WhatsApp rate deck.").
     */
    public function withNote(?string $note): self
    {
        $self = clone $this;
        $self['note'] = $note;

        return $self;
    }

    /**
     * Output token rate. Present only on inference product entries.
     */
    public function withOutputRate(string $outputRate): self
    {
        $self = clone $this;
        $self['outputRate'] = $outputRate;

        return $self;
    }

    /**
     * Output token tiered pricing. Present only on inference product entries.
     *
     * @param list<PricingTier|PricingTierShape> $outputTiers
     */
    public function withOutputTiers(array $outputTiers): self
    {
        $self = clone $this;
        $self['outputTiers'] = $outputTiers;

        return $self;
    }

    /**
     * Pricing type for non-standard products (e.g., rate_deck). Absent on standard products.
     */
    public function withPricingType(?string $pricingType): self
    {
        $self = clone $this;
        $self['pricingType'] = $pricingType;

        return $self;
    }

    /**
     * Per-unit rate. Numeric for standard products, string for inference products. Null for rate-deck products.
     *
     * @param RateShape|null $rate
     */
    public function withRate(float|string|null $rate): self
    {
        $self = clone $this;
        $self['rate'] = $rate;

        return $self;
    }

    /**
     * Volume-based tiered pricing. Empty for rate-deck products.
     *
     * @param list<PricingTier|PricingTierShape> $tiers
     */
    public function withTiers(array $tiers): self
    {
        $self = clone $this;
        $self['tiers'] = $tiers;

        return $self;
    }

    /**
     * Pricing type (e.g., usage).
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * Unit of measurement (e.g., part, message, GB, per_1k_tokens).
     */
    public function withUnit(string $unit): self
    {
        $self = clone $this;
        $self['unit'] = $unit;

        return $self;
    }
}
