<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\IPs\IP;
use Telnyx\IPs\IPDeleteResponse;
use Telnyx\IPs\IPGetResponse;
use Telnyx\IPs\IPNewResponse;
use Telnyx\IPs\IPUpdateResponse;
use Telnyx\RequestOptions;

interface IPsContract
{
    /**
     * @api
     *
     * @param string $ipAddress IP adddress represented by this resource
     * @param string $connectionID ID of the IP Connection to which this IP should be attached
     * @param int $port port to use when connecting to this IP
     *
     * @throws APIException
     */
    public function create(
        string $ipAddress,
        ?string $connectionID = null,
        int $port = 5060,
        ?RequestOptions $requestOptions = null,
    ): IPNewResponse;

    /**
     * @api
     *
     * @param string $id identifies the type of resource
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): IPGetResponse;

    /**
     * @api
     *
     * @param string $id identifies the type of resource
     * @param string $ipAddress IP adddress represented by this resource
     * @param string $connectionID ID of the IP Connection to which this IP should be attached
     * @param int $port port to use when connecting to this IP
     *
     * @throws APIException
     */
    public function update(
        string $id,
        string $ipAddress,
        ?string $connectionID = null,
        int $port = 5060,
        ?RequestOptions $requestOptions = null,
    ): IPUpdateResponse;

    /**
     * @api
     *
     * @param array{
     *   connectionID?: string, ipAddress?: string, port?: int
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[connection_id], filter[ip_address], filter[port]
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     *
     * @return DefaultPagination<IP>
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
     * @param string $id identifies the type of resource
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): IPDeleteResponse;
}
