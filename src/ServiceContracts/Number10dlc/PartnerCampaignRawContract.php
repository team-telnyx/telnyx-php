<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Number10dlc;

use Telnyx\Campaign\CampaignSharingStatus;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Number10dlc\PartnerCampaign\PartnerCampaignGetSharedByMeParams;
use Telnyx\Number10dlc\PartnerCampaign\PartnerCampaignGetSharedByMeResponse;
use Telnyx\RequestOptions;

interface PartnerCampaignRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|PartnerCampaignGetSharedByMeParams $params
     *
     * @return BaseResponse<PartnerCampaignGetSharedByMeResponse>
     *
     * @throws APIException
     */
    public function getSharedByMe(
        array|PartnerCampaignGetSharedByMeParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $campaignID ID of the campaign in question
     *
     * @return BaseResponse<array<string,CampaignSharingStatus>>
     *
     * @throws APIException
     */
    public function getSharingStatus(
        string $campaignID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
