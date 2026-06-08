<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Messaging10dlc\CampaignBuilder;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Messaging10dlc\CampaignBuilder\Brand\BrandQualifyByUsecaseResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface BrandContract
{
    /**
     * @api
     *
     * @param string $usecase unique identifier of the usecase
     * @param string $brandID unique identifier of the brand
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function qualifyByUsecase(
        string $usecase,
        string $brandID,
        RequestOptions|array|null $requestOptions = null,
    ): BrandQualifyByUsecaseResponse;
}
