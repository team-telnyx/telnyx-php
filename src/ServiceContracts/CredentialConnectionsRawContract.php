<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\CredentialConnections\CredentialConnection;
use Telnyx\CredentialConnections\CredentialConnectionCreateParams;
use Telnyx\CredentialConnections\CredentialConnectionDeleteResponse;
use Telnyx\CredentialConnections\CredentialConnectionGetResponse;
use Telnyx\CredentialConnections\CredentialConnectionListParams;
use Telnyx\CredentialConnections\CredentialConnectionNewResponse;
use Telnyx\CredentialConnections\CredentialConnectionUpdateParams;
use Telnyx\CredentialConnections\CredentialConnectionUpdateResponse;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;

interface CredentialConnectionsRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|CredentialConnectionCreateParams $params
     *
     * @return BaseResponse<CredentialConnectionNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|CredentialConnectionCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     *
     * @return BaseResponse<CredentialConnectionGetResponse>
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
     * @param array<mixed>|CredentialConnectionUpdateParams $params
     *
     * @return BaseResponse<CredentialConnectionUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|CredentialConnectionUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|CredentialConnectionListParams $params
     *
     * @return BaseResponse<DefaultPagination<CredentialConnection>>
     *
     * @throws APIException
     */
    public function list(
        array|CredentialConnectionListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     *
     * @return BaseResponse<CredentialConnectionDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
