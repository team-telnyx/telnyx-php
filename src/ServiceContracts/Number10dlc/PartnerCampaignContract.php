<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Number10dlc;

use Telnyx\Campaign\CampaignSharingStatus;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Number10dlc\PartnerCampaign\PartnerCampaignGetSharedByMeResponse;
use Telnyx\RequestOptions;

interface PartnerCampaignContract
{
    /**
     * @api
     *
     * @param int $page The 1-indexed page number to get. The default value is `1`.
     * @param int $recordsPerPage The amount of records per page, limited to between 1 and 500 inclusive. The default value is `10`.
     *
     * @throws APIException
     */
    public function getSharedByMe(
        int $page = 1,
        int $recordsPerPage = 10,
        ?RequestOptions $requestOptions = null,
    ): PartnerCampaignGetSharedByMeResponse;

    /**
     * @api
     *
     * @param string $campaignID ID of the campaign in question
     *
     * @return array<string,CampaignSharingStatus>
     *
     * @throws APIException
     */
    public function getSharingStatus(
        string $campaignID,
        ?RequestOptions $requestOptions = null
    ): array;
}
