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

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface CredentialConnectionsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|CredentialConnectionCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CredentialConnectionNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|CredentialConnectionCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CredentialConnectionGetResponse>
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
     * @param string $id identifies the resource
     * @param array<string,mixed>|CredentialConnectionUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CredentialConnectionUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|CredentialConnectionUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|CredentialConnectionListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultPagination<CredentialConnection>>
     *
     * @throws APIException
     */
    public function list(
        array|CredentialConnectionListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CredentialConnectionDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
