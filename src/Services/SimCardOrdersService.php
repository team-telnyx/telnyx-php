<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\SimCardOrdersContract;
use Telnyx\SimCardOrders\SimCardOrderCreateParams;
use Telnyx\SimCardOrders\SimCardOrderGetResponse;
use Telnyx\SimCardOrders\SimCardOrderListParams;
use Telnyx\SimCardOrders\SimCardOrderListParams\Filter;
use Telnyx\SimCardOrders\SimCardOrderListParams\Page;
use Telnyx\SimCardOrders\SimCardOrderListResponse;
use Telnyx\SimCardOrders\SimCardOrderNewResponse;

use const Telnyx\Core\OMIT as omit;

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
     * @param string $addressID uniquely identifies the address for the order
     * @param int $quantity the amount of SIM cards to order
     */
    public function create(
        $addressID,
        $quantity,
        ?RequestOptions $requestOptions = null
    ): SimCardOrderNewResponse {
        [$parsed, $options] = SimCardOrderCreateParams::parseRequest(
            ['addressID' => $addressID, 'quantity' => $quantity],
            $requestOptions
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
     * @param Filter $filter Consolidated filter parameter for SIM card orders (deepObject style). Originally: filter[created_at], filter[updated_at], filter[quantity], filter[cost.amount], filter[cost.currency], filter[address.id], filter[address.street_address], filter[address.extended_address], filter[address.locality], filter[address.administrative_area], filter[address.country_code], filter[address.postal_code]
     * @param Page $page Consolidated pagination parameter (deepObject style). Originally: page[number], page[size]
     */
    public function list(
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): SimCardOrderListResponse {
        [$parsed, $options] = SimCardOrderListParams::parseRequest(
            ['filter' => $filter, 'page' => $page],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'sim_card_orders',
            query: $parsed,
            options: $options,
            convert: SimCardOrderListResponse::class,
        );
    }
}
