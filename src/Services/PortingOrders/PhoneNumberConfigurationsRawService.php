<?php

declare(strict_types=1);

namespace Telnyx\Services\PortingOrders;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationCreateParams;
use Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationCreateParams\PhoneNumberConfiguration;
use Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationListParams;
use Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationListParams\Filter;
use Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationListParams\Page;
use Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationListParams\Sort;
use Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationListResponse;
use Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PortingOrders\PhoneNumberConfigurationsRawContract;

/**
 * @phpstan-import-type PhoneNumberConfigurationShape from \Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationCreateParams\PhoneNumberConfiguration
 * @phpstan-import-type FilterShape from \Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationListParams\Page
 * @phpstan-import-type SortShape from \Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationListParams\Sort
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class PhoneNumberConfigurationsRawService implements PhoneNumberConfigurationsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a list of phone number configurations.
     *
     * @param array{
     *   phoneNumberConfigurations?: list<PhoneNumberConfiguration|PhoneNumberConfigurationShape>,
     * }|PhoneNumberConfigurationCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PhoneNumberConfigurationNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|PhoneNumberConfigurationCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PhoneNumberConfigurationCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param array{
     *   filter?: Filter|FilterShape, page?: Page|PageShape, sort?: Sort|SortShape
     * }|PhoneNumberConfigurationListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultPagination<PhoneNumberConfigurationListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|PhoneNumberConfigurationListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PhoneNumberConfigurationListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'porting_orders/phone_number_configurations',
            query: $parsed,
            options: $options,
            convert: PhoneNumberConfigurationListResponse::class,
            page: DefaultPagination::class,
        );
    }
}
