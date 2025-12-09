<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\IPConnections\IPConnection;
use Telnyx\IPConnections\IPConnectionCreateParams;
use Telnyx\IPConnections\IPConnectionDeleteResponse;
use Telnyx\IPConnections\IPConnectionGetResponse;
use Telnyx\IPConnections\IPConnectionListParams;
use Telnyx\IPConnections\IPConnectionNewResponse;
use Telnyx\IPConnections\IPConnectionUpdateParams;
use Telnyx\IPConnections\IPConnectionUpdateResponse;
use Telnyx\RequestOptions;

interface IPConnectionsRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|IPConnectionCreateParams $params
     *
     * @return BaseResponse<IPConnectionNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|IPConnectionCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id IP Connection ID
     *
     * @return BaseResponse<IPConnectionGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the type of resource
     * @param array<mixed>|IPConnectionUpdateParams $params
     *
     * @return BaseResponse<IPConnectionUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|IPConnectionUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|IPConnectionListParams $params
     *
     * @return BaseResponse<DefaultPagination<IPConnection>>
     *
     * @throws APIException
     */
    public function list(
        array|IPConnectionListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the type of resource
     *
     * @return BaseResponse<IPConnectionDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
