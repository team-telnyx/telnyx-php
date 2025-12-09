<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Campaign\TelnyxCampaignCsp;
use Telnyx\CampaignBuilder\CampaignBuilderCreateParams;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface CampaignBuilderRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|CampaignBuilderCreateParams $params
     *
     * @return BaseResponse<TelnyxCampaignCsp>
     *
     * @throws APIException
     */
    public function create(
        array|CampaignBuilderCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
