<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\AdvancedOrders\AdvancedOrderCreateParams;
use Telnyx\AdvancedOrders\AdvancedOrderUpdateRequirementGroupParams;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AdvancedOrdersContract;

final class AdvancedOrdersService implements AdvancedOrdersContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create Advanced Order
     *
     * @param array{
     *   area_code?: string,
     *   comments?: string,
     *   country_code?: string,
     *   customer_reference?: string,
     *   features?: list<"sms"|"mms"|"voice"|"fax"|"emergency">,
     *   phone_number_type?: "local"|"mobile"|"toll_free"|"shared_cost"|"national"|"landline",
     *   quantity?: int,
     *   requirement_group_id?: string,
     * }|AdvancedOrderCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|AdvancedOrderCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = AdvancedOrderCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'advanced_orders',
            body: (object) $parsed,
            options: $options,
            convert: 'mixed',
        );
    }

    /**
     * @api
     *
     * Get Advanced Order
     *
     * @throws APIException
     */
    public function retrieve(
        string $orderID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['advanced_orders/%1$s', $orderID],
            options: $requestOptions,
            convert: 'mixed',
        );
    }

    /**
     * @api
     *
     * List Advanced Orders
     *
     * @throws APIException
     */
    public function list(?RequestOptions $requestOptions = null): mixed
    {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'advanced_orders',
            options: $requestOptions,
            convert: 'mixed',
        );
    }

    /**
     * @api
     *
     * Update Advanced Order
     *
     * @param array{
     *   area_code?: string,
     *   comments?: string,
     *   country_code?: string,
     *   customer_reference?: string,
     *   features?: list<"sms"|"mms"|"voice"|"fax"|"emergency">,
     *   phone_number_type?: "local"|"mobile"|"toll_free"|"shared_cost"|"national"|"landline",
     *   quantity?: int,
     *   requirement_group_id?: string,
     * }|AdvancedOrderUpdateRequirementGroupParams $params
     *
     * @throws APIException
     */
    public function updateRequirementGroup(
        string $advancedOrderID,
        array|AdvancedOrderUpdateRequirementGroupParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = AdvancedOrderUpdateRequirementGroupParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['advanced_orders/%1$s/requirement_group', $advancedOrderID],
            body: (object) $parsed,
            options: $options,
            convert: 'mixed',
        );
    }
}
