<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\ExternalConnections\ExternalConnection;
use Telnyx\ExternalConnections\ExternalConnectionCreateParams;
use Telnyx\ExternalConnections\ExternalConnectionDeleteResponse;
use Telnyx\ExternalConnections\ExternalConnectionGetResponse;
use Telnyx\ExternalConnections\ExternalConnectionListParams;
use Telnyx\ExternalConnections\ExternalConnectionNewResponse;
use Telnyx\ExternalConnections\ExternalConnectionUpdateLocationParams;
use Telnyx\ExternalConnections\ExternalConnectionUpdateLocationResponse;
use Telnyx\ExternalConnections\ExternalConnectionUpdateParams;
use Telnyx\ExternalConnections\ExternalConnectionUpdateResponse;
use Telnyx\RequestOptions;

interface ExternalConnectionsContract
{
    /**
     * @api
     *
     * @param array<mixed>|ExternalConnectionCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|ExternalConnectionCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): ExternalConnectionNewResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ExternalConnectionGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|ExternalConnectionUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|ExternalConnectionUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): ExternalConnectionUpdateResponse;

    /**
     * @api
     *
     * @param array<mixed>|ExternalConnectionListParams $params
     *
     * @return DefaultPagination<ExternalConnection>
     *
     * @throws APIException
     */
    public function list(
        array|ExternalConnectionListParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ExternalConnectionDeleteResponse;

    /**
     * @api
     *
     * @param array<mixed>|ExternalConnectionUpdateLocationParams $params
     *
     * @throws APIException
     */
    public function updateLocation(
        string $locationID,
        array|ExternalConnectionUpdateLocationParams $params,
        ?RequestOptions $requestOptions = null,
    ): ExternalConnectionUpdateLocationResponse;
}
