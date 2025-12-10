<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\Networks\InterfaceStatus;
use Telnyx\Networks\NetworkDeleteResponse;
use Telnyx\Networks\NetworkGetResponse;
use Telnyx\Networks\NetworkListInterfacesResponse;
use Telnyx\Networks\NetworkListResponse;
use Telnyx\Networks\NetworkNewResponse;
use Telnyx\Networks\NetworkUpdateResponse;
use Telnyx\RequestOptions;

interface NetworksContract
{
    /**
     * @api
     *
     * @param string $name a user specified name for the network
     *
     * @throws APIException
     */
    public function create(
        string $name,
        ?RequestOptions $requestOptions = null
    ): NetworkNewResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
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
     * @param string $networkID identifies the resource
     * @param string $name a user specified name for the network
     *
     * @throws APIException
     */
    public function update(
        string $networkID,
        string $name,
        ?RequestOptions $requestOptions = null
    ): NetworkUpdateResponse;

    /**
     * @api
     *
     * @param array{
     *   name?: string
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[name]
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     *
     * @return DefaultPagination<NetworkListResponse>
     *
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?array $page = null,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination;

    /**
     * @api
     *
     * @param string $id identifies the resource
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
     * @param string $id identifies the resource
     * @param array{
     *   name?: string,
     *   status?: 'created'|'provisioning'|'provisioned'|'deleting'|InterfaceStatus,
     *   type?: string,
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[name], filter[type], filter[status]
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     *
     * @return DefaultPagination<NetworkListInterfacesResponse>
     *
     * @throws APIException
     */
    public function listInterfaces(
        string $id,
        ?array $filter = null,
        ?array $page = null,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination;
}
