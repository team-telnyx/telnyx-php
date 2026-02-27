<?php

declare(strict_types=1);

namespace Telnyx\Services\Messaging10dlc;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Conversion\MapOf;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\Messaging10dlc\Campaign\CampaignDeactivateResponse;
use Telnyx\Messaging10dlc\Campaign\CampaignGetMnoMetadataResponse;
use Telnyx\Messaging10dlc\Campaign\CampaignGetSharingStatusResponse;
use Telnyx\Messaging10dlc\Campaign\CampaignListParams;
use Telnyx\Messaging10dlc\Campaign\CampaignListParams\Sort;
use Telnyx\Messaging10dlc\Campaign\CampaignListResponse;
use Telnyx\Messaging10dlc\Campaign\CampaignSubmitAppealParams;
use Telnyx\Messaging10dlc\Campaign\CampaignSubmitAppealResponse;
use Telnyx\Messaging10dlc\Campaign\CampaignUpdateParams;
use Telnyx\Messaging10dlc\Campaign\TelnyxCampaignCsp;
use Telnyx\PerPagePaginationV2;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Messaging10dlc\CampaignRawContract;

/**
 * Campaign operations.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TelnyxCampaignCsp>
     *
     * @throws APIException
     */
    public function retrieve(
        string $campaignID,
        RequestOptions|array|null $requestOptions = null
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TelnyxCampaignCsp>
     *
     * @throws APIException
     */
    public function update(
        string $campaignID,
        array|CampaignUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PerPagePaginationV2<CampaignListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|CampaignListParams $params,
        RequestOptions|array|null $requestOptions = null,
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
            page: PerPagePaginationV2::class,
        );
    }

    /**
     * @api
     *
     * Manually accept a campaign shared with Telnyx
     *
     * @param string $campaignID TCR's ID for the campaign to import
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<array<string,mixed>>
     *
     * @throws APIException
     */
    public function acceptSharing(
        string $campaignID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['10dlc/campaign/acceptSharing/%1$s', $campaignID],
            options: $requestOptions,
            convert: new MapOf('mixed'),
        );
    }

    /**
     * @api
     *
     * Terminate a campaign. Note that once deactivated, a campaign cannot be restored.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CampaignDeactivateResponse>
     *
     * @throws APIException
     */
    public function deactivate(
        string $campaignID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['10dlc/campaign/%1$s', $campaignID],
            options: $requestOptions,
            convert: CampaignDeactivateResponse::class,
        );
    }

    /**
     * @api
     *
     * Get the campaign metadata for each MNO it was submitted to.
     *
     * @param string $campaignID ID of the campaign in question
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CampaignGetMnoMetadataResponse>
     *
     * @throws APIException
     */
    public function getMnoMetadata(
        string $campaignID,
        RequestOptions|array|null $requestOptions = null
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<array<string,mixed>>
     *
     * @throws APIException
     */
    public function getOperationStatus(
        string $campaignID,
        RequestOptions|array|null $requestOptions = null
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CampaignGetSharingStatusResponse>
     *
     * @throws APIException
     */
    public function getSharingStatus(
        string $campaignID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['10dlc/campaign/%1$s/sharing', $campaignID],
            options: $requestOptions,
            convert: CampaignGetSharingStatusResponse::class,
        );
    }

    /**
     * @api
     *
     * Submits an appeal for rejected native campaigns in TELNYX_FAILED or MNO_REJECTED status. The appeal is recorded for manual compliance team review and the campaign status is reset to TCR_ACCEPTED. Note: Appeal forwarding is handled manually to allow proper review before incurring upstream charges.
     *
     * @param string $campaignID The Telnyx campaign identifier
     * @param array{appealReason: string}|CampaignSubmitAppealParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CampaignSubmitAppealResponse>
     *
     * @throws APIException
     */
    public function submitAppeal(
        string $campaignID,
        array|CampaignSubmitAppealParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CampaignSubmitAppealParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['10dlc/campaign/%1$s/appeal', $campaignID],
            body: (object) $parsed,
            options: $options,
            convert: CampaignSubmitAppealResponse::class,
        );
    }
}
