<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\IPs\IPCreateParams;
use Telnyx\IPs\IPDeleteResponse;
use Telnyx\IPs\IPGetResponse;
use Telnyx\IPs\IPListParams;
use Telnyx\IPs\IPListParams\Filter;
use Telnyx\IPs\IPListParams\Page;
use Telnyx\IPs\IPListResponse;
use Telnyx\IPs\IPNewResponse;
use Telnyx\IPs\IPUpdateParams;
use Telnyx\IPs\IPUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\IPsContract;

use const Telnyx\Core\OMIT as omit;

final class IPsService implements IPsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new IP object.
     *
     * @param string $ipAddress IP adddress represented by this resource
     * @param string $connectionID ID of the IP Connection to which this IP should be attached
     * @param int $port port to use when connecting to this IP
     */
    public function create(
        $ipAddress,
        $connectionID = omit,
        $port = omit,
        ?RequestOptions $requestOptions = null,
    ): IPNewResponse {
        [$parsed, $options] = IPCreateParams::parseRequest(
            [
                'ipAddress' => $ipAddress,
                'connectionID' => $connectionID,
                'port' => $port,
            ],
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'ips',
            body: (object) $parsed,
            options: $options,
            convert: IPNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Return the details regarding a specific IP.
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): IPGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['ips/%1$s', $id],
            options: $requestOptions,
            convert: IPGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Update the details of a specific IP.
     *
     * @param string $ipAddress IP adddress represented by this resource
     * @param string $connectionID ID of the IP Connection to which this IP should be attached
     * @param int $port port to use when connecting to this IP
     */
    public function update(
        string $id,
        $ipAddress,
        $connectionID = omit,
        $port = omit,
        ?RequestOptions $requestOptions = null,
    ): IPUpdateResponse {
        [$parsed, $options] = IPUpdateParams::parseRequest(
            [
                'ipAddress' => $ipAddress,
                'connectionID' => $connectionID,
                'port' => $port,
            ],
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['ips/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: IPUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * Get all IPs belonging to the user that match the given filters.
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[connection_id], filter[ip_address], filter[port]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     */
    public function list(
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): IPListResponse {
        [$parsed, $options] = IPListParams::parseRequest(
            ['filter' => $filter, 'page' => $page],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'ips',
            query: $parsed,
            options: $options,
            convert: IPListResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete an IP.
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): IPDeleteResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['ips/%1$s', $id],
            options: $requestOptions,
            convert: IPDeleteResponse::class,
        );
    }
}
