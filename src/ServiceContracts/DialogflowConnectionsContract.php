<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DialogflowConnections\DialogflowConnectionCreateParams\DialogflowAPI;
use Telnyx\DialogflowConnections\DialogflowConnectionGetResponse;
use Telnyx\DialogflowConnections\DialogflowConnectionNewResponse;
use Telnyx\DialogflowConnections\DialogflowConnectionUpdateResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface DialogflowConnectionsContract
{
    /**
     * @api
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
    ): DialogflowConnectionNewResponse;

    /**
     * @api
     *
     * @param string $connectionID uniquely identifies a Telnyx application (Call Control)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $connectionID,
        RequestOptions|array|null $requestOptions = null
    ): DialogflowConnectionGetResponse;

    /**
     * @api
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
    ): DialogflowConnectionUpdateResponse;

    /**
     * @api
     *
     * @param string $connectionID uniquely identifies a Telnyx application (Call Control)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $connectionID,
        RequestOptions|array|null $requestOptions = null
    ): mixed;
}
