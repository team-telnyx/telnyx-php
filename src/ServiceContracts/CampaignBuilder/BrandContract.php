<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\CampaignBuilder;

use Telnyx\CampaignBuilder\Brand\BrandQualifyByUsecaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface BrandContract
{
    /**
     * @api
     *
     * @param string $brandID
     *
     * @throws APIException
     */
    public function qualifyByUsecase(
        string $usecase,
        $brandID,
        ?RequestOptions $requestOptions = null
    ): BrandQualifyByUsecaseResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function qualifyByUsecaseRaw(
        string $usecase,
        array $params,
        ?RequestOptions $requestOptions = null
    ): BrandQualifyByUsecaseResponse;
}
