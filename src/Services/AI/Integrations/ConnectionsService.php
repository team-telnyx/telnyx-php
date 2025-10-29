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
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get user setup integrations
     *
     * @throws APIException
     */
    public function retrieve(
        string $userConnectionID,
        ?RequestOptions $requestOptions = null
    ): ConnectionGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['ai/integrations/connections/%1$s', $userConnectionID],
            options: $requestOptions,
            convert: ConnectionGetResponse::class,
        );
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
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'ai/integrations/connections',
            options: $requestOptions,
            convert: ConnectionListResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete a specific integration connection.
     *
     * @throws APIException
     */
    public function delete(
        string $userConnectionID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['ai/integrations/connections/%1$s', $userConnectionID],
            options: $requestOptions,
            convert: null,
        );
    }
}
