<?php

declare(strict_types=1);

namespace Telnyx\Services\Messaging10dlc;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\Messaging10dlc\PhoneNumberCampaigns\PhoneNumberCampaign;
use Telnyx\Messaging10dlc\PhoneNumberCampaigns\PhoneNumberCampaignListParams\Sort;
use Telnyx\PerPagePaginationV2;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Messaging10dlc\PhoneNumberCampaignsContract;

final class PhoneNumberCampaignsService implements PhoneNumberCampaignsContract
{
    /**
     * @api
     */
    public PhoneNumberCampaignsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new PhoneNumberCampaignsRawService($client);
    }

    /**
     * @api
     *
     * Create New Phone Number Campaign
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
    ): PhoneNumberCampaign {
        $params = Util::removeNulls(
            ['campaignID' => $campaignID, 'phoneNumber' => $phoneNumber]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve an individual phone number/campaign assignment by `phoneNumber`.
     *
     * @throws APIException
     */
    public function retrieve(
        string $phoneNumber,
        ?RequestOptions $requestOptions = null
    ): PhoneNumberCampaign {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($phoneNumber, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Create New Phone Number Campaign
     *
     * @param string $campaignID the ID of the campaign you want to link to the specified phone number
     * @param string $phoneNumber the phone number you want to link to a specified campaign
     *
     * @throws APIException
     */
    public function update(
        string $campaignPhoneNumber,
        string $campaignID,
        string $phoneNumber,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumberCampaign {
        $params = Util::removeNulls(
            ['campaignID' => $campaignID, 'phoneNumber' => $phoneNumber]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($campaignPhoneNumber, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve All Phone Number Campaigns
     *
     * @param array{
     *   tcrBrandID?: string,
     *   tcrCampaignID?: string,
     *   telnyxBrandID?: string,
     *   telnyxCampaignID?: string,
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[telnyx_campaign_id], filter[telnyx_brand_id], filter[tcr_campaign_id], filter[tcr_brand_id]
     * @param 'assignmentStatus'|'-assignmentStatus'|'createdAt'|'-createdAt'|'phoneNumber'|'-phoneNumber'|Sort $sort Specifies the sort order for results. If not given, results are sorted by createdAt in descending order.
     *
     * @return PerPagePaginationV2<PhoneNumberCampaign>
     *
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        int $page = 1,
        int $recordsPerPage = 20,
        string|Sort $sort = '-createdAt',
        ?RequestOptions $requestOptions = null,
    ): PerPagePaginationV2 {
        $params = Util::removeNulls(
            [
                'filter' => $filter,
                'page' => $page,
                'recordsPerPage' => $recordsPerPage,
                'sort' => $sort,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * This endpoint allows you to remove a campaign assignment from the supplied `phoneNumber`.
     *
     * @throws APIException
     */
    public function delete(
        string $phoneNumber,
        ?RequestOptions $requestOptions = null
    ): PhoneNumberCampaign {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($phoneNumber, requestOptions: $requestOptions);

        return $response->parse();
    }
}
