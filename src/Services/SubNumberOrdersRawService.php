<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\SubNumberOrdersRawContract;
use Telnyx\SubNumberOrders\SubNumberOrderCancelResponse;
use Telnyx\SubNumberOrders\SubNumberOrderGetResponse;
use Telnyx\SubNumberOrders\SubNumberOrderListParams;
use Telnyx\SubNumberOrders\SubNumberOrderListResponse;
use Telnyx\SubNumberOrders\SubNumberOrderRetrieveParams;
use Telnyx\SubNumberOrders\SubNumberOrderUpdateParams;
use Telnyx\SubNumberOrders\SubNumberOrderUpdateRequirementGroupParams;
use Telnyx\SubNumberOrders\SubNumberOrderUpdateRequirementGroupResponse;
use Telnyx\SubNumberOrders\SubNumberOrderUpdateResponse;

final class SubNumberOrdersRawService implements SubNumberOrdersRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get an existing sub number order.
     *
     * @param string $subNumberOrderID the sub number order ID
     * @param array{
     *   filter?: array{includePhoneNumbers?: bool}
     * }|SubNumberOrderRetrieveParams $params
     *
     * @return BaseResponse<SubNumberOrderGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $subNumberOrderID,
        array|SubNumberOrderRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SubNumberOrderRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['sub_number_orders/%1$s', $subNumberOrderID],
            query: $parsed,
            options: $options,
            convert: SubNumberOrderGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Updates a sub number order.
     *
     * @param string $subNumberOrderID the sub number order ID
     * @param array{
     *   regulatoryRequirements?: list<array{
     *     fieldValue?: string, requirementID?: string
     *   }>,
     * }|SubNumberOrderUpdateParams $params
     *
     * @return BaseResponse<SubNumberOrderUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $subNumberOrderID,
        array|SubNumberOrderUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SubNumberOrderUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['sub_number_orders/%1$s', $subNumberOrderID],
            body: (object) $parsed,
            options: $options,
            convert: SubNumberOrderUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * Get a paginated list of sub number orders.
     *
     * @param array{
     *   filter?: array{
     *     countryCode?: string,
     *     orderRequestID?: string,
     *     phoneNumberType?: string,
     *     phoneNumbersCount?: int,
     *     status?: string,
     *   },
     * }|SubNumberOrderListParams $params
     *
     * @return BaseResponse<SubNumberOrderListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|SubNumberOrderListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SubNumberOrderListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'sub_number_orders',
            query: $parsed,
            options: $options,
            convert: SubNumberOrderListResponse::class,
        );
    }

    /**
     * @api
     *
     * Allows you to cancel a sub number order in 'pending' status.
     *
     * @param string $subNumberOrderID the ID of the sub number order
     *
     * @return BaseResponse<SubNumberOrderCancelResponse>
     *
     * @throws APIException
     */
    public function cancel(
        string $subNumberOrderID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['sub_number_orders/%1$s/cancel', $subNumberOrderID],
            options: $requestOptions,
            convert: SubNumberOrderCancelResponse::class,
        );
    }

    /**
     * @api
     *
     * Update requirement group for a sub number order
     *
     * @param string $id The ID of the sub number order
     * @param array{
     *   requirementGroupID: string
     * }|SubNumberOrderUpdateRequirementGroupParams $params
     *
     * @return BaseResponse<SubNumberOrderUpdateRequirementGroupResponse>
     *
     * @throws APIException
     */
    public function updateRequirementGroup(
        string $id,
        array|SubNumberOrderUpdateRequirementGroupParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SubNumberOrderUpdateRequirementGroupParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['sub_number_orders/%1$s/requirement_group', $id],
            body: (object) $parsed,
            options: $options,
            convert: SubNumberOrderUpdateRequirementGroupResponse::class,
        );
    }
}
