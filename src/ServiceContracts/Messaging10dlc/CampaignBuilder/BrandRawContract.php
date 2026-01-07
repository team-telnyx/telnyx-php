<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Messaging10dlc\CampaignBuilder;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Messaging10dlc\CampaignBuilder\Brand\BrandQualifyByUsecaseParams;
use Telnyx\Messaging10dlc\CampaignBuilder\Brand\BrandQualifyByUsecaseResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface BrandRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|BrandQualifyByUsecaseParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BrandQualifyByUsecaseResponse>
     *
     * @throws APIException
     */
    public function qualifyByUsecase(
        string $usecase,
        array|BrandQualifyByUsecaseParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
