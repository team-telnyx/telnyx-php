<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\AccessIPAddress\AccessIPAddressListParams\Filter;
use Telnyx\AccessIPAddress\AccessIPAddressListParams\Page;
use Telnyx\AccessIPAddress\AccessIPAddressListResponse;
use Telnyx\AccessIPAddress\AccessIPAddressResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface AccessIPAddressContract
{
    /**
     * @api
     *
     * @param string $ipAddress
     * @param string $description
     */
    public function create(
        $ipAddress,
        $description = omit,
        ?RequestOptions $requestOptions = null
    ): AccessIPAddressResponse;

    /**
     * @api
     */
    public function retrieve(
        string $accessIPAddressID,
        ?RequestOptions $requestOptions = null
    ): AccessIPAddressResponse;

    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[ip_source], filter[ip_address], filter[created_at]. Supports complex bracket operations for dynamic filtering.
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     */
    public function list(
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): AccessIPAddressListResponse;

    /**
     * @api
     */
    public function delete(
        string $accessIPAddressID,
        ?RequestOptions $requestOptions = null
    ): AccessIPAddressResponse;
}
