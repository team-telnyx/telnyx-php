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
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface CampaignContract
{
    /**
     * @api
     *
     * @return TelnyxCampaignCsp<HasRawResponse>
     */
    public function retrieve(
        string $campaignID,
        ?RequestOptions $requestOptions = null
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
     * @param string $brandID
     * @param int $page The 1-indexed page number to get. The default value is `1`.
     * @param int $recordsPerPage The amount of records per page, limited to between 1 and 500 inclusive. The default value is `10`.
     * @param Sort|value-of<Sort> $sort Specifies the sort order for results. If not given, results are sorted by createdAt in descending order.
     *
     * @return CampaignListResponse<HasRawResponse>
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
     */
    public function acceptSharing(
        string $campaignID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @return CampaignDeactivateResponse<HasRawResponse>
     */
    public function deactivate(
        string $campaignID,
        ?RequestOptions $requestOptions = null
    ): CampaignDeactivateResponse;

    /**
     * @api
     *
     * @return CampaignGetMnoMetadataResponse<HasRawResponse>
     */
    public function getMnoMetadata(
        string $campaignID,
        ?RequestOptions $requestOptions = null
    ): CampaignGetMnoMetadataResponse;

    /**
     * @api
     */
    public function getOperationStatus(
        string $campaignID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @return CampaignGetSharingStatusResponse<HasRawResponse>
     */
    public function getSharingStatus(
        string $campaignID,
        ?RequestOptions $requestOptions = null
    ): CampaignGetSharingStatusResponse;

    /**
     * @api
     *
     * @param string $appealReason detailed explanation of why the campaign should be reconsidered and what changes have been made to address the rejection reason
     *
     * @return CampaignSubmitAppealResponse<HasRawResponse>
     */
    public function submitAppeal(
        string $campaignID,
        $appealReason,
        ?RequestOptions $requestOptions = null,
    ): CampaignSubmitAppealResponse;
}
