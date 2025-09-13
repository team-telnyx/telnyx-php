<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

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
     * @return DialogflowConnectionGetResponse<HasRawResponse>
     */
    public function retrieve(
        string $connectionID,
        ?RequestOptions $requestOptions = null
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
     */
    public function delete(
        string $connectionID,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
