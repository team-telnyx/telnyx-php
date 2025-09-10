<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\CampaignBuilder;

use Telnyx\CampaignBuilder\Brand\BrandQualifyByUsecaseResponse;
use Telnyx\RequestOptions;

interface BrandContract
{
    /**
     * @api
     *
     * @param string $brandID
     */
    public function qualifyByUsecase(
        string $usecase,
        $brandID,
        ?RequestOptions $requestOptions = null
    ): BrandQualifyByUsecaseResponse;
}
