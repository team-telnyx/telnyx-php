<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\CampaignBuilder;

use Telnyx\CampaignBuilder\Brand\BrandQualifyByUsecaseParams;
use Telnyx\CampaignBuilder\Brand\BrandQualifyByUsecaseResponse;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface BrandRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|BrandQualifyByUsecaseParams $params
     *
     * @return BaseResponse<BrandQualifyByUsecaseResponse>
     *
     * @throws APIException
     */
    public function qualifyByUsecase(
        string $usecase,
        array|BrandQualifyByUsecaseParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
