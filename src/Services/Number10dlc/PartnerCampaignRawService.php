<?php

declare(strict_types=1);

namespace Telnyx\Services\Number10dlc;

use Telnyx\Campaign\CampaignSharingStatus;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Conversion\MapOf;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Number10dlc\PartnerCampaign\PartnerCampaignGetSharedByMeResponse;
use Telnyx\Number10dlc\PartnerCampaign\PartnerCampaignRetrieveSharedByMeParams;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Number10dlc\PartnerCampaignRawContract;

final class PartnerCampaignRawService implements PartnerCampaignRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get all partner campaigns you have shared to Telnyx in a paginated fashion
     *
     * This endpoint is currently limited to only returning shared campaigns that Telnyx
     * has accepted. In other words, shared but pending campaigns are currently omitted
     * from the response from this endpoint.
     *
     * @param array{
     *   page?: int, recordsPerPage?: int
     * }|PartnerCampaignRetrieveSharedByMeParams $params
     *
     * @return BaseResponse<PartnerCampaignGetSharedByMeResponse>
     *
     * @throws APIException
     */
    public function retrieveSharedByMe(
        array|PartnerCampaignRetrieveSharedByMeParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PartnerCampaignRetrieveSharedByMeParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: '10dlc/partnerCampaign/sharedByMe',
            query: $parsed,
            options: $options,
            convert: PartnerCampaignGetSharedByMeResponse::class,
        );
    }

    /**
     * @api
     *
     * Get Sharing Status
     *
     * @param string $campaignID ID of the campaign in question
     *
     * @return BaseResponse<array<string,CampaignSharingStatus>>
     *
     * @throws APIException
     */
    public function retrieveSharing(
        string $campaignID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['10dlc/partnerCampaign/%1$s/sharing', $campaignID],
            options: $requestOptions,
            convert: new MapOf(CampaignSharingStatus::class),
        );
    }
}
