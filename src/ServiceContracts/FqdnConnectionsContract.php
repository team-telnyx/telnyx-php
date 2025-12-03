<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

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

interface FqdnConnectionsContract
{
    /**
     * @api
     *
     * @param array<mixed>|FqdnConnectionCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|FqdnConnectionCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): FqdnConnectionNewResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): FqdnConnectionGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|FqdnConnectionUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|FqdnConnectionUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): FqdnConnectionUpdateResponse;

    /**
     * @api
     *
     * @param array<mixed>|FqdnConnectionListParams $params
     *
     * @return DefaultPagination<FqdnConnection>
     *
     * @throws APIException
     */
    public function list(
        array|FqdnConnectionListParams $params,
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
    ): FqdnConnectionDeleteResponse;
}
