<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Messaging10dlc;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Messaging10dlc\PhoneNumberCampaigns\PhoneNumberCampaign;
use Telnyx\Messaging10dlc\PhoneNumberCampaigns\PhoneNumberCampaignListParams\Filter;
use Telnyx\Messaging10dlc\PhoneNumberCampaigns\PhoneNumberCampaignListParams\Sort;
use Telnyx\PerPagePaginationV2;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type FilterShape from \Telnyx\Messaging10dlc\PhoneNumberCampaigns\PhoneNumberCampaignListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface PhoneNumberCampaignsContract
{
    /**
     * @api
     *
     * @param string $campaignID the ID of the campaign you want to link to the specified phone number
     * @param string $phoneNumber the phone number you want to link to a specified campaign
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $campaignID,
        string $phoneNumber,
        RequestOptions|array|null $requestOptions = null,
    ): PhoneNumberCampaign;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $phoneNumber,
        RequestOptions|array|null $requestOptions = null
    ): PhoneNumberCampaign;

    /**
     * @api
     *
     * @param string $campaignID the ID of the campaign you want to link to the specified phone number
     * @param string $phoneNumber the phone number you want to link to a specified campaign
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $campaignPhoneNumber,
        string $campaignID,
        string $phoneNumber,
        RequestOptions|array|null $requestOptions = null,
    ): PhoneNumberCampaign;

    /**
     * @api
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[telnyx_campaign_id], filter[telnyx_brand_id], filter[tcr_campaign_id], filter[tcr_brand_id]
     * @param Sort|value-of<Sort> $sort Specifies the sort order for results. If not given, results are sorted by createdAt in descending order.
     * @param RequestOpts|null $requestOptions
     *
     * @return PerPagePaginationV2<PhoneNumberCampaign>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        int $page = 1,
        int $recordsPerPage = 20,
        Sort|string $sort = '-createdAt',
        RequestOptions|array|null $requestOptions = null,
    ): PerPagePaginationV2;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $phoneNumber,
        RequestOptions|array|null $requestOptions = null
    ): PhoneNumberCampaign;
}
