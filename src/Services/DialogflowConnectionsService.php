<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DialogflowConnections\DialogflowConnectionCreateParams;
use Telnyx\DialogflowConnections\DialogflowConnectionCreateParams\DialogflowAPI;
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
     *   serviceAccount: array<string,mixed>,
     *   conversationProfileID?: string,
     *   dialogflowAPI?: 'cx'|'es'|DialogflowAPI,
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

        /** @var BaseResponse<DialogflowConnectionNewResponse> */
        $response = $this->client->request(
            method: 'post',
            path: ['dialogflow_connections/%1$s', $connectionID],
            body: (object) $parsed,
            options: $options,
            convert: DialogflowConnectionNewResponse::class,
        );

        return $response->parse();
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
        /** @var BaseResponse<DialogflowConnectionGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['dialogflow_connections/%1$s', $connectionID],
            options: $requestOptions,
            convert: DialogflowConnectionGetResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Updates a stored Dialogflow Connection.
     *
     * @param array{
     *   serviceAccount: array<string,mixed>,
     *   conversationProfileID?: string,
     *   dialogflowAPI?: 'cx'|'es'|DialogflowConnectionUpdateParams\DialogflowAPI,
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

        /** @var BaseResponse<DialogflowConnectionUpdateResponse> */
        $response = $this->client->request(
            method: 'put',
            path: ['dialogflow_connections/%1$s', $connectionID],
            body: (object) $parsed,
            options: $options,
            convert: DialogflowConnectionUpdateResponse::class,
        );

        return $response->parse();
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
        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'delete',
            path: ['dialogflow_connections/%1$s', $connectionID],
            options: $requestOptions,
            convert: null,
        );

        return $response->parse();
    }
}
