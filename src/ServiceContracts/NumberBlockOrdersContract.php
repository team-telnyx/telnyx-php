<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\NumberBlockOrders\NumberBlockOrderGetResponse;
use Telnyx\NumberBlockOrders\NumberBlockOrderListResponse;
use Telnyx\NumberBlockOrders\NumberBlockOrderNewResponse;
use Telnyx\RequestOptions;

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
     * @throws APIException
     */
    public function create(
        int $range,
        string $startingNumber,
        ?string $connectionID = null,
        ?string $customerReference = null,
        ?string $messagingProfileID = null,
        ?RequestOptions $requestOptions = null,
    ): NumberBlockOrderNewResponse;

    /**
     * @api
     *
     * @param string $numberBlockOrderID the number block order ID
     *
     * @throws APIException
     */
    public function retrieve(
        string $numberBlockOrderID,
        ?RequestOptions $requestOptions = null
    ): NumberBlockOrderGetResponse;

    /**
     * @api
     *
     * @param array{
     *   createdAt?: array{gt?: string, lt?: string},
     *   phoneNumbersStartingNumber?: string,
     *   status?: string,
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[status], filter[created_at], filter[phone_numbers.starting_number]
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     *
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?array $page = null,
        ?RequestOptions $requestOptions = null,
    ): NumberBlockOrderListResponse;
}
