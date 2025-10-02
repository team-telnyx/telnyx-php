<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\DialogflowConnections\DialogflowConnectionCreateParams;
use Telnyx\DialogflowConnections\DialogflowConnectionCreateParams\DialogflowAPI;
use Telnyx\DialogflowConnections\DialogflowConnectionGetResponse;
use Telnyx\DialogflowConnections\DialogflowConnectionNewResponse;
use Telnyx\DialogflowConnections\DialogflowConnectionUpdateParams;
use Telnyx\DialogflowConnections\DialogflowConnectionUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\DialogflowConnectionsContract;

use const Telnyx\Core\OMIT as omit;

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
     * @param array<string,
     * mixed,> $serviceAccount The JSON map to connect your Dialoglow account
     * @param string $conversationProfileID The id of a configured conversation profile on your Dialogflow account. (If you use Dialogflow CX, this param is required)
     * @param DialogflowAPI|value-of<DialogflowAPI> $dialogflowAPI determine which Dialogflow will be used
     * @param string $environment which Dialogflow environment will be used
     * @param string $location The region of your agent is. (If you use Dialogflow CX, this param is required)
     *
     * @return DialogflowConnectionNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function create(
        string $connectionID,
        $serviceAccount,
        $conversationProfileID = omit,
        $dialogflowAPI = omit,
        $environment = omit,
        $location = omit,
        ?RequestOptions $requestOptions = null,
    ): DialogflowConnectionNewResponse {
        $params = [
            'serviceAccount' => $serviceAccount,
            'conversationProfileID' => $conversationProfileID,
            'dialogflowAPI' => $dialogflowAPI,
            'environment' => $environment,
            'location' => $location,
        ];

        return $this->createRaw($connectionID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return DialogflowConnectionNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function createRaw(
        string $connectionID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): DialogflowConnectionNewResponse {
        [$parsed, $options] = DialogflowConnectionCreateParams::parseRequest(
            $params,
            $requestOptions
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
     * @return DialogflowConnectionGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $connectionID,
        ?RequestOptions $requestOptions = null
    ): DialogflowConnectionGetResponse {
        $params = [];

        return $this->retrieveRaw($connectionID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @return DialogflowConnectionGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $connectionID,
        mixed $params,
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
     * @param array<string,
     * mixed,> $serviceAccount The JSON map to connect your Dialoglow account
     * @param string $conversationProfileID The id of a configured conversation profile on your Dialogflow account. (If you use Dialogflow CX, this param is required)
     * @param Telnyx\DialogflowConnections\DialogflowConnectionUpdateParams\DialogflowAPI|value-of<Telnyx\DialogflowConnections\DialogflowConnectionUpdateParams\DialogflowAPI> $dialogflowAPI determine which Dialogflow will be used
     * @param string $environment which Dialogflow environment will be used
     * @param string $location The region of your agent is. (If you use Dialogflow CX, this param is required)
     *
     * @return DialogflowConnectionUpdateResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function update(
        string $connectionID,
        $serviceAccount,
        $conversationProfileID = omit,
        $dialogflowAPI = omit,
        $environment = omit,
        $location = omit,
        ?RequestOptions $requestOptions = null,
    ): DialogflowConnectionUpdateResponse {
        $params = [
            'serviceAccount' => $serviceAccount,
            'conversationProfileID' => $conversationProfileID,
            'dialogflowAPI' => $dialogflowAPI,
            'environment' => $environment,
            'location' => $location,
        ];

        return $this->updateRaw($connectionID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return DialogflowConnectionUpdateResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function updateRaw(
        string $connectionID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): DialogflowConnectionUpdateResponse {
        [$parsed, $options] = DialogflowConnectionUpdateParams::parseRequest(
            $params,
            $requestOptions
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
        $params = [];

        return $this->deleteRaw($connectionID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $connectionID,
        mixed $params,
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
