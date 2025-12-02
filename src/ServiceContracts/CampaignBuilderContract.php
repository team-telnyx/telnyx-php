<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Campaign\TelnyxCampaignCsp;
use Telnyx\CampaignBuilder\CampaignBuilderCreateParams;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface CampaignBuilderContract
{
    /**
     * @api
     *
     * @param array<mixed>|CampaignBuilderCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|CampaignBuilderCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): TelnyxCampaignCsp;
}
