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
use Telnyx\ServiceContracts\DialogflowConnectionsRawContract;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class DialogflowConnectionsRawService implements DialogflowConnectionsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Save Dialogflow Credentiails to Telnyx, so it can be used with other Telnyx services.
     *
     * @param string $connectionID uniquely identifies a Telnyx application (Call Control)
     * @param array{
     *   serviceAccount: array<string,mixed>,
     *   conversationProfileID?: string,
     *   dialogflowAPI?: DialogflowAPI|value-of<DialogflowAPI>,
     *   environment?: string,
     *   location?: string,
     * }|DialogflowConnectionCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DialogflowConnectionNewResponse>
     *
     * @throws APIException
     */
    public function create(
        string $connectionID,
        array|DialogflowConnectionCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = DialogflowConnectionCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $connectionID uniquely identifies a Telnyx application (Call Control)
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DialogflowConnectionGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $connectionID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * @param string $connectionID uniquely identifies a Telnyx application (Call Control)
     * @param array{
     *   serviceAccount: array<string,mixed>,
     *   conversationProfileID?: string,
     *   dialogflowAPI?: DialogflowConnectionUpdateParams\DialogflowAPI|value-of<DialogflowConnectionUpdateParams\DialogflowAPI>,
     *   environment?: string,
     *   location?: string,
     * }|DialogflowConnectionUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DialogflowConnectionUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $connectionID,
        array|DialogflowConnectionUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = DialogflowConnectionUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $connectionID uniquely identifies a Telnyx application (Call Control)
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $connectionID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['dialogflow_connections/%1$s', $connectionID],
            options: $requestOptions,
            convert: null,
        );
    }
}
