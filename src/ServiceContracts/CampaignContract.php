<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Campaign\CampaignDeactivateResponse;
use Telnyx\Campaign\CampaignGetMnoMetadataResponse;
use Telnyx\Campaign\CampaignGetSharingStatusResponse;
use Telnyx\Campaign\CampaignListParams\Sort;
use Telnyx\Campaign\CampaignListResponse;
use Telnyx\Campaign\CampaignSubmitAppealResponse;
use Telnyx\Campaign\TelnyxCampaignCsp;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface CampaignContract
{
    /**
     * @api
     *
     * @return TelnyxCampaignCsp<HasRawResponse>
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
     * @return TelnyxCampaignCsp<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $campaignID,
        mixed $params,
        ?RequestOptions $requestOptions = null,
    ): TelnyxCampaignCsp;

    /**
     * @api
     *
     * @param bool $autoRenewal help message of the campaign
     * @param string $helpMessage help message of the campaign
     * @param string $messageFlow message flow description
     * @param string $resellerID alphanumeric identifier of the reseller that you want to associate with this campaign
     * @param string $sample1 Message sample. Some campaign tiers require 1 or more message samples.
     * @param string $sample2 Message sample. Some campaign tiers require 2 or more message samples.
     * @param string $sample3 Message sample. Some campaign tiers require 3 or more message samples.
     * @param string $sample4 Message sample. Some campaign tiers require 4 or more message samples.
     * @param string $sample5 Message sample. Some campaign tiers require 5 or more message samples.
     * @param string $webhookFailoverURL webhook failover to which campaign status updates are sent
     * @param string $webhookURL webhook to which campaign status updates are sent
     *
     * @return TelnyxCampaignCsp<HasRawResponse>
     *
     * @throws APIException
     */
    public function update(
        string $campaignID,
        $autoRenewal = omit,
        $helpMessage = omit,
        $messageFlow = omit,
        $resellerID = omit,
        $sample1 = omit,
        $sample2 = omit,
        $sample3 = omit,
        $sample4 = omit,
        $sample5 = omit,
        $webhookFailoverURL = omit,
        $webhookURL = omit,
        ?RequestOptions $requestOptions = null,
    ): TelnyxCampaignCsp;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return TelnyxCampaignCsp<HasRawResponse>
     *
     * @throws APIException
     */
    public function updateRaw(
        string $campaignID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): TelnyxCampaignCsp;

    /**
     * @api
     *
     * @param string $brandID
     * @param int $page The 1-indexed page number to get. The default value is `1`.
     * @param int $recordsPerPage The amount of records per page, limited to between 1 and 500 inclusive. The default value is `10`.
     * @param Sort|value-of<Sort> $sort Specifies the sort order for results. If not given, results are sorted by createdAt in descending order.
     *
     * @return CampaignListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        $brandID,
        $page = omit,
        $recordsPerPage = omit,
        $sort = omit,
        ?RequestOptions $requestOptions = null,
    ): CampaignListResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return CampaignListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): CampaignListResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function acceptSharing(
        string $campaignID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function acceptSharingRaw(
        string $campaignID,
        mixed $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @return CampaignDeactivateResponse<HasRawResponse>
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
     * @return CampaignDeactivateResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function deactivateRaw(
        string $campaignID,
        mixed $params,
        ?RequestOptions $requestOptions = null,
    ): CampaignDeactivateResponse;

    /**
     * @api
     *
     * @return CampaignGetMnoMetadataResponse<HasRawResponse>
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
     * @return CampaignGetMnoMetadataResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function getMnoMetadataRaw(
        string $campaignID,
        mixed $params,
        ?RequestOptions $requestOptions = null,
    ): CampaignGetMnoMetadataResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function getOperationStatus(
        string $campaignID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function getOperationStatusRaw(
        string $campaignID,
        mixed $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @return CampaignGetSharingStatusResponse<HasRawResponse>
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
     * @return CampaignGetSharingStatusResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function getSharingStatusRaw(
        string $campaignID,
        mixed $params,
        ?RequestOptions $requestOptions = null,
    ): CampaignGetSharingStatusResponse;

    /**
     * @api
     *
     * @param string $appealReason detailed explanation of why the campaign should be reconsidered and what changes have been made to address the rejection reason
     *
     * @return CampaignSubmitAppealResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function submitAppeal(
        string $campaignID,
        $appealReason,
        ?RequestOptions $requestOptions = null,
    ): CampaignSubmitAppealResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return CampaignSubmitAppealResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function submitAppealRaw(
        string $campaignID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): CampaignSubmitAppealResponse;
}
