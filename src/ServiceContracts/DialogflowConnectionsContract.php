<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DialogflowConnections\DialogflowConnectionCreateParams;
use Telnyx\DialogflowConnections\DialogflowConnectionGetResponse;
use Telnyx\DialogflowConnections\DialogflowConnectionNewResponse;
use Telnyx\DialogflowConnections\DialogflowConnectionUpdateParams;
use Telnyx\DialogflowConnections\DialogflowConnectionUpdateResponse;
use Telnyx\RequestOptions;

interface DialogflowConnectionsContract
{
    /**
     * @api
     *
     * @param array<mixed>|DialogflowConnectionCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        string $connectionID,
        array|DialogflowConnectionCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): DialogflowConnectionNewResponse;

    /**
     * @api
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
     * @param array<mixed>|DialogflowConnectionUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $connectionID,
        array|DialogflowConnectionUpdateParams $params,
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
}
