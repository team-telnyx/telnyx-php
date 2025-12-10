<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Number10dlc\CampaignBuilder;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Number10dlc\CampaignBuilder\Brand\BrandGetResponse;
use Telnyx\Number10dlc\CampaignBuilder\Brand\BrandRetrieveParams;
use Telnyx\RequestOptions;

interface BrandRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|BrandRetrieveParams $params
     *
     * @return BaseResponse<BrandGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $usecase,
        array|BrandRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
