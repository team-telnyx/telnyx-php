<?php

declare(strict_types=1);

namespace Telnyx\Services\Messaging;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Messaging\Rcs\RcGetCapabilitiesResponse;
use Telnyx\Messaging\Rcs\RcInviteTestNumberResponse;
use Telnyx\Messaging\Rcs\RcListBulkCapabilitiesResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Messaging\RcsContract;
use Telnyx\Services\Messaging\Rcs\AgentsService;

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
     *
     * @throws APIException
     */
    public function inviteTestNumber(
        string $phoneNumber,
        string $id,
        ?RequestOptions $requestOptions = null
    ): RcInviteTestNumberResponse {
        $params = ['id' => $id];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->inviteTestNumber($phoneNumber, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List RCS capabilities of a given batch of phone numbers
     *
     * @param string $agentID RCS Agent ID
     * @param list<string> $phoneNumbers List of phone numbers to check
     *
     * @throws APIException
     */
    public function listBulkCapabilities(
        string $agentID,
        array $phoneNumbers,
        ?RequestOptions $requestOptions = null
    ): RcListBulkCapabilitiesResponse {
        $params = ['agentID' => $agentID, 'phoneNumbers' => $phoneNumbers];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listBulkCapabilities(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List RCS capabilities of a phone number
     *
     * @param string $phoneNumber Phone number in E164 format
     * @param string $agentID RCS agent ID
     *
     * @throws APIException
     */
    public function retrieveCapabilities(
        string $phoneNumber,
        string $agentID,
        ?RequestOptions $requestOptions = null
    ): RcGetCapabilitiesResponse {
        $params = ['agentID' => $agentID];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveCapabilities($phoneNumber, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
