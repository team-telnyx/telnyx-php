<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\GlobalIPs\GlobalIPCreateParams;
use Telnyx\GlobalIPs\GlobalIPDeleteResponse;
use Telnyx\GlobalIPs\GlobalIPGetResponse;
use Telnyx\GlobalIPs\GlobalIPListParams;
use Telnyx\GlobalIPs\GlobalIPListParams\Page;
use Telnyx\GlobalIPs\GlobalIPListResponse;
use Telnyx\GlobalIPs\GlobalIPNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\GlobalIPsContract;

use const Telnyx\Core\OMIT as omit;

final class GlobalIPsService implements GlobalIPsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a Global IP.
     *
     * @param string $description a user specified description for the address
     * @param string $name a user specified name for the address
     * @param array<string, mixed> $ports a Global IP ports grouped by protocol code
     *
     * @return GlobalIPNewResponse<HasRawResponse>
     */
    public function create(
        $description = omit,
        $name = omit,
        $ports = omit,
        ?RequestOptions $requestOptions = null,
    ): GlobalIPNewResponse {
        [$parsed, $options] = GlobalIPCreateParams::parseRequest(
            ['description' => $description, 'name' => $name, 'ports' => $ports],
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'global_ips',
            body: (object) $parsed,
            options: $options,
            convert: GlobalIPNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a Global IP.
     *
     * @return GlobalIPGetResponse<HasRawResponse>
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): GlobalIPGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['global_ips/%1$s', $id],
            options: $requestOptions,
            convert: GlobalIPGetResponse::class,
        );
    }

    /**
     * @api
     *
     * List all Global IPs.
     *
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     *
     * @return GlobalIPListResponse<HasRawResponse>
     */
    public function list(
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): GlobalIPListResponse {
        [$parsed, $options] = GlobalIPListParams::parseRequest(
            ['page' => $page],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'global_ips',
            query: $parsed,
            options: $options,
            convert: GlobalIPListResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete a Global IP.
     *
     * @return GlobalIPDeleteResponse<HasRawResponse>
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): GlobalIPDeleteResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['global_ips/%1$s', $id],
            options: $requestOptions,
            convert: GlobalIPDeleteResponse::class,
        );
    }
}
