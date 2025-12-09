<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\AdvancedOrders\AdvancedOrderCreateParams;
use Telnyx\AdvancedOrders\AdvancedOrderCreateParams\Feature;
use Telnyx\AdvancedOrders\AdvancedOrderCreateParams\PhoneNumberType;
use Telnyx\AdvancedOrders\AdvancedOrderGetResponse;
use Telnyx\AdvancedOrders\AdvancedOrderListResponse;
use Telnyx\AdvancedOrders\AdvancedOrderNewResponse;
use Telnyx\AdvancedOrders\AdvancedOrderUpdateRequirementGroupParams;
use Telnyx\AdvancedOrders\AdvancedOrderUpdateRequirementGroupResponse;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
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
     *   features?: list<'sms'|'mms'|'voice'|'fax'|'emergency'|Feature>,
     *   phone_number_type?: 'local'|'mobile'|'toll_free'|'shared_cost'|'national'|'landline'|PhoneNumberType,
     *   quantity?: int,
     *   requirement_group_id?: string,
     * }|AdvancedOrderCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|AdvancedOrderCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): AdvancedOrderNewResponse {
        [$parsed, $options] = AdvancedOrderCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<AdvancedOrderNewResponse> */
        $response = $this->client->request(
            method: 'post',
            path: 'advanced_orders',
            body: (object) $parsed,
            options: $options,
            convert: AdvancedOrderNewResponse::class,
        );

        return $response->parse();
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
    ): AdvancedOrderGetResponse {
        /** @var BaseResponse<AdvancedOrderGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['advanced_orders/%1$s', $orderID],
            options: $requestOptions,
            convert: AdvancedOrderGetResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * List Advanced Orders
     *
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): AdvancedOrderListResponse {
        /** @var BaseResponse<AdvancedOrderListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'advanced_orders',
            options: $requestOptions,
            convert: AdvancedOrderListResponse::class,
        );

        return $response->parse();
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
     *   features?: list<'sms'|'mms'|'voice'|'fax'|'emergency'|AdvancedOrderUpdateRequirementGroupParams\Feature>,
     *   phone_number_type?: 'local'|'mobile'|'toll_free'|'shared_cost'|'national'|'landline'|AdvancedOrderUpdateRequirementGroupParams\PhoneNumberType,
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
    ): AdvancedOrderUpdateRequirementGroupResponse {
        [$parsed, $options] = AdvancedOrderUpdateRequirementGroupParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<AdvancedOrderUpdateRequirementGroupResponse> */
        $response = $this->client->request(
            method: 'patch',
            path: ['advanced_orders/%1$s/requirement_group', $advancedOrderID],
            body: (object) $parsed,
            options: $options,
            convert: AdvancedOrderUpdateRequirementGroupResponse::class,
        );

        return $response->parse();
    }
}
