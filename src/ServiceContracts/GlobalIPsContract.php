<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\GlobalIPs\GlobalIPDeleteResponse;
use Telnyx\GlobalIPs\GlobalIPGetResponse;
use Telnyx\GlobalIPs\GlobalIPListResponse;
use Telnyx\GlobalIPs\GlobalIPNewResponse;
use Telnyx\RequestOptions;

interface GlobalIPsContract
{
    /**
     * @api
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
    ): GlobalIPNewResponse;

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
    ): GlobalIPGetResponse;

    /**
     * @api
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
    ): GlobalIPDeleteResponse;
}
