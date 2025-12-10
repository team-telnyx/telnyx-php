<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultPagination;
use Telnyx\GlobalIPs\GlobalIPDeleteResponse;
use Telnyx\GlobalIPs\GlobalIPGetResponse;
use Telnyx\GlobalIPs\GlobalIPListResponse;
use Telnyx\GlobalIPs\GlobalIPNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\GlobalIPsContract;

final class GlobalIPsService implements GlobalIPsContract
{
    /**
     * @api
     */
    public GlobalIPsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new GlobalIPsRawService($client);
    }

    /**
     * @api
     *
     * Create a Global IP.
     *
     * @param string $description a user specified description for the address
     * @param string $name a user specified name for the address
     * @param array<string,mixed> $ports a Global IP ports grouped by protocol code
     *
     * @throws APIException
     */
    public function create(
        ?string $description = null,
        ?string $name = null,
        ?array $ports = null,
        ?RequestOptions $requestOptions = null,
    ): GlobalIPNewResponse {
        $params = Util::removeNulls(
            ['description' => $description, 'name' => $name, 'ports' => $ports]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a Global IP.
     *
     * @param string $id identifies the resource
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): GlobalIPGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List all Global IPs.
     *
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     *
     * @return DefaultPagination<GlobalIPListResponse>
     *
     * @throws APIException
     */
    public function list(
        ?array $page = null,
        ?RequestOptions $requestOptions = null
    ): DefaultPagination {
        $params = Util::removeNulls(['page' => $page]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a Global IP.
     *
     * @param string $id identifies the resource
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): GlobalIPDeleteResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
