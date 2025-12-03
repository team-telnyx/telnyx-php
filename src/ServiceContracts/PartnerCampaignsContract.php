<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Campaign\CampaignSharingStatus;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\PartnerCampaigns\PartnerCampaignListParams;
use Telnyx\PartnerCampaigns\PartnerCampaignListSharedByMeParams;
use Telnyx\PartnerCampaigns\PartnerCampaignListSharedByMeResponse;
use Telnyx\PartnerCampaigns\PartnerCampaignUpdateParams;
use Telnyx\PartnerCampaigns\TelnyxDownstreamCampaign;
use Telnyx\PerPagePaginationV2;
use Telnyx\RequestOptions;

interface PartnerCampaignsContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $campaignID,
        ?RequestOptions $requestOptions = null
    ): TelnyxDownstreamCampaign;

    /**
     * @api
     *
     * @param array<mixed>|PartnerCampaignUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $campaignID,
        array|PartnerCampaignUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): TelnyxDownstreamCampaign;

    /**
     * @api
     *
     * @param array<mixed>|PartnerCampaignListParams $params
     *
     * @return PerPagePaginationV2<TelnyxDownstreamCampaign>
     *
     * @throws APIException
     */
    public function list(
        array|PartnerCampaignListParams $params,
        ?RequestOptions $requestOptions = null,
    ): PerPagePaginationV2;

    /**
     * @api
     *
     * @param array<mixed>|PartnerCampaignListSharedByMeParams $params
     *
     * @return PerPagePaginationV2<PartnerCampaignListSharedByMeResponse>
     *
     * @throws APIException
     */
    public function listSharedByMe(
        array|PartnerCampaignListSharedByMeParams $params,
        ?RequestOptions $requestOptions = null,
    ): PerPagePaginationV2;

    /**
     * @api
     *
     * @return array<string,CampaignSharingStatus>
     *
     * @throws APIException
     */
    public function retrieveSharingStatus(
        string $campaignID,
        ?RequestOptions $requestOptions = null
    ): array;
}
