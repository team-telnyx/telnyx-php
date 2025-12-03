<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\SimCardOrdersContract;
use Telnyx\SimCardOrders\SimCardOrder;
use Telnyx\SimCardOrders\SimCardOrderCreateParams;
use Telnyx\SimCardOrders\SimCardOrderGetResponse;
use Telnyx\SimCardOrders\SimCardOrderListParams;
use Telnyx\SimCardOrders\SimCardOrderNewResponse;

final class SimCardOrdersService implements SimCardOrdersContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a new order for SIM cards.
     *
     * @param array{address_id: string, quantity: int}|SimCardOrderCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|SimCardOrderCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimCardOrderNewResponse {
        [$parsed, $options] = SimCardOrderCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'sim_card_orders',
            body: (object) $parsed,
            options: $options,
            convert: SimCardOrderNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Get a single SIM card order by its ID.
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): SimCardOrderGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['sim_card_orders/%1$s', $id],
            options: $requestOptions,
            convert: SimCardOrderGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Get all SIM card orders according to filters.
     *
     * @param array{
     *   filter?: array{
     *     address?: array{
     *       id?: string,
     *       administrative_area?: string,
     *       country_code?: string,
     *       extended_address?: string,
     *       locality?: string,
     *       postal_code?: string,
     *       street_address?: string,
     *     },
     *     cost?: array{amount?: string, currency?: string},
     *     created_at?: string|\DateTimeInterface,
     *     quantity?: int,
     *     updated_at?: string|\DateTimeInterface,
     *   },
     *   page?: array{number?: int, size?: int},
     * }|SimCardOrderListParams $params
     *
     * @return DefaultPagination<SimCardOrder>
     *
     * @throws APIException
     */
    public function list(
        array|SimCardOrderListParams $params,
        ?RequestOptions $requestOptions = null
    ): DefaultPagination {
        [$parsed, $options] = SimCardOrderListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'sim_card_orders',
            query: $parsed,
            options: $options,
            convert: SimCardOrder::class,
            page: DefaultPagination::class,
        );
    }
}
