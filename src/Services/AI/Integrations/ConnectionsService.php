<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Integrations;

use Telnyx\AI\Integrations\Connections\ConnectionGetResponse;
use Telnyx\AI\Integrations\Connections\ConnectionListResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Integrations\ConnectionsContract;

final class ConnectionsService implements ConnectionsContract
{
    /**
     * @api
     */
    public ConnectionsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ConnectionsRawService($client);
    }

    /**
     * @api
     *
     * Get user setup integrations
     *
     * @param string $userConnectionID The connection id
     *
     * @throws APIException
     */
    public function retrieve(
        string $userConnectionID,
        ?RequestOptions $requestOptions = null
    ): ConnectionGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($userConnectionID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List user setup integrations
     *
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): ConnectionListResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a specific integration connection.
     *
     * @param string $userConnectionID The user integration connection identifier
     *
     * @throws APIException
     */
    public function delete(
        string $userConnectionID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($userConnectionID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
