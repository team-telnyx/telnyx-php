<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\DialogflowConnections\DialogflowConnectionCreateParams\DialogflowAPI;
use Telnyx\DialogflowConnections\DialogflowConnectionGetResponse;
use Telnyx\DialogflowConnections\DialogflowConnectionNewResponse;
use Telnyx\DialogflowConnections\DialogflowConnectionUpdateParams\DialogflowAPI as DialogflowAPI1;
use Telnyx\DialogflowConnections\DialogflowConnectionUpdateResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface DialogflowConnectionsContract
{
    /**
     * @api
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
    ): DialogflowConnectionNewResponse;

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
        ?RequestOptions $requestOptions = null,
    ): DialogflowConnectionNewResponse;

    /**
     * @api
     *
     * @return DialogflowConnectionGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $connectionID,
        ?RequestOptions $requestOptions = null
    ): DialogflowConnectionGetResponse;

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
        ?RequestOptions $requestOptions = null,
    ): DialogflowConnectionGetResponse;

    /**
     * @api
     *
     * @param array<string,
     * mixed,> $serviceAccount The JSON map to connect your Dialoglow account
     * @param string $conversationProfileID The id of a configured conversation profile on your Dialogflow account. (If you use Dialogflow CX, this param is required)
     * @param DialogflowAPI1|value-of<DialogflowAPI1> $dialogflowAPI determine which Dialogflow will be used
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
    ): DialogflowConnectionUpdateResponse;

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
        ?RequestOptions $requestOptions = null,
    ): DialogflowConnectionUpdateResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $connectionID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $connectionID,
        mixed $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;
}
