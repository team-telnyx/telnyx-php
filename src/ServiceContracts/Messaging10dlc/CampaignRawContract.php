<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Messaging10dlc;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Messaging10dlc\Campaign\CampaignDeactivateResponse;
use Telnyx\Messaging10dlc\Campaign\CampaignGetMnoMetadataResponse;
use Telnyx\Messaging10dlc\Campaign\CampaignGetSharingStatusResponse;
use Telnyx\Messaging10dlc\Campaign\CampaignListParams;
use Telnyx\Messaging10dlc\Campaign\CampaignListResponse;
use Telnyx\Messaging10dlc\Campaign\CampaignSubmitAppealParams;
use Telnyx\Messaging10dlc\Campaign\CampaignSubmitAppealResponse;
use Telnyx\Messaging10dlc\Campaign\CampaignUpdateParams;
use Telnyx\Messaging10dlc\Campaign\TelnyxCampaignCsp;
use Telnyx\PerPagePaginationV2;
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
     * @param array<string,mixed>|CampaignUpdateParams $params
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
     * @param array<string,mixed>|CampaignListParams $params
     *
     * @return BaseResponse<PerPagePaginationV2<CampaignListResponse>>
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
     * @param string $campaignID TCR's ID for the campaign to import
     *
     * @return BaseResponse<array<string,mixed>>
     *
     * @throws APIException
     */
    public function acceptSharing(
        string $campaignID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<CampaignDeactivateResponse>
     *
     * @throws APIException
     */
    public function deactivate(
        string $campaignID,
        ?RequestOptions $requestOptions = null
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
    public function getMnoMetadata(
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
    public function getOperationStatus(
        string $campaignID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $campaignID ID of the campaign in question
     *
     * @return BaseResponse<CampaignGetSharingStatusResponse>
     *
     * @throws APIException
     */
    public function getSharingStatus(
        string $campaignID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $campaignID The Telnyx campaign identifier
     * @param array<string,mixed>|CampaignSubmitAppealParams $params
     *
     * @return BaseResponse<CampaignSubmitAppealResponse>
     *
     * @throws APIException
     */
    public function submitAppeal(
        string $campaignID,
        array|CampaignSubmitAppealParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
