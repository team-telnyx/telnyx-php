<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultPagination;
use Telnyx\IPs\IP;
use Telnyx\IPs\IPDeleteResponse;
use Telnyx\IPs\IPGetResponse;
use Telnyx\IPs\IPNewResponse;
use Telnyx\IPs\IPUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\IPsContract;

final class IPsService implements IPsContract
{
    /**
     * @api
     */
    public IPsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new IPsRawService($client);
    }

    /**
     * @api
     *
     * Create a new IP object.
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
    ): IPNewResponse {
        $params = Util::removeNulls(
            [
                'ipAddress' => $ipAddress,
                'connectionID' => $connectionID,
                'port' => $port,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Return the details regarding a specific IP.
     *
     * @param string $id identifies the type of resource
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): IPGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update the details of a specific IP.
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
    ): IPUpdateResponse {
        $params = Util::removeNulls(
            [
                'ipAddress' => $ipAddress,
                'connectionID' => $connectionID,
                'port' => $port,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get all IPs belonging to the user that match the given filters.
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
    ): DefaultPagination {
        $params = Util::removeNulls(['filter' => $filter, 'page' => $page]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete an IP.
     *
     * @param string $id identifies the type of resource
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): IPDeleteResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
