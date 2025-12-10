<?php

declare(strict_types=1);

namespace Telnyx\Services\Number10dlc;

use Telnyx\Campaign\CampaignSharingStatus;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\Number10dlc\PartnerCampaign\PartnerCampaignGetSharedByMeResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Number10dlc\PartnerCampaignContract;

final class PartnerCampaignService implements PartnerCampaignContract
{
    /**
     * @api
     */
    public PartnerCampaignRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new PartnerCampaignRawService($client);
    }

    /**
     * @api
     *
     * Get all partner campaigns you have shared to Telnyx in a paginated fashion
     *
     * This endpoint is currently limited to only returning shared campaigns that Telnyx
     * has accepted. In other words, shared but pending campaigns are currently omitted
     * from the response from this endpoint.
     *
     * @param int $page The 1-indexed page number to get. The default value is `1`.
     * @param int $recordsPerPage The amount of records per page, limited to between 1 and 500 inclusive. The default value is `10`.
     *
     * @throws APIException
     */
    public function retrieveSharedByMe(
        int $page = 1,
        int $recordsPerPage = 10,
        ?RequestOptions $requestOptions = null,
    ): PartnerCampaignGetSharedByMeResponse {
        $params = Util::removeNulls(
            ['page' => $page, 'recordsPerPage' => $recordsPerPage]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveSharedByMe(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get Sharing Status
     *
     * @param string $campaignID ID of the campaign in question
     *
     * @return array<string,CampaignSharingStatus>
     *
     * @throws APIException
     */
    public function retrieveSharing(
        string $campaignID,
        ?RequestOptions $requestOptions = null
    ): array {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveSharing($campaignID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
