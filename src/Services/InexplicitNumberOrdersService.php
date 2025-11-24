<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderCreateParams;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderGetResponse;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderListParams;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderListResponse;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\InexplicitNumberOrdersContract;

final class InexplicitNumberOrdersService implements InexplicitNumberOrdersContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create an inexplicit number order to programmatically purchase phone numbers without specifying exact numbers.
     *
     * @param array{
     *   ordering_groups: list<array{
     *     count_requested: string,
     *     country_iso: "US"|"CA",
     *     phone_number_type: string,
     *     administrative_area?: string,
     *     features?: list<string>,
     *     locality?: string,
     *     national_destination_code?: string,
     *     phone_number?: array{
     *       contains?: string, ends_with?: string, starts_with?: string
     *     },
     *     strategy?: "always"|"never",
     *   }>,
     *   billing_group_id?: string,
     *   connection_id?: string,
     *   customer_reference?: string,
     *   messaging_profile_id?: string,
     * }|InexplicitNumberOrderCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|InexplicitNumberOrderCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): InexplicitNumberOrderNewResponse {
        [$parsed, $options] = InexplicitNumberOrderCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'inexplicit_number_orders',
            body: (object) $parsed,
            options: $options,
            convert: InexplicitNumberOrderNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Get an existing inexplicit number order by ID.
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): InexplicitNumberOrderGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['inexplicit_number_orders/%1$s', $id],
            options: $requestOptions,
            convert: InexplicitNumberOrderGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Get a paginated list of inexplicit number orders.
     *
     * @param array{
     *   page_number?: int, page_size?: int
     * }|InexplicitNumberOrderListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|InexplicitNumberOrderListParams $params,
        ?RequestOptions $requestOptions = null,
    ): InexplicitNumberOrderListResponse {
        [$parsed, $options] = InexplicitNumberOrderListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'inexplicit_number_orders',
            query: $parsed,
            options: $options,
            convert: InexplicitNumberOrderListResponse::class,
        );
    }
}
