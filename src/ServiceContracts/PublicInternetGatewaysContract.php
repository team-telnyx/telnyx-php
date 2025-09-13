<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\PublicInternetGateways\PublicInternetGatewayDeleteResponse;
use Telnyx\PublicInternetGateways\PublicInternetGatewayGetResponse;
use Telnyx\PublicInternetGateways\PublicInternetGatewayListParams\Filter;
use Telnyx\PublicInternetGateways\PublicInternetGatewayListParams\Page;
use Telnyx\PublicInternetGateways\PublicInternetGatewayListResponse;
use Telnyx\PublicInternetGateways\PublicInternetGatewayNewResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface PublicInternetGatewaysContract
{
    /**
     * @api
     *
     * @param string $name a user specified name for the interface
     * @param string $networkID the id of the network associated with the interface
     * @param string $regionCode the region the interface should be deployed to
     *
     * @return PublicInternetGatewayNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function create(
        $name = omit,
        $networkID = omit,
        $regionCode = omit,
        ?RequestOptions $requestOptions = null,
    ): PublicInternetGatewayNewResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return PublicInternetGatewayNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): PublicInternetGatewayNewResponse;

    /**
     * @api
     *
     * @return PublicInternetGatewayGetResponse<HasRawResponse>
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
     * @return PublicInternetGatewayGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): PublicInternetGatewayGetResponse;

    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[network_id]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     *
     * @return PublicInternetGatewayListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): PublicInternetGatewayListResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return PublicInternetGatewayListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): PublicInternetGatewayListResponse;

    /**
     * @api
     *
     * @return PublicInternetGatewayDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): PublicInternetGatewayDeleteResponse;

    /**
     * @api
     *
     * @return PublicInternetGatewayDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): PublicInternetGatewayDeleteResponse;
}
