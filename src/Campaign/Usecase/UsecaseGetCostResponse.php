<?php

declare(strict_types=1);

namespace Telnyx\Campaign\Usecase;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type usecase_get_cost_response = array{
 *   campaignUsecase: string,
 *   description: string,
 *   monthlyCost: string,
 *   upFrontCost: string,
 * }
 */
final class UsecaseGetCostResponse implements BaseModel
{
    /** @use SdkModel<usecase_get_cost_response> */
    use SdkModel;

    #[Api]
    public string $campaignUsecase;

    #[Api]
    public string $description;

    #[Api]
    public string $monthlyCost;

    #[Api]
    public string $upFrontCost;

    /**
     * `new UsecaseGetCostResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * UsecaseGetCostResponse::with(
     *   campaignUsecase: ..., description: ..., monthlyCost: ..., upFrontCost: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new UsecaseGetCostResponse)
     *   ->withCampaignUsecase(...)
     *   ->withDescription(...)
     *   ->withMonthlyCost(...)
     *   ->withUpFrontCost(...)
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
        string $campaignUsecase,
        string $description,
        string $monthlyCost,
        string $upFrontCost,
    ): self {
        $obj = new self;

        $obj->campaignUsecase = $campaignUsecase;
        $obj->description = $description;
        $obj->monthlyCost = $monthlyCost;
        $obj->upFrontCost = $upFrontCost;

        return $obj;
    }

    public function withCampaignUsecase(string $campaignUsecase): self
    {
        $obj = clone $this;
        $obj->campaignUsecase = $campaignUsecase;

        return $obj;
    }

    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj->description = $description;

        return $obj;
    }

    public function withMonthlyCost(string $monthlyCost): self
    {
        $obj = clone $this;
        $obj->monthlyCost = $monthlyCost;

        return $obj;
    }

    public function withUpFrontCost(string $upFrontCost): self
    {
        $obj = clone $this;
        $obj->upFrontCost = $upFrontCost;

        return $obj;
    }
}
