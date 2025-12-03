<?php

declare(strict_types=1);

namespace Telnyx\Services\AI;

use Telnyx\AI\Integrations\IntegrationGetResponse;
use Telnyx\AI\Integrations\IntegrationListResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\IntegrationsContract;
use Telnyx\Services\AI\Integrations\ConnectionsService;

final class IntegrationsService implements IntegrationsContract
{
    /**
     * @api
     */
    public ConnectionsService $connections;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->connections = new ConnectionsService($client);
    }

    /**
     * @api
     *
     * Retrieve integration details
     *
     * @throws APIException
     */
    public function retrieve(
        string $integrationID,
        ?RequestOptions $requestOptions = null
    ): IntegrationGetResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['ai/integrations/%1$s', $integrationID],
            options: $requestOptions,
            convert: IntegrationGetResponse::class,
        );
    }

    /**
     * @api
     *
     * List all available integrations.
     *
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): IntegrationListResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'ai/integrations',
            options: $requestOptions,
            convert: IntegrationListResponse::class,
        );
    }
}
