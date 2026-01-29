<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Connections\ConnectionGetResponse;
use Telnyx\Connections\ConnectionListActiveCallsParams;
use Telnyx\Connections\ConnectionListActiveCallsResponse;
use Telnyx\Connections\ConnectionListParams;
use Telnyx\Connections\ConnectionListResponse;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ConnectionsRawContract
{
    /**
     * @api
     *
     * @param string $id IP Connection ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ConnectionGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ConnectionListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultPagination<ConnectionListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|ConnectionListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $connectionID Telnyx connection id
     * @param array<string,mixed>|ConnectionListActiveCallsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<ConnectionListActiveCallsResponse>>
     *
     * @throws APIException
     */
    public function listActiveCalls(
        string $connectionID,
        array|ConnectionListActiveCallsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
