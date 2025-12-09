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
use Telnyx\ServiceContracts\AdvancedOrdersRawContract;

final class AdvancedOrdersRawService implements AdvancedOrdersRawContract
{
    // @phpstan-ignore-next-line
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
     *   areaCode?: string,
     *   comments?: string,
     *   countryCode?: string,
     *   customerReference?: string,
     *   features?: list<'sms'|'mms'|'voice'|'fax'|'emergency'|Feature>,
     *   phoneNumberType?: 'local'|'mobile'|'toll_free'|'shared_cost'|'national'|'landline'|PhoneNumberType,
     *   quantity?: int,
     *   requirementGroupID?: string,
     * }|AdvancedOrderCreateParams $params
     *
     * @return BaseResponse<AdvancedOrderNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|AdvancedOrderCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AdvancedOrderCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'advanced_orders',
            body: (object) $parsed,
            options: $options,
            convert: AdvancedOrderNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Get Advanced Order
     *
     * @return BaseResponse<AdvancedOrderGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $orderID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['advanced_orders/%1$s', $orderID],
            options: $requestOptions,
            convert: AdvancedOrderGetResponse::class,
        );
    }

    /**
     * @api
     *
     * List Advanced Orders
     *
     * @return BaseResponse<AdvancedOrderListResponse>
     *
     * @throws APIException
     */
    public function list(?RequestOptions $requestOptions = null): BaseResponse
    {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'advanced_orders',
            options: $requestOptions,
            convert: AdvancedOrderListResponse::class,
        );
    }

    /**
     * @api
     *
     * Update Advanced Order
     *
     * @param array{
     *   areaCode?: string,
     *   comments?: string,
     *   countryCode?: string,
     *   customerReference?: string,
     *   features?: list<'sms'|'mms'|'voice'|'fax'|'emergency'|AdvancedOrderUpdateRequirementGroupParams\Feature>,
     *   phoneNumberType?: 'local'|'mobile'|'toll_free'|'shared_cost'|'national'|'landline'|AdvancedOrderUpdateRequirementGroupParams\PhoneNumberType,
     *   quantity?: int,
     *   requirementGroupID?: string,
     * }|AdvancedOrderUpdateRequirementGroupParams $params
     *
     * @return BaseResponse<AdvancedOrderUpdateRequirementGroupResponse>
     *
     * @throws APIException
     */
    public function updateRequirementGroup(
        string $advancedOrderID,
        array|AdvancedOrderUpdateRequirementGroupParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AdvancedOrderUpdateRequirementGroupParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['advanced_orders/%1$s/requirement_group', $advancedOrderID],
            body: (object) $parsed,
            options: $options,
            convert: AdvancedOrderUpdateRequirementGroupResponse::class,
        );
    }
}
