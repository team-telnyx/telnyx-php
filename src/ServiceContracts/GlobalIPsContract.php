<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\GlobalIPs\GlobalIPDeleteResponse;
use Telnyx\GlobalIPs\GlobalIPGetResponse;
use Telnyx\GlobalIPs\GlobalIPListParams\Page;
use Telnyx\GlobalIPs\GlobalIPListResponse;
use Telnyx\GlobalIPs\GlobalIPNewResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface GlobalIPsContract
{
    /**
     * @api
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
    ): GlobalIPNewResponse;

    /**
     * @api
     *
     * @return GlobalIPGetResponse<HasRawResponse>
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): GlobalIPGetResponse;

    /**
     * @api
     *
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     *
     * @return GlobalIPListResponse<HasRawResponse>
     */
    public function list(
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): GlobalIPListResponse;

    /**
     * @api
     *
     * @return GlobalIPDeleteResponse<HasRawResponse>
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): GlobalIPDeleteResponse;
}
