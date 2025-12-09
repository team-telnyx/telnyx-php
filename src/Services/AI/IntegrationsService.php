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
    public IntegrationsRawService $raw;

    /**
     * @api
     */
    public ConnectionsService $connections;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new IntegrationsRawService($client);
        $this->connections = new ConnectionsService($client);
    }

    /**
     * @api
     *
     * Retrieve integration details
     *
     * @param string $integrationID The integration id
     *
     * @throws APIException
     */
    public function retrieve(
        string $integrationID,
        ?RequestOptions $requestOptions = null
    ): IntegrationGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($integrationID, requestOptions: $requestOptions);

        return $response->parse();
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
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(requestOptions: $requestOptions);

        return $response->parse();
    }
}
