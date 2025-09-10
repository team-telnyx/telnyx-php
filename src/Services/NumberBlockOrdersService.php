<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\NumberBlockOrders\NumberBlockOrderCreateParams;
use Telnyx\NumberBlockOrders\NumberBlockOrderGetResponse;
use Telnyx\NumberBlockOrders\NumberBlockOrderListParams;
use Telnyx\NumberBlockOrders\NumberBlockOrderListParams\Filter;
use Telnyx\NumberBlockOrders\NumberBlockOrderListParams\Page;
use Telnyx\NumberBlockOrders\NumberBlockOrderListResponse;
use Telnyx\NumberBlockOrders\NumberBlockOrderNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\NumberBlockOrdersContract;

use const Telnyx\Core\OMIT as omit;

final class NumberBlockOrdersService implements NumberBlockOrdersContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a phone number block order.
     *
     * @param int $range the phone number range included in the block
     * @param string $startingNumber Starting phone number block
     * @param string $connectionID identifies the connection associated with this phone number
     * @param string $customerReference a customer reference string for customer look ups
     * @param string $messagingProfileID identifies the messaging profile associated with the phone number
     */
    public function create(
        $range,
        $startingNumber,
        $connectionID = omit,
        $customerReference = omit,
        $messagingProfileID = omit,
        ?RequestOptions $requestOptions = null,
    ): NumberBlockOrderNewResponse {
        [$parsed, $options] = NumberBlockOrderCreateParams::parseRequest(
            [
                'range' => $range,
                'startingNumber' => $startingNumber,
                'connectionID' => $connectionID,
                'customerReference' => $customerReference,
                'messagingProfileID' => $messagingProfileID,
            ],
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'number_block_orders',
            body: (object) $parsed,
            options: $options,
            convert: NumberBlockOrderNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Get an existing phone number block order.
     */
    public function retrieve(
        string $numberBlockOrderID,
        ?RequestOptions $requestOptions = null
    ): NumberBlockOrderGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['number_block_orders/%1$s', $numberBlockOrderID],
            options: $requestOptions,
            convert: NumberBlockOrderGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Get a paginated list of number block orders.
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[status], filter[created_at], filter[phone_numbers.starting_number]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     */
    public function list(
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): NumberBlockOrderListResponse {
        [$parsed, $options] = NumberBlockOrderListParams::parseRequest(
            ['filter' => $filter, 'page' => $page],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'number_block_orders',
            query: $parsed,
            options: $options,
            convert: NumberBlockOrderListResponse::class,
        );
    }
}
