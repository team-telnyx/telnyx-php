<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\CampaignBuilder;

use Telnyx\CampaignBuilder\Brand\BrandQualifyByUsecaseResponse;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;

interface BrandContract
{
    /**
     * @api
     *
     * @param string $brandID
     *
     * @return BrandQualifyByUsecaseResponse<HasRawResponse>
     */
    public function qualifyByUsecase(
        string $usecase,
        $brandID,
        ?RequestOptions $requestOptions = null
    ): BrandQualifyByUsecaseResponse;
}
