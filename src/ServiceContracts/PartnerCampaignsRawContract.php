<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Campaign\CampaignSharingStatus;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\PartnerCampaigns\PartnerCampaignListParams;
use Telnyx\PartnerCampaigns\PartnerCampaignListResponse;
use Telnyx\PartnerCampaigns\PartnerCampaignListSharedByMeParams;
use Telnyx\PartnerCampaigns\PartnerCampaignListSharedByMeResponse;
use Telnyx\PartnerCampaigns\PartnerCampaignUpdateParams;
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

    /**
     * @api
     *
     * @param array<mixed>|PartnerCampaignListSharedByMeParams $params
     *
     * @return BaseResponse<PartnerCampaignListSharedByMeResponse>
     *
     * @throws APIException
     */
    public function listSharedByMe(
        array|PartnerCampaignListSharedByMeParams $params,
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
    public function retrieveSharingStatus(
        string $campaignID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
