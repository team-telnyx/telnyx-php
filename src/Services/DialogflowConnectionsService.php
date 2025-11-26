<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DialogflowConnections\DialogflowConnectionCreateParams;
use Telnyx\DialogflowConnections\DialogflowConnectionGetResponse;
use Telnyx\DialogflowConnections\DialogflowConnectionNewResponse;
use Telnyx\DialogflowConnections\DialogflowConnectionUpdateParams;
use Telnyx\DialogflowConnections\DialogflowConnectionUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\DialogflowConnectionsContract;

final class DialogflowConnectionsService implements DialogflowConnectionsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Save Dialogflow Credentiails to Telnyx, so it can be used with other Telnyx services.
     *
     * @param array{
     *   service_account: array<string,mixed>,
     *   conversation_profile_id?: string,
     *   dialogflow_api?: 'cx'|'es',
     *   environment?: string,
     *   location?: string,
     * }|DialogflowConnectionCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        string $connectionID,
        array|DialogflowConnectionCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): DialogflowConnectionNewResponse {
        [$parsed, $options] = DialogflowConnectionCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['dialogflow_connections/%1$s', $connectionID],
            body: (object) $parsed,
            options: $options,
            convert: DialogflowConnectionNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Return details of the Dialogflow connection associated with the given CallControl connection.
     *
     * @throws APIException
     */
    public function retrieve(
        string $connectionID,
        ?RequestOptions $requestOptions = null
    ): DialogflowConnectionGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['dialogflow_connections/%1$s', $connectionID],
            options: $requestOptions,
            convert: DialogflowConnectionGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Updates a stored Dialogflow Connection.
     *
     * @param array{
     *   service_account: array<string,mixed>,
     *   conversation_profile_id?: string,
     *   dialogflow_api?: 'cx'|'es',
     *   environment?: string,
     *   location?: string,
     * }|DialogflowConnectionUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $connectionID,
        array|DialogflowConnectionUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): DialogflowConnectionUpdateResponse {
        [$parsed, $options] = DialogflowConnectionUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'put',
            path: ['dialogflow_connections/%1$s', $connectionID],
            body: (object) $parsed,
            options: $options,
            convert: DialogflowConnectionUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * Deletes a stored Dialogflow Connection.
     *
     * @throws APIException
     */
    public function delete(
        string $connectionID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['dialogflow_connections/%1$s', $connectionID],
            options: $requestOptions,
            convert: null,
        );
    }
}
