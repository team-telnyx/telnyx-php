<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Messaging10dlc\CampaignBuilder;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Messaging10dlc\CampaignBuilder\Brand\BrandQualifyByUsecaseResponse;
use Telnyx\RequestOptions;

interface BrandContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function qualifyByUsecase(
        string $usecase,
        string $brandID,
        ?RequestOptions $requestOptions = null
    ): BrandQualifyByUsecaseResponse;
}
