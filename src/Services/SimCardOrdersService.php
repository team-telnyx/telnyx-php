<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\SimCardOrdersContract;
use Telnyx\SimCardOrders\SimCardOrder;
use Telnyx\SimCardOrders\SimCardOrderGetResponse;
use Telnyx\SimCardOrders\SimCardOrderNewResponse;

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
     *
     * @throws APIException
     */
    public function create(
        string $addressID,
        int $quantity,
        ?RequestOptions $requestOptions = null
    ): SimCardOrderNewResponse {
        $params = ['addressID' => $addressID, 'quantity' => $quantity];

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
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
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
     * @param array{
     *   address?: array{
     *     id?: string,
     *     administrativeArea?: string,
     *     countryCode?: string,
     *     extendedAddress?: string,
     *     locality?: string,
     *     postalCode?: string,
     *     streetAddress?: string,
     *   },
     *   cost?: array{amount?: string, currency?: string},
     *   createdAt?: string|\DateTimeInterface,
     *   quantity?: int,
     *   updatedAt?: string|\DateTimeInterface,
     * } $filter Consolidated filter parameter for SIM card orders (deepObject style). Originally: filter[created_at], filter[updated_at], filter[quantity], filter[cost.amount], filter[cost.currency], filter[address.id], filter[address.street_address], filter[address.extended_address], filter[address.locality], filter[address.administrative_area], filter[address.country_code], filter[address.postal_code]
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated pagination parameter (deepObject style). Originally: page[number], page[size]
     *
     * @return DefaultPagination<SimCardOrder>
     *
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?array $page = null,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination {
        $params = ['filter' => $filter, 'page' => $page];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
