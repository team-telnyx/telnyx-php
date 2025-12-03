<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\NumberOrders\NumberOrderCreateParams;
use Telnyx\NumberOrders\NumberOrderGetResponse;
use Telnyx\NumberOrders\NumberOrderListParams;
use Telnyx\NumberOrders\NumberOrderListResponse;
use Telnyx\NumberOrders\NumberOrderNewResponse;
use Telnyx\NumberOrders\NumberOrderUpdateParams;
use Telnyx\NumberOrders\NumberOrderUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\NumberOrdersContract;

final class NumberOrdersService implements NumberOrdersContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a phone number order.
     *
     * @param array{
     *   billing_group_id?: string,
     *   connection_id?: string,
     *   customer_reference?: string,
     *   messaging_profile_id?: string,
     *   phone_numbers?: list<array{
     *     phone_number: string, bundle_id?: string, requirement_group_id?: string
     *   }>,
     * }|NumberOrderCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|NumberOrderCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): NumberOrderNewResponse {
        [$parsed, $options] = NumberOrderCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'number_orders',
            body: (object) $parsed,
            options: $options,
            convert: NumberOrderNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Get an existing phone number order.
     *
     * @throws APIException
     */
    public function retrieve(
        string $numberOrderID,
        ?RequestOptions $requestOptions = null
    ): NumberOrderGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['number_orders/%1$s', $numberOrderID],
            options: $requestOptions,
            convert: NumberOrderGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Updates a phone number order.
     *
     * @param array{
     *   customer_reference?: string,
     *   regulatory_requirements?: list<array{
     *     field_value?: string, requirement_id?: string
     *   }>,
     * }|NumberOrderUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $numberOrderID,
        array|NumberOrderUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): NumberOrderUpdateResponse {
        [$parsed, $options] = NumberOrderUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['number_orders/%1$s', $numberOrderID],
            body: (object) $parsed,
            options: $options,
            convert: NumberOrderUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * Get a paginated list of number orders.
     *
     * @param array{
     *   filter?: array{
     *     created_at?: array{gt?: string, lt?: string},
     *     customer_reference?: string,
     *     phone_numbers_count?: string,
     *     requirements_met?: bool,
     *     status?: string,
     *   },
     *   page?: array{number?: int, size?: int},
     * }|NumberOrderListParams $params
     *
     * @return DefaultPagination<NumberOrderListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|NumberOrderListParams $params,
        ?RequestOptions $requestOptions = null
    ): DefaultPagination {
        [$parsed, $options] = NumberOrderListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'number_orders',
            query: $parsed,
            options: $options,
            convert: NumberOrderListResponse::class,
            page: DefaultPagination::class,
        );
    }
}
