<?php

declare(strict_types=1);

namespace Telnyx\Services\Messaging;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\Messaging\Rcs\RcGetCapabilitiesResponse;
use Telnyx\Messaging\Rcs\RcInviteTestNumberResponse;
use Telnyx\Messaging\Rcs\RcListBulkCapabilitiesResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Messaging\RcsContract;
use Telnyx\Services\Messaging\Rcs\AgentsService;

/**
 * Send RCS messages.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class RcsService implements RcsContract
{
    /**
     * @api
     */
    public RcsRawService $raw;

    /**
     * @api
     */
    public AgentsService $agents;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new RcsRawService($client);
        $this->agents = new AgentsService($client);
    }

    /**
     * @api
     *
     * Adds a test phone number to an RCS agent for testing purposes.
     *
     * @param string $phoneNumber Phone number in E164 format to invite for testing
     * @param string $id RCS agent ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function inviteTestNumber(
        string $phoneNumber,
        string $id,
        RequestOptions|array|null $requestOptions = null,
    ): RcInviteTestNumberResponse {
        $params = Util::removeNulls(['id' => $id]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->inviteTestNumber($phoneNumber, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Check RCS capabilities (batch)
     *
     * @param string $agentID RCS Agent ID
     * @param list<string> $phoneNumbers List of phone numbers to check
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listBulkCapabilities(
        string $agentID,
        array $phoneNumbers,
        RequestOptions|array|null $requestOptions = null,
    ): RcListBulkCapabilitiesResponse {
        $params = Util::removeNulls(
            ['agentID' => $agentID, 'phoneNumbers' => $phoneNumbers]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listBulkCapabilities(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Check RCS capabilities
     *
     * @param string $phoneNumber Phone number in E164 format
     * @param string $agentID RCS agent ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveCapabilities(
        string $phoneNumber,
        string $agentID,
        RequestOptions|array|null $requestOptions = null,
    ): RcGetCapabilitiesResponse {
        $params = Util::removeNulls(['agentID' => $agentID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveCapabilities($phoneNumber, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
