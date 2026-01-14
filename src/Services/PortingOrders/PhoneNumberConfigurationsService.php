<?php

declare(strict_types=1);

namespace Telnyx\Services\PortingOrders;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationCreateParams\PhoneNumberConfiguration;
use Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationListParams\Filter;
use Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationListParams\Sort;
use Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationListResponse;
use Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PortingOrders\PhoneNumberConfigurationsContract;

/**
 * @phpstan-import-type PhoneNumberConfigurationShape from \Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationCreateParams\PhoneNumberConfiguration
 * @phpstan-import-type FilterShape from \Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationListParams\Filter
 * @phpstan-import-type SortShape from \Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationListParams\Sort
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class PhoneNumberConfigurationsService implements PhoneNumberConfigurationsContract
{
    /**
     * @api
     */
    public PhoneNumberConfigurationsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new PhoneNumberConfigurationsRawService($client);
    }

    /**
     * @api
     *
     * Creates a list of phone number configurations.
     *
     * @param list<PhoneNumberConfiguration|PhoneNumberConfigurationShape> $phoneNumberConfigurations
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        ?array $phoneNumberConfigurations = null,
        RequestOptions|array|null $requestOptions = null,
    ): PhoneNumberConfigurationNewResponse {
        $params = Util::removeNulls(
            ['phoneNumberConfigurations' => $phoneNumberConfigurations]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns a list of phone number configurations paginated.
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[porting_order.status][in][], filter[porting_phone_number][in][], filter[user_bundle_id][in][]
     * @param Sort|SortShape $sort Consolidated sort parameter (deepObject style). Originally: sort[value]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<PhoneNumberConfigurationListResponse>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        Sort|array|null $sort = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            [
                'filter' => $filter,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
                'sort' => $sort,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
