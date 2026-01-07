<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\SimCardOrdersContract;
use Telnyx\SimCardOrders\SimCardOrder;
use Telnyx\SimCardOrders\SimCardOrderGetResponse;
use Telnyx\SimCardOrders\SimCardOrderListParams\Filter;
use Telnyx\SimCardOrders\SimCardOrderListParams\Page;
use Telnyx\SimCardOrders\SimCardOrderNewResponse;

/**
 * @phpstan-import-type FilterShape from \Telnyx\SimCardOrders\SimCardOrderListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\SimCardOrders\SimCardOrderListParams\Page
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class SimCardOrdersService implements SimCardOrdersContract
{
    /**
     * @api
     */
    public SimCardOrdersRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SimCardOrdersRawService($client);
    }

    /**
     * @api
     *
     * Creates a new order for SIM cards.
     *
     * @param string $addressID uniquely identifies the address for the order
     * @param int $quantity the amount of SIM cards to order
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $addressID,
        int $quantity,
        RequestOptions|array|null $requestOptions = null,
    ): SimCardOrderNewResponse {
        $params = Util::removeNulls(
            ['addressID' => $addressID, 'quantity' => $quantity]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get a single SIM card order by its ID.
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): SimCardOrderGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get all SIM card orders according to filters.
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter for SIM card orders (deepObject style). Originally: filter[created_at], filter[updated_at], filter[quantity], filter[cost.amount], filter[cost.currency], filter[address.id], filter[address.street_address], filter[address.extended_address], filter[address.locality], filter[address.administrative_area], filter[address.country_code], filter[address.postal_code]
     * @param Page|PageShape $page Consolidated pagination parameter (deepObject style). Originally: page[number], page[size]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultPagination<SimCardOrder>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        Page|array|null $page = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultPagination {
        $params = Util::removeNulls(['filter' => $filter, 'page' => $page]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
