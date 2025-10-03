<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Campaign\CampaignDeactivateResponse;
use Telnyx\Campaign\CampaignGetMnoMetadataResponse;
use Telnyx\Campaign\CampaignGetSharingStatusResponse;
use Telnyx\Campaign\CampaignListParams;
use Telnyx\Campaign\CampaignListParams\Sort;
use Telnyx\Campaign\CampaignListResponse;
use Telnyx\Campaign\CampaignSubmitAppealParams;
use Telnyx\Campaign\CampaignSubmitAppealResponse;
use Telnyx\Campaign\CampaignUpdateParams;
use Telnyx\Campaign\TelnyxCampaignCsp;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\CampaignContract;
use Telnyx\Services\Campaign\OsrService;
use Telnyx\Services\Campaign\UsecaseService;

use const Telnyx\Core\OMIT as omit;

final class CampaignService implements CampaignContract
{
    /**
     * @@api
     */
    public UsecaseService $usecase;

    /**
     * @@api
     */
    public OsrService $osr;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->usecase = new UsecaseService($client);
        $this->osr = new OsrService($client);
    }

    /**
     * @api
     *
     * Retrieve campaign details by `campaignId`.
     *
     * @throws APIException
     */
    public function retrieve(
        string $campaignID,
        ?RequestOptions $requestOptions = null
    ): TelnyxCampaignCsp {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['campaign/%1$s', $campaignID],
            options: $requestOptions,
            convert: TelnyxCampaignCsp::class,
        );
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
    ): TelnyxCampaignCsp {
        $params = [
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
        ];

        return $this->updateRaw($campaignID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        string $campaignID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): TelnyxCampaignCsp {
        [$parsed, $options] = CampaignUpdateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'put',
            path: ['campaign/%1$s', $campaignID],
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
     * @param string $brandID
     * @param int $page The 1-indexed page number to get. The default value is `1`.
     * @param int $recordsPerPage The amount of records per page, limited to between 1 and 500 inclusive. The default value is `10`.
     * @param Sort|value-of<Sort> $sort Specifies the sort order for results. If not given, results are sorted by createdAt in descending order.
     *
     * @throws APIException
     */
    public function list(
        $brandID,
        $page = omit,
        $recordsPerPage = omit,
        $sort = omit,
        ?RequestOptions $requestOptions = null,
    ): CampaignListResponse {
        $params = [
            'brandID' => $brandID,
            'page' => $page,
            'recordsPerPage' => $recordsPerPage,
            'sort' => $sort,
        ];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): CampaignListResponse {
        [$parsed, $options] = CampaignListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'campaign',
            query: $parsed,
            options: $options,
            convert: CampaignListResponse::class,
        );
    }

    /**
     * @api
     *
     * Manually accept a campaign shared with Telnyx
     *
     * @throws APIException
     */
    public function acceptSharing(
        string $campaignID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['campaign/acceptSharing/%1$s', $campaignID],
            options: $requestOptions,
            convert: 'mixed',
        );
    }

    /**
     * @api
     *
     * Terminate a campaign. Note that once deactivated, a campaign cannot be restored.
     *
     * @throws APIException
     */
    public function deactivate(
        string $campaignID,
        ?RequestOptions $requestOptions = null
    ): CampaignDeactivateResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['campaign/%1$s', $campaignID],
            options: $requestOptions,
            convert: CampaignDeactivateResponse::class,
        );
    }

    /**
     * @api
     *
     * Get the campaign metadata for each MNO it was submitted to.
     *
     * @throws APIException
     */
    public function getMnoMetadata(
        string $campaignID,
        ?RequestOptions $requestOptions = null
    ): CampaignGetMnoMetadataResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['campaign/%1$s/mnoMetadata', $campaignID],
            options: $requestOptions,
            convert: CampaignGetMnoMetadataResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve campaign's operation status at MNO level.
     *
     * @throws APIException
     */
    public function getOperationStatus(
        string $campaignID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['campaign/%1$s/operationStatus', $campaignID],
            options: $requestOptions,
            convert: 'mixed',
        );
    }

    /**
     * @api
     *
     * Get Sharing Status
     *
     * @throws APIException
     */
    public function getSharingStatus(
        string $campaignID,
        ?RequestOptions $requestOptions = null
    ): CampaignGetSharingStatusResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['campaign/%1$s/sharing', $campaignID],
            options: $requestOptions,
            convert: CampaignGetSharingStatusResponse::class,
        );
    }

    /**
     * @api
     *
     * Submits an appeal for rejected native campaigns in TELNYX_FAILED or MNO_REJECTED status. The appeal is recorded for manual compliance team review and the campaign status is reset to TCR_ACCEPTED. Note: Appeal forwarding is handled manually to allow proper review before incurring upstream charges.
     *
     * @param string $appealReason detailed explanation of why the campaign should be reconsidered and what changes have been made to address the rejection reason
     *
     * @throws APIException
     */
    public function submitAppeal(
        string $campaignID,
        $appealReason,
        ?RequestOptions $requestOptions = null
    ): CampaignSubmitAppealResponse {
        $params = ['appealReason' => $appealReason];

        return $this->submitAppealRaw($campaignID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function submitAppealRaw(
        string $campaignID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): CampaignSubmitAppealResponse {
        [$parsed, $options] = CampaignSubmitAppealParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['campaign/%1$s/appeal', $campaignID],
            body: (object) $parsed,
            options: $options,
            convert: CampaignSubmitAppealResponse::class,
        );
    }
}
