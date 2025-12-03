<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\OAuthClients\OAuthClient;
use Telnyx\OAuthClients\OAuthClientCreateParams;
use Telnyx\OAuthClients\OAuthClientGetResponse;
use Telnyx\OAuthClients\OAuthClientListParams;
use Telnyx\OAuthClients\OAuthClientNewResponse;
use Telnyx\OAuthClients\OAuthClientUpdateParams;
use Telnyx\OAuthClients\OAuthClientUpdateResponse;
use Telnyx\RequestOptions;

interface OAuthClientsContract
{
    /**
     * @api
     *
     * @param array<mixed>|OAuthClientCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|OAuthClientCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): OAuthClientNewResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): OAuthClientGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|OAuthClientUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|OAuthClientUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): OAuthClientUpdateResponse;

    /**
     * @api
     *
     * @param array<mixed>|OAuthClientListParams $params
     *
     * @return DefaultFlatPagination<OAuthClient>
     *
     * @throws APIException
     */
    public function list(
        array|OAuthClientListParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
