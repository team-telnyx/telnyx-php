<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Number10dlc;

use Telnyx\Campaign\TelnyxCampaignCsp;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Number10dlc\CampaignBuilder\CampaignBuilderCampaignBuilderParams;
use Telnyx\RequestOptions;

interface CampaignBuilderRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|CampaignBuilderCampaignBuilderParams $params
     *
     * @return BaseResponse<TelnyxCampaignCsp>
     *
     * @throws APIException
     */
    public function campaignBuilder(
        array|CampaignBuilderCampaignBuilderParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
