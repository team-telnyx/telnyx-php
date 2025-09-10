<?php

declare(strict_types=1);

namespace Telnyx\Services\PortingOrders;

use Telnyx\Client;
use Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationCreateParams;
use Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationCreateParams\PhoneNumberConfiguration;
use Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationListParams;
use Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationListParams\Filter;
use Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationListParams\Page;
use Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationListParams\Sort;
use Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationListResponse;
use Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PortingOrders\PhoneNumberConfigurationsContract;

use const Telnyx\Core\OMIT as omit;

final class PhoneNumberConfigurationsService implements PhoneNumberConfigurationsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a list of phone number configurations.
     *
     * @param list<PhoneNumberConfiguration> $phoneNumberConfigurations
     */
    public function create(
        $phoneNumberConfigurations = omit,
        ?RequestOptions $requestOptions = null
    ): PhoneNumberConfigurationNewResponse {
        [$parsed, $options] = PhoneNumberConfigurationCreateParams::parseRequest(
            ['phoneNumberConfigurations' => $phoneNumberConfigurations],
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'porting_orders/phone_number_configurations',
            body: (object) $parsed,
            options: $options,
            convert: PhoneNumberConfigurationNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns a list of phone number configurations paginated.
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[porting_order.status][in][], filter[porting_phone_number][in][], filter[user_bundle_id][in][]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param Sort $sort Consolidated sort parameter (deepObject style). Originally: sort[value]
     */
    public function list(
        $filter = omit,
        $page = omit,
        $sort = omit,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumberConfigurationListResponse {
        [$parsed, $options] = PhoneNumberConfigurationListParams::parseRequest(
            ['filter' => $filter, 'page' => $page, 'sort' => $sort],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'porting_orders/phone_number_configurations',
            query: $parsed,
            options: $options,
            convert: PhoneNumberConfigurationListResponse::class,
        );
    }
}
