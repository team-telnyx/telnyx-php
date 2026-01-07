<?php

declare(strict_types=1);

namespace Telnyx\Services\Messaging10dlc;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\Messaging10dlc\Campaign\CampaignDeactivateResponse;
use Telnyx\Messaging10dlc\Campaign\CampaignGetMnoMetadataResponse;
use Telnyx\Messaging10dlc\Campaign\CampaignGetSharingStatusResponse;
use Telnyx\Messaging10dlc\Campaign\CampaignListParams\Sort;
use Telnyx\Messaging10dlc\Campaign\CampaignListResponse;
use Telnyx\Messaging10dlc\Campaign\CampaignSubmitAppealResponse;
use Telnyx\Messaging10dlc\Campaign\TelnyxCampaignCsp;
use Telnyx\PerPagePaginationV2;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Messaging10dlc\CampaignContract;
use Telnyx\Services\Messaging10dlc\Campaign\OsrService;
use Telnyx\Services\Messaging10dlc\Campaign\UsecaseService;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class CampaignService implements CampaignContract
{
    /**
     * @api
     */
    public CampaignRawService $raw;

    /**
     * @api
     */
    public UsecaseService $usecase;

    /**
     * @api
     */
    public OsrService $osr;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new CampaignRawService($client);
        $this->usecase = new UsecaseService($client);
        $this->osr = new OsrService($client);
    }

    /**
     * @api
     *
     * Retrieve campaign details by `campaignId`.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $campaignID,
        RequestOptions|array|null $requestOptions = null
    ): TelnyxCampaignCsp {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($campaignID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update a campaign's properties by `campaignId`. **Please note:** only sample messages are editable.
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
     * @param RequestOpts|null $requestOptions
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
        RequestOptions|array|null $requestOptions = null,
    ): TelnyxCampaignCsp {
        $params = Util::removeNulls(
            [
                'autoRenewal' => $autoRenewal,
                'helpMessage' => $helpMessage,
                'messageFlow' => $messageFlow,
                'resellerID' => $resellerID,
                'sample1' => $sample1,
                'sample2' => $sample2,
                'sample3' => $sample3,
                'sample4' => $sample4,
                'sample5' => $sample5,
                'webhookFailoverURL' => $webhookFailoverURL,
                'webhookURL' => $webhookURL,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($campaignID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a list of campaigns associated with a supplied `brandId`.
     *
     * @param int $page The 1-indexed page number to get. The default value is `1`.
     * @param int $recordsPerPage The amount of records per page, limited to between 1 and 500 inclusive. The default value is `10`.
     * @param Sort|value-of<Sort> $sort Specifies the sort order for results. If not given, results are sorted by createdAt in descending order.
     * @param RequestOpts|null $requestOptions
     *
     * @return PerPagePaginationV2<CampaignListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $brandID,
        int $page = 1,
        int $recordsPerPage = 10,
        Sort|string $sort = '-createdAt',
        RequestOptions|array|null $requestOptions = null,
    ): PerPagePaginationV2 {
        $params = Util::removeNulls(
            [
                'brandID' => $brandID,
                'page' => $page,
                'recordsPerPage' => $recordsPerPage,
                'sort' => $sort,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Manually accept a campaign shared with Telnyx
     *
     * @param string $campaignID TCR's ID for the campaign to import
     * @param RequestOpts|null $requestOptions
     *
     * @return array<string,mixed>
     *
     * @throws APIException
     */
    public function acceptSharing(
        string $campaignID,
        RequestOptions|array|null $requestOptions = null
    ): array {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->acceptSharing($campaignID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Terminate a campaign. Note that once deactivated, a campaign cannot be restored.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deactivate(
        string $campaignID,
        RequestOptions|array|null $requestOptions = null
    ): CampaignDeactivateResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->deactivate($campaignID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get the campaign metadata for each MNO it was submitted to.
     *
     * @param string $campaignID ID of the campaign in question
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getMnoMetadata(
        string $campaignID,
        RequestOptions|array|null $requestOptions = null
    ): CampaignGetMnoMetadataResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getMnoMetadata($campaignID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve campaign's operation status at MNO level.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return array<string,mixed>
     *
     * @throws APIException
     */
    public function getOperationStatus(
        string $campaignID,
        RequestOptions|array|null $requestOptions = null
    ): array {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getOperationStatus($campaignID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get Sharing Status
     *
     * @param string $campaignID ID of the campaign in question
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getSharingStatus(
        string $campaignID,
        RequestOptions|array|null $requestOptions = null
    ): CampaignGetSharingStatusResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getSharingStatus($campaignID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Submits an appeal for rejected native campaigns in TELNYX_FAILED or MNO_REJECTED status. The appeal is recorded for manual compliance team review and the campaign status is reset to TCR_ACCEPTED. Note: Appeal forwarding is handled manually to allow proper review before incurring upstream charges.
     *
     * @param string $campaignID The Telnyx campaign identifier
     * @param string $appealReason detailed explanation of why the campaign should be reconsidered and what changes have been made to address the rejection reason
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function submitAppeal(
        string $campaignID,
        string $appealReason,
        RequestOptions|array|null $requestOptions = null,
    ): CampaignSubmitAppealResponse {
        $params = Util::removeNulls(['appealReason' => $appealReason]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->submitAppeal($campaignID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
