<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DialogflowConnections\DialogflowConnectionCreateParams\DialogflowAPI;
use Telnyx\DialogflowConnections\DialogflowConnectionGetResponse;
use Telnyx\DialogflowConnections\DialogflowConnectionNewResponse;
use Telnyx\DialogflowConnections\DialogflowConnectionUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\DialogflowConnectionsContract;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class DialogflowConnectionsService implements DialogflowConnectionsContract
{
    /**
     * @api
     */
    public DialogflowConnectionsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new DialogflowConnectionsRawService($client);
    }

    /**
     * @api
     *
     * Save Dialogflow Credentiails to Telnyx, so it can be used with other Telnyx services.
     *
     * @param string $connectionID uniquely identifies a Telnyx application (Call Control)
     * @param array<string,mixed> $serviceAccount the JSON map to connect your Dialoglow account
     * @param string $conversationProfileID The id of a configured conversation profile on your Dialogflow account. (If you use Dialogflow CX, this param is required)
     * @param DialogflowAPI|value-of<DialogflowAPI> $dialogflowAPI determine which Dialogflow will be used
     * @param string $environment which Dialogflow environment will be used
     * @param string $location The region of your agent is. (If you use Dialogflow CX, this param is required)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $connectionID,
        array $serviceAccount,
        ?string $conversationProfileID = null,
        DialogflowAPI|string $dialogflowAPI = 'es',
        ?string $environment = null,
        ?string $location = null,
        RequestOptions|array|null $requestOptions = null,
    ): DialogflowConnectionNewResponse {
        $params = Util::removeNulls(
            [
                'serviceAccount' => $serviceAccount,
                'conversationProfileID' => $conversationProfileID,
                'dialogflowAPI' => $dialogflowAPI,
                'environment' => $environment,
                'location' => $location,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($connectionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Return details of the Dialogflow connection associated with the given CallControl connection.
     *
     * @param string $connectionID uniquely identifies a Telnyx application (Call Control)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $connectionID,
        RequestOptions|array|null $requestOptions = null
    ): DialogflowConnectionGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($connectionID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Updates a stored Dialogflow Connection.
     *
     * @param string $connectionID uniquely identifies a Telnyx application (Call Control)
     * @param array<string,mixed> $serviceAccount the JSON map to connect your Dialoglow account
     * @param string $conversationProfileID The id of a configured conversation profile on your Dialogflow account. (If you use Dialogflow CX, this param is required)
     * @param \Telnyx\DialogflowConnections\DialogflowConnectionUpdateParams\DialogflowAPI|value-of<\Telnyx\DialogflowConnections\DialogflowConnectionUpdateParams\DialogflowAPI> $dialogflowAPI determine which Dialogflow will be used
     * @param string $environment which Dialogflow environment will be used
     * @param string $location The region of your agent is. (If you use Dialogflow CX, this param is required)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $connectionID,
        array $serviceAccount,
        ?string $conversationProfileID = null,
        \Telnyx\DialogflowConnections\DialogflowConnectionUpdateParams\DialogflowAPI|string $dialogflowAPI = 'es',
        ?string $environment = null,
        ?string $location = null,
        RequestOptions|array|null $requestOptions = null,
    ): DialogflowConnectionUpdateResponse {
        $params = Util::removeNulls(
            [
                'serviceAccount' => $serviceAccount,
                'conversationProfileID' => $conversationProfileID,
                'dialogflowAPI' => $dialogflowAPI,
                'environment' => $environment,
                'location' => $location,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($connectionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Deletes a stored Dialogflow Connection.
     *
     * @param string $connectionID uniquely identifies a Telnyx application (Call Control)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $connectionID,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($connectionID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
