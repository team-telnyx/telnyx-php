<?php

declare(strict_types=1);

namespace Telnyx\Services\Messaging;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Messaging\Rcs\RcGetCapabilitiesResponse;
use Telnyx\Messaging\Rcs\RcInviteTestNumberParams;
use Telnyx\Messaging\Rcs\RcInviteTestNumberResponse;
use Telnyx\Messaging\Rcs\RcListBulkCapabilitiesParams;
use Telnyx\Messaging\Rcs\RcListBulkCapabilitiesResponse;
use Telnyx\Messaging\Rcs\RcRetrieveCapabilitiesParams;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Messaging\RcsRawContract;

/**
 * Send RCS messages.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class RcsRawService implements RcsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Adds a test phone number to an RCS agent for testing purposes.
     *
     * @param string $phoneNumber Phone number in E164 format to invite for testing
     * @param array{id: string}|RcInviteTestNumberParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RcInviteTestNumberResponse>
     *
     * @throws APIException
     */
    public function inviteTestNumber(
        string $phoneNumber,
        array|RcInviteTestNumberParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RcInviteTestNumberParams::parseRequest(
            $params,
            $requestOptions,
        );
        $id = $parsed['id'];
        unset($parsed['id']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['messaging/rcs/test_number_invite/%1$s/%2$s', $id, $phoneNumber],
            options: $options,
            convert: RcInviteTestNumberResponse::class,
        );
    }

    /**
     * @api
     *
     * Check RCS capabilities (batch)
     *
     * @param array{
     *   agentID: string, phoneNumbers: list<string>
     * }|RcListBulkCapabilitiesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RcListBulkCapabilitiesResponse>
     *
     * @throws APIException
     */
    public function listBulkCapabilities(
        array|RcListBulkCapabilitiesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RcListBulkCapabilitiesParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'messaging/rcs/bulk_capabilities',
            body: (object) $parsed,
            options: $options,
            convert: RcListBulkCapabilitiesResponse::class,
        );
    }

    /**
     * @api
     *
     * Check RCS capabilities
     *
     * @param string $phoneNumber Phone number in E164 format
     * @param array{agentID: string}|RcRetrieveCapabilitiesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RcGetCapabilitiesResponse>
     *
     * @throws APIException
     */
    public function retrieveCapabilities(
        string $phoneNumber,
        array|RcRetrieveCapabilitiesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RcRetrieveCapabilitiesParams::parseRequest(
            $params,
            $requestOptions,
        );
        $agentID = $parsed['agentID'];
        unset($parsed['agentID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['messaging/rcs/capabilities/%1$s/%2$s', $agentID, $phoneNumber],
            options: $options,
            convert: RcGetCapabilitiesResponse::class,
        );
    }
}
