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

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
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
     *   features?: list<Feature|value-of<Feature>>,
     *   phoneNumberType?: PhoneNumberType|value-of<PhoneNumberType>,
     *   quantity?: int,
     *   requirementGroupID?: string,
     * }|AdvancedOrderCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AdvancedOrderNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|AdvancedOrderCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AdvancedOrderGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $orderID,
        RequestOptions|array|null $requestOptions = null
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AdvancedOrderListResponse>
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
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
     *   features?: list<AdvancedOrderUpdateRequirementGroupParams\Feature|value-of<AdvancedOrderUpdateRequirementGroupParams\Feature>>,
     *   phoneNumberType?: AdvancedOrderUpdateRequirementGroupParams\PhoneNumberType|value-of<AdvancedOrderUpdateRequirementGroupParams\PhoneNumberType>,
     *   quantity?: int,
     *   requirementGroupID?: string,
     * }|AdvancedOrderUpdateRequirementGroupParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AdvancedOrderUpdateRequirementGroupResponse>
     *
     * @throws APIException
     */
    public function updateRequirementGroup(
        string $advancedOrderID,
        array|AdvancedOrderUpdateRequirementGroupParams $params,
        RequestOptions|array|null $requestOptions = null,
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
