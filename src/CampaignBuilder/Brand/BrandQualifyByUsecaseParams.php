<?php

declare(strict_types=1);

namespace Telnyx\CampaignBuilder\Brand;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * This endpoint allows you to see whether or not the supplied brand is suitable for your desired campaign use case.
 *
 * @see Telnyx\Services\CampaignBuilder\BrandService::qualifyByUsecase()
 *
 * @phpstan-type BrandQualifyByUsecaseParamsShape = array{brandId: string}
 */
final class BrandQualifyByUsecaseParams implements BaseModel
{
    /** @use SdkModel<BrandQualifyByUsecaseParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $brandId;

    /**
     * `new BrandQualifyByUsecaseParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BrandQualifyByUsecaseParams::with(brandId: ...)
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
    public static function with(string $brandId): self
    {
        $obj = new self;

        $obj->brandId = $brandId;

        return $obj;
    }

    public function withBrandID(string $brandID): self
    {
        $obj = clone $this;
        $obj->brandId = $brandID;

        return $obj;
    }
}
