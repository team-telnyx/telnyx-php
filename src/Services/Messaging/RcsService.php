<?php

declare(strict_types=1);

namespace Telnyx\Services\Messaging;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Messaging\Rcs\RcGetCapabilitiesResponse;
use Telnyx\Messaging\Rcs\RcInviteTestNumberParams;
use Telnyx\Messaging\Rcs\RcInviteTestNumberResponse;
use Telnyx\Messaging\Rcs\RcListBulkCapabilitiesParams;
use Telnyx\Messaging\Rcs\RcListBulkCapabilitiesResponse;
use Telnyx\Messaging\Rcs\RcRetrieveCapabilitiesParams;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Messaging\RcsContract;
use Telnyx\Services\Messaging\Rcs\AgentsService;

final class RcsService implements RcsContract
{
    /**
     * @api
     */
    public AgentsService $agents;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->agents = new AgentsService($client);
    }

    /**
     * @api
     *
     * Adds a test phone number to an RCS agent for testing purposes.
     *
     * @param array{id: string}|RcInviteTestNumberParams $params
     *
     * @throws APIException
     */
    public function inviteTestNumber(
        string $phoneNumber,
        array|RcInviteTestNumberParams $params,
        ?RequestOptions $requestOptions = null,
    ): RcInviteTestNumberResponse {
        [$parsed, $options] = RcInviteTestNumberParams::parseRequest(
            $params,
            $requestOptions,
        );
        $id = $parsed['id'];
        unset($parsed['id']);

        // @phpstan-ignore-next-line;
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
     * List RCS capabilities of a given batch of phone numbers
     *
     * @param array{
     *   agent_id: string, phone_numbers: list<string>
     * }|RcListBulkCapabilitiesParams $params
     *
     * @throws APIException
     */
    public function listBulkCapabilities(
        array|RcListBulkCapabilitiesParams $params,
        ?RequestOptions $requestOptions = null,
    ): RcListBulkCapabilitiesResponse {
        [$parsed, $options] = RcListBulkCapabilitiesParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
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
     * List RCS capabilities of a phone number
     *
     * @param array{agent_id: string}|RcRetrieveCapabilitiesParams $params
     *
     * @throws APIException
     */
    public function retrieveCapabilities(
        string $phoneNumber,
        array|RcRetrieveCapabilitiesParams $params,
        ?RequestOptions $requestOptions = null,
    ): RcGetCapabilitiesResponse {
        [$parsed, $options] = RcRetrieveCapabilitiesParams::parseRequest(
            $params,
            $requestOptions,
        );
        $agentID = $parsed['agent_id'];
        unset($parsed['agent_id']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['messaging/rcs/capabilities/%1$s/%2$s', $agentID, $phoneNumber],
            options: $options,
            convert: RcGetCapabilitiesResponse::class,
        );
    }
}
