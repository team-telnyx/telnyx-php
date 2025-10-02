<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\Networks\NetworkDeleteResponse;
use Telnyx\Networks\NetworkGetResponse;
use Telnyx\Networks\NetworkListInterfacesResponse;
use Telnyx\Networks\NetworkListParams\Filter;
use Telnyx\Networks\NetworkListParams\Page;
use Telnyx\Networks\NetworkListResponse;
use Telnyx\Networks\NetworkNewResponse;
use Telnyx\Networks\NetworkUpdateResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface NetworksContract
{
    /**
     * @api
     *
     * @param string $name a user specified name for the network
     *
     * @return NetworkNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function create(
        $name,
        ?RequestOptions $requestOptions = null
    ): NetworkNewResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return NetworkNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): NetworkNewResponse;

    /**
     * @api
     *
     * @return NetworkGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): NetworkGetResponse;

    /**
     * @api
     *
     * @return NetworkGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): NetworkGetResponse;

    /**
     * @api
     *
     * @param string $name a user specified name for the network
     *
     * @return NetworkUpdateResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        $name,
        ?RequestOptions $requestOptions = null
    ): NetworkUpdateResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return NetworkUpdateResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function updateRaw(
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
    ): NetworkUpdateResponse;

    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[name]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     *
     * @return NetworkListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): NetworkListResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return NetworkListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): NetworkListResponse;

    /**
     * @api
     *
     * @return NetworkDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): NetworkDeleteResponse;

    /**
     * @api
     *
     * @return NetworkDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): NetworkDeleteResponse;

    /**
     * @api
     *
     * @param Telnyx\Networks\NetworkListInterfacesParams\Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[name], filter[type], filter[status]
     * @param Telnyx\Networks\NetworkListInterfacesParams\Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     *
     * @return NetworkListInterfacesResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listInterfaces(
        string $id,
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null,
    ): NetworkListInterfacesResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return NetworkListInterfacesResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listInterfacesRaw(
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
    ): NetworkListInterfacesResponse;
}
