<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\PhoneNumberCampaigns\PhoneNumberCampaign;
use Telnyx\PhoneNumberCampaigns\PhoneNumberCampaignListParams\Filter;
use Telnyx\PhoneNumberCampaigns\PhoneNumberCampaignListParams\Sort;
use Telnyx\PhoneNumberCampaigns\PhoneNumberCampaignListResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface PhoneNumberCampaignsContract
{
    /**
     * @api
     *
     * @param string $campaignID the ID of the campaign you want to link to the specified phone number
     * @param string $phoneNumber the phone number you want to link to a specified campaign
     *
     * @return PhoneNumberCampaign<HasRawResponse>
     *
     * @throws APIException
     */
    public function create(
        $campaignID,
        $phoneNumber,
        ?RequestOptions $requestOptions = null
    ): PhoneNumberCampaign;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return PhoneNumberCampaign<HasRawResponse>
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): PhoneNumberCampaign;

    /**
     * @api
     *
     * @return PhoneNumberCampaign<HasRawResponse>
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
     * @return PhoneNumberCampaign<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $phoneNumber,
        mixed $params,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumberCampaign;

    /**
     * @api
     *
     * @param string $campaignID the ID of the campaign you want to link to the specified phone number
     * @param string $phoneNumber1 the phone number you want to link to a specified campaign
     *
     * @return PhoneNumberCampaign<HasRawResponse>
     *
     * @throws APIException
     */
    public function update(
        string $phoneNumber,
        $campaignID,
        $phoneNumber1,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumberCampaign;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return PhoneNumberCampaign<HasRawResponse>
     *
     * @throws APIException
     */
    public function updateRaw(
        string $phoneNumber,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumberCampaign;

    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[telnyx_campaign_id], filter[telnyx_brand_id], filter[tcr_campaign_id], filter[tcr_brand_id]
     * @param int $page
     * @param int $recordsPerPage
     * @param Sort|value-of<Sort> $sort Specifies the sort order for results. If not given, results are sorted by createdAt in descending order.
     *
     * @return PhoneNumberCampaignListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        $filter = omit,
        $page = omit,
        $recordsPerPage = omit,
        $sort = omit,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumberCampaignListResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return PhoneNumberCampaignListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): PhoneNumberCampaignListResponse;

    /**
     * @api
     *
     * @return PhoneNumberCampaign<HasRawResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $phoneNumber,
        ?RequestOptions $requestOptions = null
    ): PhoneNumberCampaign;

    /**
     * @api
     *
     * @return PhoneNumberCampaign<HasRawResponse>
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $phoneNumber,
        mixed $params,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumberCampaign;
}
