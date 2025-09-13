<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\SimCardOrders\SimCardOrderGetResponse;
use Telnyx\SimCardOrders\SimCardOrderListParams\Filter;
use Telnyx\SimCardOrders\SimCardOrderListParams\Page;
use Telnyx\SimCardOrders\SimCardOrderListResponse;
use Telnyx\SimCardOrders\SimCardOrderNewResponse;

use const Telnyx\Core\OMIT as omit;

interface SimCardOrdersContract
{
    /**
     * @api
     *
     * @param string $addressID uniquely identifies the address for the order
     * @param int $quantity the amount of SIM cards to order
     *
     * @return SimCardOrderNewResponse<HasRawResponse>
     */
    public function create(
        $addressID,
        $quantity,
        ?RequestOptions $requestOptions = null
    ): SimCardOrderNewResponse;

    /**
     * @api
     *
     * @return SimCardOrderGetResponse<HasRawResponse>
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): SimCardOrderGetResponse;

    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter for SIM card orders (deepObject style). Originally: filter[created_at], filter[updated_at], filter[quantity], filter[cost.amount], filter[cost.currency], filter[address.id], filter[address.street_address], filter[address.extended_address], filter[address.locality], filter[address.administrative_area], filter[address.country_code], filter[address.postal_code]
     * @param Page $page Consolidated pagination parameter (deepObject style). Originally: page[number], page[size]
     *
     * @return SimCardOrderListResponse<HasRawResponse>
     */
    public function list(
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): SimCardOrderListResponse;
}
