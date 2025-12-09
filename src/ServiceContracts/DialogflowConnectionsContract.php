<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DialogflowConnections\DialogflowConnectionCreateParams\DialogflowAPI;
use Telnyx\DialogflowConnections\DialogflowConnectionGetResponse;
use Telnyx\DialogflowConnections\DialogflowConnectionNewResponse;
use Telnyx\DialogflowConnections\DialogflowConnectionUpdateResponse;
use Telnyx\RequestOptions;

interface DialogflowConnectionsContract
{
    /**
     * @api
     *
     * @param string $connectionID uniquely identifies a Telnyx application (Call Control)
     * @param array<string,mixed> $serviceAccount the JSON map to connect your Dialoglow account
     * @param string $conversationProfileID The id of a configured conversation profile on your Dialogflow account. (If you use Dialogflow CX, this param is required)
     * @param 'cx'|'es'|DialogflowAPI $dialogflowAPI determine which Dialogflow will be used
     * @param string $environment which Dialogflow environment will be used
     * @param string $location The region of your agent is. (If you use Dialogflow CX, this param is required)
     *
     * @throws APIException
     */
    public function create(
        string $connectionID,
        array $serviceAccount,
        ?string $conversationProfileID = null,
        string|DialogflowAPI $dialogflowAPI = 'es',
        ?string $environment = null,
        ?string $location = null,
        ?RequestOptions $requestOptions = null,
    ): DialogflowConnectionNewResponse;

    /**
     * @api
     *
     * @param string $connectionID uniquely identifies a Telnyx application (Call Control)
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
     * @param string $connectionID uniquely identifies a Telnyx application (Call Control)
     * @param array<string,mixed> $serviceAccount the JSON map to connect your Dialoglow account
     * @param string $conversationProfileID The id of a configured conversation profile on your Dialogflow account. (If you use Dialogflow CX, this param is required)
     * @param 'cx'|'es'|\Telnyx\DialogflowConnections\DialogflowConnectionUpdateParams\DialogflowAPI $dialogflowAPI determine which Dialogflow will be used
     * @param string $environment which Dialogflow environment will be used
     * @param string $location The region of your agent is. (If you use Dialogflow CX, this param is required)
     *
     * @throws APIException
     */
    public function update(
        string $connectionID,
        array $serviceAccount,
        ?string $conversationProfileID = null,
        string|\Telnyx\DialogflowConnections\DialogflowConnectionUpdateParams\DialogflowAPI $dialogflowAPI = 'es',
        ?string $environment = null,
        ?string $location = null,
        ?RequestOptions $requestOptions = null,
    ): DialogflowConnectionUpdateResponse;

    /**
     * @api
     *
     * @param string $connectionID uniquely identifies a Telnyx application (Call Control)
     *
     * @throws APIException
     */
    public function delete(
        string $connectionID,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
