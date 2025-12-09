<?php

declare(strict_types=1);

namespace Telnyx\Campaign\Usecase;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type UsecaseGetCostResponseShape = array{
 *   campaignUsecase: string,
 *   description: string,
 *   monthlyCost: string,
 *   upFrontCost: string,
 * }
 */
final class UsecaseGetCostResponse implements BaseModel
{
    /** @use SdkModel<UsecaseGetCostResponseShape> */
    use SdkModel;

    #[Required]
    public string $campaignUsecase;

    #[Required]
    public string $description;

    #[Required]
    public string $monthlyCost;

    #[Required]
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
        $self = new self;

        $self['campaignUsecase'] = $campaignUsecase;
        $self['description'] = $description;
        $self['monthlyCost'] = $monthlyCost;
        $self['upFrontCost'] = $upFrontCost;

        return $self;
    }

    public function withCampaignUsecase(string $campaignUsecase): self
    {
        $self = clone $this;
        $self['campaignUsecase'] = $campaignUsecase;

        return $self;
    }

    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    public function withMonthlyCost(string $monthlyCost): self
    {
        $self = clone $this;
        $self['monthlyCost'] = $monthlyCost;

        return $self;
    }

    public function withUpFrontCost(string $upFrontCost): self
    {
        $self = clone $this;
        $self['upFrontCost'] = $upFrontCost;

        return $self;
    }
}
