<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\NumberBlockOrders\NumberBlockOrderGetResponse;
use Telnyx\NumberBlockOrders\NumberBlockOrderListParams\Filter;
use Telnyx\NumberBlockOrders\NumberBlockOrderListParams\Page;
use Telnyx\NumberBlockOrders\NumberBlockOrderListResponse;
use Telnyx\NumberBlockOrders\NumberBlockOrderNewResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface NumberBlockOrdersContract
{
    /**
     * @api
     *
     * @param int $range the phone number range included in the block
     * @param string $startingNumber Starting phone number block
     * @param string $connectionID identifies the connection associated with this phone number
     * @param string $customerReference a customer reference string for customer look ups
     * @param string $messagingProfileID identifies the messaging profile associated with the phone number
     *
     * @return NumberBlockOrderNewResponse<HasRawResponse>
     */
    public function create(
        $range,
        $startingNumber,
        $connectionID = omit,
        $customerReference = omit,
        $messagingProfileID = omit,
        ?RequestOptions $requestOptions = null,
    ): NumberBlockOrderNewResponse;

    /**
     * @api
     *
     * @return NumberBlockOrderGetResponse<HasRawResponse>
     */
    public function retrieve(
        string $numberBlockOrderID,
        ?RequestOptions $requestOptions = null
    ): NumberBlockOrderGetResponse;

    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[status], filter[created_at], filter[phone_numbers.starting_number]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     *
     * @return NumberBlockOrderListResponse<HasRawResponse>
     */
    public function list(
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): NumberBlockOrderListResponse;
}
