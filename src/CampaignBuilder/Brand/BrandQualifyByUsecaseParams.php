<?php

declare(strict_types=1);

namespace Telnyx\CampaignBuilder\Brand;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new BrandQualifyByUsecaseParams); // set properties as needed
 * $client->campaignBuilder.brand->qualifyByUsecase(...$params->toArray());
 * ```
 * This endpoint allows you to see whether or not the supplied brand is suitable for your desired campaign use case.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->campaignBuilder.brand->qualifyByUsecase(...$params->toArray());`
 *
 * @see Telnyx\CampaignBuilder\Brand->qualifyByUsecase
 *
 * @phpstan-type brand_qualify_by_usecase_params = array{brandID: string}
 */
final class BrandQualifyByUsecaseParams implements BaseModel
{
    /** @use SdkModel<brand_qualify_by_usecase_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
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
        $obj = new self;

        $obj->brandID = $brandID;

        return $obj;
    }

    public function withBrandID(string $brandID): self
    {
        $obj = clone $this;
        $obj->brandID = $brandID;

        return $obj;
    }
}
