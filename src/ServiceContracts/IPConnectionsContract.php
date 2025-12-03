<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\IPConnections\IPConnectionCreateParams;
use Telnyx\IPConnections\IPConnectionDeleteResponse;
use Telnyx\IPConnections\IPConnectionGetResponse;
use Telnyx\IPConnections\IPConnectionListParams;
use Telnyx\IPConnections\IPConnectionListResponse;
use Telnyx\IPConnections\IPConnectionNewResponse;
use Telnyx\IPConnections\IPConnectionUpdateParams;
use Telnyx\IPConnections\IPConnectionUpdateResponse;
use Telnyx\RequestOptions;

interface IPConnectionsContract
{
    /**
     * @api
     *
     * @param array<mixed>|IPConnectionCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|IPConnectionCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): IPConnectionNewResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): IPConnectionGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|IPConnectionUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|IPConnectionUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): IPConnectionUpdateResponse;

    /**
     * @api
     *
     * @param array<mixed>|IPConnectionListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|IPConnectionListParams $params,
        ?RequestOptions $requestOptions = null,
    ): IPConnectionListResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): IPConnectionDeleteResponse;
}
