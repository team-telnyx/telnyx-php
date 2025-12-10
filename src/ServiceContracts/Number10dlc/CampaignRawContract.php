<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Number10dlc;

use Telnyx\Campaign\TelnyxCampaignCsp;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Number10dlc\Campaign\CampaignAppealParams;
use Telnyx\Number10dlc\Campaign\CampaignAppealResponse;
use Telnyx\Number10dlc\Campaign\CampaignDeleteResponse;
use Telnyx\Number10dlc\Campaign\CampaignGetMnoMetadataResponse;
use Telnyx\Number10dlc\Campaign\CampaignGetSharingResponse;
use Telnyx\Number10dlc\Campaign\CampaignListParams;
use Telnyx\Number10dlc\Campaign\CampaignListResponse;
use Telnyx\Number10dlc\Campaign\CampaignUpdateParams;
use Telnyx\RequestOptions;

interface CampaignRawContract
{
    /**
     * @api
     *
     * @return BaseResponse<TelnyxCampaignCsp>
     *
     * @throws APIException
     */
    public function retrieve(
        string $campaignID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|CampaignUpdateParams $params
     *
     * @return BaseResponse<TelnyxCampaignCsp>
     *
     * @throws APIException
     */
    public function update(
        string $campaignID,
        array|CampaignUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|CampaignListParams $params
     *
     * @return BaseResponse<CampaignListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|CampaignListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<CampaignDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $campaignID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $campaignID The Telnyx campaign identifier
     * @param array<mixed>|CampaignAppealParams $params
     *
     * @return BaseResponse<CampaignAppealResponse>
     *
     * @throws APIException
     */
    public function appeal(
        string $campaignID,
        array|CampaignAppealParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<array<string,mixed>>
     *
     * @throws APIException
     */
    public function retrieveOperationStatus(
        string $campaignID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;
}
