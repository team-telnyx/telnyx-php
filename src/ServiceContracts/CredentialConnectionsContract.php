<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\CredentialConnections\CredentialConnectionCreateParams;
use Telnyx\CredentialConnections\CredentialConnectionDeleteResponse;
use Telnyx\CredentialConnections\CredentialConnectionGetResponse;
use Telnyx\CredentialConnections\CredentialConnectionListParams;
use Telnyx\CredentialConnections\CredentialConnectionListResponse;
use Telnyx\CredentialConnections\CredentialConnectionNewResponse;
use Telnyx\CredentialConnections\CredentialConnectionUpdateParams;
use Telnyx\CredentialConnections\CredentialConnectionUpdateResponse;
use Telnyx\RequestOptions;

interface CredentialConnectionsContract
{
    /**
     * @api
     *
     * @param array<mixed>|CredentialConnectionCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|CredentialConnectionCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): CredentialConnectionNewResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): CredentialConnectionGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|CredentialConnectionUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|CredentialConnectionUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): CredentialConnectionUpdateResponse;

    /**
     * @api
     *
     * @param array<mixed>|CredentialConnectionListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|CredentialConnectionListParams $params,
        ?RequestOptions $requestOptions = null,
    ): CredentialConnectionListResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): CredentialConnectionDeleteResponse;
}
