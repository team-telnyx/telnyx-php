<?php

declare(strict_types=1);

namespace Telnyx\Services\Number10dlc;

use Telnyx\Campaign\TelnyxCampaignCsp;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Conversion\MapOf;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\Number10dlc\Campaign\CampaignAppealParams;
use Telnyx\Number10dlc\Campaign\CampaignAppealResponse;
use Telnyx\Number10dlc\Campaign\CampaignDeleteResponse;
use Telnyx\Number10dlc\Campaign\CampaignGetMnoMetadataResponse;
use Telnyx\Number10dlc\Campaign\CampaignGetSharingResponse;
use Telnyx\Number10dlc\Campaign\CampaignListParams;
use Telnyx\Number10dlc\Campaign\CampaignListParams\Sort;
use Telnyx\Number10dlc\Campaign\CampaignListResponse;
use Telnyx\Number10dlc\Campaign\CampaignUpdateParams;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Number10dlc\CampaignRawContract;

final class CampaignRawService implements CampaignRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve campaign details by `campaignId`.
     *
     * @return BaseResponse<TelnyxCampaignCsp>
     *
     * @throws APIException
     */
    public function retrieve(
        string $campaignID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['10dlc/campaign/%1$s', $campaignID],
            options: $requestOptions,
            convert: TelnyxCampaignCsp::class,
        );
    }

    /**
     * @api
     *
     * Update a campaign's properties by `campaignId`. **Please note:** only sample messages are editable.
     *
     * @param array{
     *   autoRenewal?: bool,
     *   helpMessage?: string,
     *   messageFlow?: string,
     *   resellerID?: string,
     *   sample1?: string,
     *   sample2?: string,
     *   sample3?: string,
     *   sample4?: string,
     *   sample5?: string,
     *   webhookFailoverURL?: string,
     *   webhookURL?: string,
     * }|CampaignUpdateParams $params
     *
     * @return BaseResponse<TelnyxCampaignCsp>
     *
     * @throws APIException
     */
    public function update(
        string $campaignID,
        array|CampaignUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CampaignUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['10dlc/campaign/%1$s', $campaignID],
            body: (object) $parsed,
            options: $options,
            convert: TelnyxCampaignCsp::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a list of campaigns associated with a supplied `brandId`.
     *
     * @param array{
     *   brandID: string, page?: int, recordsPerPage?: int, sort?: value-of<Sort>
     * }|CampaignListParams $params
     *
     * @return BaseResponse<CampaignListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|CampaignListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = CampaignListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: '10dlc/campaign',
            query: Util::array_transform_keys($parsed, ['brandID' => 'brandId']),
            options: $options,
            convert: CampaignListResponse::class,
        );
    }

    /**
     * @api
     *
     * Terminate a campaign. Note that once deactivated, a campaign cannot be restored.
     *
     * @return BaseResponse<CampaignDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $campaignID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['10dlc/campaign/%1$s', $campaignID],
            options: $requestOptions,
            convert: CampaignDeleteResponse::class,
        );
    }

    /**
     * @api
     *
     * Submits an appeal for rejected native campaigns in TELNYX_FAILED or MNO_REJECTED status. The appeal is recorded for manual compliance team review and the campaign status is reset to TCR_ACCEPTED. Note: Appeal forwarding is handled manually to allow proper review before incurring upstream charges.
     *
     * @param string $campaignID The Telnyx campaign identifier
     * @param array{appealReason: string}|CampaignAppealParams $params
     *
     * @return BaseResponse<CampaignAppealResponse>
     *
     * @throws APIException
     */
    public function appeal(
        string $campaignID,
        array|CampaignAppealParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CampaignAppealParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['10dlc/campaign/%1$s/appeal', $campaignID],
            body: (object) $parsed,
            options: $options,
            convert: CampaignAppealResponse::class,
        );
    }

    /**
     * @api
     *
     * Get the campaign metadata for each MNO it was submitted to.
     *
     * @param string $campaignID ID of the campaign in question
     *
     * @return BaseResponse<CampaignGetMnoMetadataResponse>
     *
     * @throws APIException
     */
    public function retrieveMnoMetadata(
        string $campaignID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['10dlc/campaign/%1$s/mnoMetadata', $campaignID],
            options: $requestOptions,
            convert: CampaignGetMnoMetadataResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve campaign's operation status at MNO level.
     *
     * @return BaseResponse<array<string,mixed>>
     *
     * @throws APIException
     */
    public function retrieveOperationStatus(
        string $campaignID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['10dlc/campaign/%1$s/operationStatus', $campaignID],
            options: $requestOptions,
            convert: new MapOf('mixed'),
        );
    }

    /**
     * @api
     *
     * Get Sharing Status
     *
     * @param string $campaignID ID of the campaign in question
     *
     * @return BaseResponse<CampaignGetSharingResponse>
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
            path: ['10dlc/campaign/%1$s/sharing', $campaignID],
            options: $requestOptions,
            convert: CampaignGetSharingResponse::class,
        );
    }
}
