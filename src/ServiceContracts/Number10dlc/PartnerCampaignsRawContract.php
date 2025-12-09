<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Number10dlc;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Number10dlc\PartnerCampaigns\PartnerCampaignListParams;
use Telnyx\Number10dlc\PartnerCampaigns\PartnerCampaignListResponse;
use Telnyx\Number10dlc\PartnerCampaigns\PartnerCampaignUpdateParams;
use Telnyx\PartnerCampaigns\TelnyxDownstreamCampaign;
use Telnyx\RequestOptions;

interface PartnerCampaignsRawContract
{
    /**
     * @api
     *
     * @return BaseResponse<TelnyxDownstreamCampaign>
     *
     * @throws APIException
     */
    public function retrieve(
        string $campaignID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|PartnerCampaignUpdateParams $params
     *
     * @return BaseResponse<TelnyxDownstreamCampaign>
     *
     * @throws APIException
     */
    public function update(
        string $campaignID,
        array|PartnerCampaignUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|PartnerCampaignListParams $params
     *
     * @return BaseResponse<PartnerCampaignListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|PartnerCampaignListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
