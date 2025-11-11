<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Connections\ConnectionGetResponse;
use Telnyx\Connections\ConnectionListActiveCallsParams;
use Telnyx\Connections\ConnectionListActiveCallsResponse;
use Telnyx\Connections\ConnectionListParams;
use Telnyx\Connections\ConnectionListResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface ConnectionsContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ConnectionGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|ConnectionListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|ConnectionListParams $params,
        ?RequestOptions $requestOptions = null,
    ): ConnectionListResponse;

    /**
     * @api
     *
     * @param array<mixed>|ConnectionListActiveCallsParams $params
     *
     * @throws APIException
     */
    public function listActiveCalls(
        string $connectionID,
        array|ConnectionListActiveCallsParams $params,
        ?RequestOptions $requestOptions = null,
    ): ConnectionListActiveCallsResponse;
}
