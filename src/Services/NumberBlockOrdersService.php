<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\NumberBlockOrders\NumberBlockOrderCreateParams;
use Telnyx\NumberBlockOrders\NumberBlockOrderGetResponse;
use Telnyx\NumberBlockOrders\NumberBlockOrderListParams;
use Telnyx\NumberBlockOrders\NumberBlockOrderListResponse;
use Telnyx\NumberBlockOrders\NumberBlockOrderNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\NumberBlockOrdersContract;

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
     * @param array{
     *   range: int,
     *   starting_number: string,
     *   connection_id?: string,
     *   customer_reference?: string,
     *   messaging_profile_id?: string,
     * }|NumberBlockOrderCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|NumberBlockOrderCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): NumberBlockOrderNewResponse {
        [$parsed, $options] = NumberBlockOrderCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     *
     * @throws APIException
     */
    public function retrieve(
        string $numberBlockOrderID,
        ?RequestOptions $requestOptions = null
    ): NumberBlockOrderGetResponse {
        // @phpstan-ignore-next-line return.type
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
     * @param array{
     *   filter?: array{
     *     created_at?: array{gt?: string, lt?: string},
     *     'phone_numbers.starting_number'?: string,
     *     status?: string,
     *   },
     *   page?: array{number?: int, size?: int},
     * }|NumberBlockOrderListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|NumberBlockOrderListParams $params,
        ?RequestOptions $requestOptions = null,
    ): NumberBlockOrderListResponse {
        [$parsed, $options] = NumberBlockOrderListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'number_block_orders',
            query: $parsed,
            options: $options,
            convert: NumberBlockOrderListResponse::class,
        );
    }
}
