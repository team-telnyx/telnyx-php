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
use Telnyx\Core\Conversion\MapOf;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\CampaignContract;
use Telnyx\Services\Campaign\OsrService;
use Telnyx\Services\Campaign\UsecaseService;

final class CampaignService implements CampaignContract
{
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
     * @param array{
     *   autoRenewal?: bool,
     *   helpMessage?: string,
     *   messageFlow?: string,
     *   resellerId?: string,
     *   sample1?: string,
     *   sample2?: string,
     *   sample3?: string,
     *   sample4?: string,
     *   sample5?: string,
     *   webhookFailoverURL?: string,
     *   webhookURL?: string,
     * }|CampaignUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $campaignID,
        array|CampaignUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): TelnyxCampaignCsp {
        [$parsed, $options] = CampaignUpdateParams::parseRequest(
            $params,
            $requestOptions,
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
     * @param array{
     *   brandId: string, page?: int, recordsPerPage?: int, sort?: value-of<Sort>
     * }|CampaignListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|CampaignListParams $params,
        ?RequestOptions $requestOptions = null
    ): CampaignListResponse {
        [$parsed, $options] = CampaignListParams::parseRequest(
            $params,
            $requestOptions,
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
     * @return array<string,mixed>
     *
     * @throws APIException
     */
    public function acceptSharing(
        string $campaignID,
        ?RequestOptions $requestOptions = null
    ): array {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['campaign/acceptSharing/%1$s', $campaignID],
            options: $requestOptions,
            convert: new MapOf('mixed'),
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
     * @return array<string,mixed>
     *
     * @throws APIException
     */
    public function getOperationStatus(
        string $campaignID,
        ?RequestOptions $requestOptions = null
    ): array {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['campaign/%1$s/operationStatus', $campaignID],
            options: $requestOptions,
            convert: new MapOf('mixed'),
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
     * @param array{appeal_reason: string}|CampaignSubmitAppealParams $params
     *
     * @throws APIException
     */
    public function submitAppeal(
        string $campaignID,
        array|CampaignSubmitAppealParams $params,
        ?RequestOptions $requestOptions = null,
    ): CampaignSubmitAppealResponse {
        [$parsed, $options] = CampaignSubmitAppealParams::parseRequest(
            $params,
            $requestOptions,
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
