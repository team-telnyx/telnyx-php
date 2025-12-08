<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\SubNumberOrdersContract;
use Telnyx\SubNumberOrders\SubNumberOrderCancelResponse;
use Telnyx\SubNumberOrders\SubNumberOrderGetResponse;
use Telnyx\SubNumberOrders\SubNumberOrderListParams;
use Telnyx\SubNumberOrders\SubNumberOrderListResponse;
use Telnyx\SubNumberOrders\SubNumberOrderRetrieveParams;
use Telnyx\SubNumberOrders\SubNumberOrderUpdateParams;
use Telnyx\SubNumberOrders\SubNumberOrderUpdateRequirementGroupParams;
use Telnyx\SubNumberOrders\SubNumberOrderUpdateRequirementGroupResponse;
use Telnyx\SubNumberOrders\SubNumberOrderUpdateResponse;

final class SubNumberOrdersService implements SubNumberOrdersContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get an existing sub number order.
     *
     * @param array{
     *   filter?: array{include_phone_numbers?: bool}
     * }|SubNumberOrderRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        string $subNumberOrderID,
        array|SubNumberOrderRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): SubNumberOrderGetResponse {
        [$parsed, $options] = SubNumberOrderRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<SubNumberOrderGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['sub_number_orders/%1$s', $subNumberOrderID],
            query: $parsed,
            options: $options,
            convert: SubNumberOrderGetResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Updates a sub number order.
     *
     * @param array{
     *   regulatory_requirements?: list<array{
     *     field_value?: string, requirement_id?: string
     *   }>,
     * }|SubNumberOrderUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $subNumberOrderID,
        array|SubNumberOrderUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): SubNumberOrderUpdateResponse {
        [$parsed, $options] = SubNumberOrderUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<SubNumberOrderUpdateResponse> */
        $response = $this->client->request(
            method: 'patch',
            path: ['sub_number_orders/%1$s', $subNumberOrderID],
            body: (object) $parsed,
            options: $options,
            convert: SubNumberOrderUpdateResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Get a paginated list of sub number orders.
     *
     * @param array{
     *   filter?: array{
     *     country_code?: string,
     *     order_request_id?: string,
     *     phone_number_type?: string,
     *     phone_numbers_count?: int,
     *     status?: string,
     *   },
     * }|SubNumberOrderListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|SubNumberOrderListParams $params,
        ?RequestOptions $requestOptions = null,
    ): SubNumberOrderListResponse {
        [$parsed, $options] = SubNumberOrderListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<SubNumberOrderListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'sub_number_orders',
            query: $parsed,
            options: $options,
            convert: SubNumberOrderListResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Allows you to cancel a sub number order in 'pending' status.
     *
     * @throws APIException
     */
    public function cancel(
        string $subNumberOrderID,
        ?RequestOptions $requestOptions = null
    ): SubNumberOrderCancelResponse {
        /** @var BaseResponse<SubNumberOrderCancelResponse> */
        $response = $this->client->request(
            method: 'patch',
            path: ['sub_number_orders/%1$s/cancel', $subNumberOrderID],
            options: $requestOptions,
            convert: SubNumberOrderCancelResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Update requirement group for a sub number order
     *
     * @param array{
     *   requirement_group_id: string
     * }|SubNumberOrderUpdateRequirementGroupParams $params
     *
     * @throws APIException
     */
    public function updateRequirementGroup(
        string $id,
        array|SubNumberOrderUpdateRequirementGroupParams $params,
        ?RequestOptions $requestOptions = null,
    ): SubNumberOrderUpdateRequirementGroupResponse {
        [$parsed, $options] = SubNumberOrderUpdateRequirementGroupParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<SubNumberOrderUpdateRequirementGroupResponse> */
        $response = $this->client->request(
            method: 'post',
            path: ['sub_number_orders/%1$s/requirement_group', $id],
            body: (object) $parsed,
            options: $options,
            convert: SubNumberOrderUpdateRequirementGroupResponse::class,
        );

        return $response->parse();
    }
}
