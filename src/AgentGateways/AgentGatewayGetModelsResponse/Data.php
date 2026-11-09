<?php

declare(strict_types=1);

namespace Telnyx\AgentGateways\AgentGatewayGetModelsResponse;

use Telnyx\AgentGateways\AgentGatewayGetModelsResponse\Data\Pricing;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * A model an instance serves.
 *
 * @phpstan-import-type PricingShape from \Telnyx\AgentGateways\AgentGatewayGetModelsResponse\Data\Pricing
 *
 * @phpstan-type DataShape = array{
 *   id: string,
 *   model: string,
 *   name: string,
 *   pricedAt: \DateTimeInterface|null,
 *   pricing: Pricing|PricingShape,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * The model's ID on the instance.
     */
    #[Required]
    public string $id;

    /**
     * The Telnyx Inference model behind it, such as `zai-org/GLM-5.3-Flash`.
     */
    #[Required]
    public string $model;

    /**
     * The name a request uses, such as `GLM-5.3-Flash`.
     */
    #[Required]
    public string $name;

    /**
     * When the price was last set.
     */
    #[Required('priced_at')]
    public ?\DateTimeInterface $pricedAt;

    /**
     * A model's price in USD per million tokens.
     */
    #[Required]
    public Pricing $pricing;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(id: ..., model: ..., name: ..., pricedAt: ..., pricing: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)
     *   ->withID(...)
     *   ->withModel(...)
     *   ->withName(...)
     *   ->withPricedAt(...)
     *   ->withPricing(...)
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
     * @param Pricing|PricingShape $pricing
     */
    public static function with(
        string $id,
        string $model,
        string $name,
        ?\DateTimeInterface $pricedAt,
        Pricing|array $pricing,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['model'] = $model;
        $self['name'] = $name;
        $self['pricedAt'] = $pricedAt;
        $self['pricing'] = $pricing;

        return $self;
    }

    /**
     * The model's ID on the instance.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The Telnyx Inference model behind it, such as `zai-org/GLM-5.3-Flash`.
     */
    public function withModel(string $model): self
    {
        $self = clone $this;
        $self['model'] = $model;

        return $self;
    }

    /**
     * The name a request uses, such as `GLM-5.3-Flash`.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * When the price was last set.
     */
    public function withPricedAt(?\DateTimeInterface $pricedAt): self
    {
        $self = clone $this;
        $self['pricedAt'] = $pricedAt;

        return $self;
    }

    /**
     * A model's price in USD per million tokens.
     *
     * @param Pricing|PricingShape $pricing
     */
    public function withPricing(Pricing|array $pricing): self
    {
        $self = clone $this;
        $self['pricing'] = $pricing;

        return $self;
    }
}
