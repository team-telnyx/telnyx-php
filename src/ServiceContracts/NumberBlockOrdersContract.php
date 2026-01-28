<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\NumberBlockOrders\NumberBlockOrder;
use Telnyx\NumberBlockOrders\NumberBlockOrderGetResponse;
use Telnyx\NumberBlockOrders\NumberBlockOrderListParams\Filter;
use Telnyx\NumberBlockOrders\NumberBlockOrderNewResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type FilterShape from \Telnyx\NumberBlockOrders\NumberBlockOrderListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        int $range,
        string $startingNumber,
        ?string $connectionID = null,
        ?string $customerReference = null,
        ?string $messagingProfileID = null,
        RequestOptions|array|null $requestOptions = null,
    ): NumberBlockOrderNewResponse;

    /**
     * @api
     *
     * @param string $numberBlockOrderID the number block order ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $numberBlockOrderID,
        RequestOptions|array|null $requestOptions = null,
    ): NumberBlockOrderGetResponse;

    /**
     * @api
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[status], filter[created_at], filter[phone_numbers.starting_number]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<NumberBlockOrder>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;
}
