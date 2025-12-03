<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\WireguardInterfaces\WireguardInterfaceCreateParams;
use Telnyx\WireguardInterfaces\WireguardInterfaceDeleteResponse;
use Telnyx\WireguardInterfaces\WireguardInterfaceGetResponse;
use Telnyx\WireguardInterfaces\WireguardInterfaceListParams;
use Telnyx\WireguardInterfaces\WireguardInterfaceListResponse;
use Telnyx\WireguardInterfaces\WireguardInterfaceNewResponse;

interface WireguardInterfacesContract
{
    /**
     * @api
     *
     * @param array<mixed>|WireguardInterfaceCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|WireguardInterfaceCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): WireguardInterfaceNewResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): WireguardInterfaceGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|WireguardInterfaceListParams $params
     *
     * @return DefaultPagination<WireguardInterfaceListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|WireguardInterfaceListParams $params,
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
    ): WireguardInterfaceDeleteResponse;
}
