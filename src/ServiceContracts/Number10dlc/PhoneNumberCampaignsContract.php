<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Number10dlc;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Number10dlc\PhoneNumberCampaigns\PhoneNumberCampaignListParams\Sort;
use Telnyx\Number10dlc\PhoneNumberCampaigns\PhoneNumberCampaignListResponse;
use Telnyx\PhoneNumberCampaigns\PhoneNumberCampaign;
use Telnyx\RequestOptions;

interface PhoneNumberCampaignsContract
{
    /**
     * @api
     *
     * @param string $campaignID the ID of the campaign you want to link to the specified phone number
     * @param string $phoneNumber the phone number you want to link to a specified campaign
     *
     * @throws APIException
     */
    public function create(
        string $campaignID,
        string $phoneNumber,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumberCampaign;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $phoneNumber,
        ?RequestOptions $requestOptions = null
    ): PhoneNumberCampaign;

    /**
     * @api
     *
     * @param string $campaignID the ID of the campaign you want to link to the specified phone number
     * @param string $phoneNumber the phone number you want to link to a specified campaign
     *
     * @throws APIException
     */
    public function update(
        string $phoneNumber_,
        string $campaignID,
        string $phoneNumber,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumberCampaign;

    /**
     * @api
     *
     * @param array{
     *   tcrBrandID?: string,
     *   tcrCampaignID?: string,
     *   telnyxBrandID?: string,
     *   telnyxCampaignID?: string,
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[telnyx_campaign_id], filter[telnyx_brand_id], filter[tcr_campaign_id], filter[tcr_brand_id]
     * @param 'assignmentStatus'|'-assignmentStatus'|'createdAt'|'-createdAt'|'phoneNumber'|'-phoneNumber'|Sort $sort Specifies the sort order for results. If not given, results are sorted by createdAt in descending order.
     *
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        int $page = 1,
        int $recordsPerPage = 20,
        string|Sort $sort = '-createdAt',
        ?RequestOptions $requestOptions = null,
    ): PhoneNumberCampaignListResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $phoneNumber,
        ?RequestOptions $requestOptions = null
    ): PhoneNumberCampaign;
}
