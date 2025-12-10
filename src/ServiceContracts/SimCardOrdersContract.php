<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\SimCardOrders\SimCardOrder;
use Telnyx\SimCardOrders\SimCardOrderGetResponse;
use Telnyx\SimCardOrders\SimCardOrderNewResponse;

interface SimCardOrdersContract
{
    /**
     * @api
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
    ): SimCardOrderNewResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): SimCardOrderGetResponse;

    /**
     * @api
     *
     * @param array{
     *   addressAdministrativeArea?: string,
     *   addressCountryCode?: string,
     *   addressExtendedAddress?: string,
     *   addressID?: string,
     *   addressLocality?: string,
     *   addressPostalCode?: string,
     *   addressStreetAddress?: string,
     *   costAmount?: string,
     *   costCurrency?: string,
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
    ): DefaultPagination;
}
