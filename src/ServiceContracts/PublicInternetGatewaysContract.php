<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\PublicInternetGateways\PublicInternetGatewayCreateParams;
use Telnyx\PublicInternetGateways\PublicInternetGatewayDeleteResponse;
use Telnyx\PublicInternetGateways\PublicInternetGatewayGetResponse;
use Telnyx\PublicInternetGateways\PublicInternetGatewayListParams;
use Telnyx\PublicInternetGateways\PublicInternetGatewayListResponse;
use Telnyx\PublicInternetGateways\PublicInternetGatewayNewResponse;
use Telnyx\RequestOptions;

interface PublicInternetGatewaysContract
{
    /**
     * @api
     *
     * @param array<mixed>|PublicInternetGatewayCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|PublicInternetGatewayCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): PublicInternetGatewayNewResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): PublicInternetGatewayGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|PublicInternetGatewayListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|PublicInternetGatewayListParams $params,
        ?RequestOptions $requestOptions = null,
    ): PublicInternetGatewayListResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): PublicInternetGatewayDeleteResponse;
}
