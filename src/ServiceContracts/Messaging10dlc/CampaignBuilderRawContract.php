<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Messaging10dlc;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Messaging10dlc\Campaign\TelnyxCampaignCsp;
use Telnyx\Messaging10dlc\CampaignBuilder\CampaignBuilderSubmitParams;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface CampaignBuilderRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|CampaignBuilderSubmitParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TelnyxCampaignCsp>
     *
     * @throws APIException
     */
    public function submit(
        array|CampaignBuilderSubmitParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
