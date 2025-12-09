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
     * @throws APIException
     */
    public function update(
        string $campaignID,
        bool $autoRenewal = true,
        ?string $helpMessage = null,
        ?string $messageFlow = null,
        ?string $resellerID = null,
        ?string $sample1 = null,
        ?string $sample2 = null,
        ?string $sample3 = null,
        ?string $sample4 = null,
        ?string $sample5 = null,
        ?string $webhookFailoverURL = null,
        ?string $webhookURL = null,
        ?RequestOptions $requestOptions = null,
    ): TelnyxCampaignCsp;

    /**
     * @api
     *
     * @param int $page The 1-indexed page number to get. The default value is `1`.
     * @param int $recordsPerPage The amount of records per page, limited to between 1 and 500 inclusive. The default value is `10`.
     * @param 'assignedPhoneNumbersCount'|'-assignedPhoneNumbersCount'|'campaignId'|'-campaignId'|'createdAt'|'-createdAt'|'status'|'-status'|'tcrCampaignId'|'-tcrCampaignId'|Sort $sort Specifies the sort order for results. If not given, results are sorted by createdAt in descending order.
     *
     * @throws APIException
     */
    public function list(
        string $brandID,
        int $page = 1,
        int $recordsPerPage = 10,
        string|Sort $sort = '-createdAt',
        ?RequestOptions $requestOptions = null,
    ): CampaignListResponse;

    /**
     * @api
     *
     * @param string $campaignID TCR's ID for the campaign to import
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
     * @param string $campaignID ID of the campaign in question
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
     * @param string $campaignID ID of the campaign in question
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
     * @param string $campaignID The Telnyx campaign identifier
     * @param string $appealReason detailed explanation of why the campaign should be reconsidered and what changes have been made to address the rejection reason
     *
     * @throws APIException
     */
    public function submitAppeal(
        string $campaignID,
        string $appealReason,
        ?RequestOptions $requestOptions = null,
    ): CampaignSubmitAppealResponse;
}
