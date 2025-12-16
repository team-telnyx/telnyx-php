<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\FqdnConnections\FqdnConnection;
use Telnyx\FqdnConnections\FqdnConnectionCreateParams;
use Telnyx\FqdnConnections\FqdnConnectionDeleteResponse;
use Telnyx\FqdnConnections\FqdnConnectionGetResponse;
use Telnyx\FqdnConnections\FqdnConnectionListParams;
use Telnyx\FqdnConnections\FqdnConnectionNewResponse;
use Telnyx\FqdnConnections\FqdnConnectionUpdateParams;
use Telnyx\FqdnConnections\FqdnConnectionUpdateResponse;
use Telnyx\RequestOptions;

interface FqdnConnectionsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|FqdnConnectionCreateParams $params
     *
     * @return BaseResponse<FqdnConnectionNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|FqdnConnectionCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     *
     * @return BaseResponse<FqdnConnectionGetResponse>
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
     * @param string $id identifies the resource
     * @param array<string,mixed>|FqdnConnectionUpdateParams $params
     *
     * @return BaseResponse<FqdnConnectionUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|FqdnConnectionUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|FqdnConnectionListParams $params
     *
     * @return BaseResponse<DefaultPagination<FqdnConnection>>
     *
     * @throws APIException
     */
    public function list(
        array|FqdnConnectionListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     *
     * @return BaseResponse<FqdnConnectionDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
