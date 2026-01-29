<?php

declare(strict_types=1);

namespace Telnyx\Messaging10dlc\CampaignBuilder\Brand;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * This endpoint allows you to see whether or not the supplied brand is suitable for your desired campaign use case.
 *
 * @see Telnyx\Services\Messaging10dlc\CampaignBuilder\BrandService::qualifyByUsecase()
 *
 * @phpstan-type BrandQualifyByUsecaseParamsShape = array{brandID: string}
 */
final class BrandQualifyByUsecaseParams implements BaseModel
{
    /** @use SdkModel<BrandQualifyByUsecaseParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $brandID;

    /**
     * `new BrandQualifyByUsecaseParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BrandQualifyByUsecaseParams::with(brandID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BrandQualifyByUsecaseParams)->withBrandID(...)
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
    public static function with(string $brandID): self
    {
        $self = new self;

        $self['brandID'] = $brandID;

        return $self;
    }

    public function withBrandID(string $brandID): self
    {
        $self = clone $this;
        $self['brandID'] = $brandID;

        return $self;
    }
}
