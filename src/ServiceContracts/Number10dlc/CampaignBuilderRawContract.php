<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Number10dlc;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Number10dlc\Campaign\TelnyxCampaignCsp;
use Telnyx\Number10dlc\CampaignBuilder\CampaignBuilderSubmitParams;
use Telnyx\RequestOptions;

interface CampaignBuilderRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|CampaignBuilderSubmitParams $params
     *
     * @return BaseResponse<TelnyxCampaignCsp>
     *
     * @throws APIException
     */
    public function submit(
        array|CampaignBuilderSubmitParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
