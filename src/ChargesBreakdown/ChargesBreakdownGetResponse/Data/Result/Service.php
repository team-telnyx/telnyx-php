<?php

declare(strict_types=1);

namespace Telnyx\ChargesBreakdown\ChargesBreakdownGetResponse\Data\Result;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ServiceShape = array{cost: string, costType: string, name: string}
 */
final class Service implements BaseModel
{
    /** @use SdkModel<ServiceShape> */
    use SdkModel;

    /**
     * Cost per unit as decimal string.
     */
    #[Required]
    public string $cost;

    /**
     * Type of cost (MRC or OTC).
     */
    #[Required('cost_type')]
    public string $costType;

    /**
     * Service name.
     */
    #[Required]
    public string $name;

    /**
     * `new Service()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Service::with(cost: ..., costType: ..., name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Service)->withCost(...)->withCostType(...)->withName(...)
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
        string $cost,
        string $costType,
        string $name
    ): self {
        $self = new self;

        $self['cost'] = $cost;
        $self['costType'] = $costType;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Cost per unit as decimal string.
     */
    public function withCost(string $cost): self
    {
        $self = clone $this;
        $self['cost'] = $cost;

        return $self;
    }

    /**
     * Type of cost (MRC or OTC).
     */
    public function withCostType(string $costType): self
    {
        $self = clone $this;
        $self['costType'] = $costType;

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
}
