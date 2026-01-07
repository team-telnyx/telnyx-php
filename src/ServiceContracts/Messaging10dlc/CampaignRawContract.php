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

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface CampaignRawContract
{
    /**
     * @api
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|CampaignUpdateParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|CampaignListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PerPagePaginationV2<CampaignListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|CampaignListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $campaignID The Telnyx campaign identifier
     * @param array<string,mixed>|CampaignSubmitAppealParams $params
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
    ): BaseResponse;
}
