<?php

declare(strict_types=1);

namespace Telnyx\ChargesBreakdown\ChargesBreakdownGetResponse\Data\Result;

use Telnyx\Core\Attributes\Api;
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
    #[Api]
    public string $cost;

    /**
     * Type of cost (MRC or OTC).
     */
    #[Api('cost_type')]
    public string $costType;

    /**
     * Service name.
     */
    #[Api]
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
        $obj = new self;

        $obj->cost = $cost;
        $obj->costType = $costType;
        $obj->name = $name;

        return $obj;
    }

    /**
     * Cost per unit as decimal string.
     */
    public function withCost(string $cost): self
    {
        $obj = clone $this;
        $obj->cost = $cost;

        return $obj;
    }

    /**
     * Type of cost (MRC or OTC).
     */
    public function withCostType(string $costType): self
    {
        $obj = clone $this;
        $obj->costType = $costType;

        return $obj;
    }

    /**
     * Service name.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }
}
