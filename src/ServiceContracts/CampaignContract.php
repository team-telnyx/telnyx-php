<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Campaign\CampaignDeactivateResponse;
use Telnyx\Campaign\CampaignGetMnoMetadataResponse;
use Telnyx\Campaign\CampaignGetSharingStatusResponse;
use Telnyx\Campaign\CampaignListParams;
use Telnyx\Campaign\CampaignListResponse;
use Telnyx\Campaign\CampaignSubmitAppealParams;
use Telnyx\Campaign\CampaignSubmitAppealResponse;
use Telnyx\Campaign\CampaignUpdateParams;
use Telnyx\Campaign\TelnyxCampaignCsp;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface CampaignContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $campaignID,
        ?RequestOptions $requestOptions = null
    ): TelnyxCampaignCsp;

    /**
     * @api
     *
     * @param array<mixed>|CampaignUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $campaignID,
        array|CampaignUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): TelnyxCampaignCsp;

    /**
     * @api
     *
     * @param array<mixed>|CampaignListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|CampaignListParams $params,
        ?RequestOptions $requestOptions = null
    ): CampaignListResponse;

    /**
     * @api
     *
     * @return array<string,mixed>
     *
     * @throws APIException
     */
    public function acceptSharing(
        string $campaignID,
        ?RequestOptions $requestOptions = null
    ): array;

    /**
     * @api
     *
     * @throws APIException
     */
    public function deactivate(
        string $campaignID,
        ?RequestOptions $requestOptions = null
    ): CampaignDeactivateResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function getMnoMetadata(
        string $campaignID,
        ?RequestOptions $requestOptions = null
    ): CampaignGetMnoMetadataResponse;

    /**
     * @api
     *
     * @return array<string,mixed>
     *
     * @throws APIException
     */
    public function getOperationStatus(
        string $campaignID,
        ?RequestOptions $requestOptions = null
    ): array;

    /**
     * @api
     *
     * @throws APIException
     */
    public function getSharingStatus(
        string $campaignID,
        ?RequestOptions $requestOptions = null
    ): CampaignGetSharingStatusResponse;

    /**
     * @api
     *
     * @param array<mixed>|CampaignSubmitAppealParams $params
     *
     * @throws APIException
     */
    public function submitAppeal(
        string $campaignID,
        array|CampaignSubmitAppealParams $params,
        ?RequestOptions $requestOptions = null,
    ): CampaignSubmitAppealResponse;
}
