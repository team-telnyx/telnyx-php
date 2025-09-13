<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\Networks\NetworkDeleteResponse;
use Telnyx\Networks\NetworkGetResponse;
use Telnyx\Networks\NetworkListInterfacesParams\Filter as Filter1;
use Telnyx\Networks\NetworkListInterfacesParams\Page as Page1;
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
     */
    public function create(
        $name,
        ?RequestOptions $requestOptions = null
    ): NetworkNewResponse;

    /**
     * @api
     *
     * @return NetworkGetResponse<HasRawResponse>
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): NetworkGetResponse;

    /**
     * @api
     *
     * @param string $name a user specified name for the network
     *
     * @return NetworkUpdateResponse<HasRawResponse>
     */
    public function update(
        string $id,
        $name,
        ?RequestOptions $requestOptions = null
    ): NetworkUpdateResponse;

    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[name]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     *
     * @return NetworkListResponse<HasRawResponse>
     */
    public function list(
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): NetworkListResponse;

    /**
     * @api
     *
     * @return NetworkDeleteResponse<HasRawResponse>
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): NetworkDeleteResponse;

    /**
     * @api
     *
     * @param Filter1 $filter Consolidated filter parameter (deepObject style). Originally: filter[name], filter[type], filter[status]
     * @param Page1 $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     *
     * @return NetworkListInterfacesResponse<HasRawResponse>
     */
    public function listInterfaces(
        string $id,
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null,
    ): NetworkListInterfacesResponse;
}
