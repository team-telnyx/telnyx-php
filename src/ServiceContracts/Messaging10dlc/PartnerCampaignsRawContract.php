<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Messaging10dlc;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Messaging10dlc\Campaign\CampaignSharingStatus;
use Telnyx\Messaging10dlc\PartnerCampaigns\PartnerCampaignListParams;
use Telnyx\Messaging10dlc\PartnerCampaigns\PartnerCampaignListSharedByMeParams;
use Telnyx\Messaging10dlc\PartnerCampaigns\PartnerCampaignListSharedByMeResponse;
use Telnyx\Messaging10dlc\PartnerCampaigns\PartnerCampaignUpdateParams;
use Telnyx\Messaging10dlc\PartnerCampaigns\TelnyxDownstreamCampaign;
use Telnyx\PerPagePaginationV2;
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
     * @param array<string,mixed>|PartnerCampaignUpdateParams $params
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
     * @param array<string,mixed>|PartnerCampaignListParams $params
     *
     * @return BaseResponse<PerPagePaginationV2<TelnyxDownstreamCampaign>>
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
     * @param array<string,mixed>|PartnerCampaignListSharedByMeParams $params
     *
     * @return BaseResponse<PerPagePaginationV2<PartnerCampaignListSharedByMeResponse>>
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
