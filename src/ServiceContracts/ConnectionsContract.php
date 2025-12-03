<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Connections\ConnectionGetResponse;
use Telnyx\Connections\ConnectionListActiveCallsParams;
use Telnyx\Connections\ConnectionListActiveCallsResponse;
use Telnyx\Connections\ConnectionListParams;
use Telnyx\Connections\ConnectionListResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
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
     * @return DefaultPagination<ConnectionListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|ConnectionListParams $params,
        ?RequestOptions $requestOptions = null
    ): DefaultPagination;

    /**
     * @api
     *
     * @param array<mixed>|ConnectionListActiveCallsParams $params
     *
     * @return DefaultPagination<ConnectionListActiveCallsResponse>
     *
     * @throws APIException
     */
    public function listActiveCalls(
        string $connectionID,
        array|ConnectionListActiveCallsParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination;
}
