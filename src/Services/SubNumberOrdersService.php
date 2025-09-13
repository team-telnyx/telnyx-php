<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\NumberOrderPhoneNumbers\UpdateRegulatoryRequirement;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\SubNumberOrdersContract;
use Telnyx\SubNumberOrders\SubNumberOrderCancelResponse;
use Telnyx\SubNumberOrders\SubNumberOrderGetResponse;
use Telnyx\SubNumberOrders\SubNumberOrderListParams;
use Telnyx\SubNumberOrders\SubNumberOrderListParams\Filter as Filter1;
use Telnyx\SubNumberOrders\SubNumberOrderListResponse;
use Telnyx\SubNumberOrders\SubNumberOrderRetrieveParams;
use Telnyx\SubNumberOrders\SubNumberOrderRetrieveParams\Filter;
use Telnyx\SubNumberOrders\SubNumberOrderUpdateParams;
use Telnyx\SubNumberOrders\SubNumberOrderUpdateRequirementGroupParams;
use Telnyx\SubNumberOrders\SubNumberOrderUpdateRequirementGroupResponse;
use Telnyx\SubNumberOrders\SubNumberOrderUpdateResponse;

use const Telnyx\Core\OMIT as omit;

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
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[include_phone_numbers]
     *
     * @return SubNumberOrderGetResponse<HasRawResponse>
     */
    public function retrieve(
        string $subNumberOrderID,
        $filter = omit,
        ?RequestOptions $requestOptions = null,
    ): SubNumberOrderGetResponse {
        [$parsed, $options] = SubNumberOrderRetrieveParams::parseRequest(
            ['filter' => $filter],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
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
     * @param list<UpdateRegulatoryRequirement> $regulatoryRequirements
     *
     * @return SubNumberOrderUpdateResponse<HasRawResponse>
     */
    public function update(
        string $subNumberOrderID,
        $regulatoryRequirements = omit,
        ?RequestOptions $requestOptions = null,
    ): SubNumberOrderUpdateResponse {
        [$parsed, $options] = SubNumberOrderUpdateParams::parseRequest(
            ['regulatoryRequirements' => $regulatoryRequirements],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
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
     * @param Filter1 $filter Consolidated filter parameter (deepObject style). Originally: filter[status], filter[order_request_id], filter[country_code], filter[phone_number_type], filter[phone_numbers_count]
     *
     * @return SubNumberOrderListResponse<HasRawResponse>
     */
    public function list(
        $filter = omit,
        ?RequestOptions $requestOptions = null
    ): SubNumberOrderListResponse {
        [$parsed, $options] = SubNumberOrderListParams::parseRequest(
            ['filter' => $filter],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
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
     * @return SubNumberOrderCancelResponse<HasRawResponse>
     */
    public function cancel(
        string $subNumberOrderID,
        ?RequestOptions $requestOptions = null
    ): SubNumberOrderCancelResponse {
        // @phpstan-ignore-next-line;
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
     * @param string $requirementGroupID The ID of the requirement group to associate
     *
     * @return SubNumberOrderUpdateRequirementGroupResponse<HasRawResponse>
     */
    public function updateRequirementGroup(
        string $id,
        $requirementGroupID,
        ?RequestOptions $requestOptions = null
    ): SubNumberOrderUpdateRequirementGroupResponse {
        [
            $parsed, $options,
        ] = SubNumberOrderUpdateRequirementGroupParams::parseRequest(
            ['requirementGroupID' => $requirementGroupID],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['sub_number_orders/%1$s/requirement_group', $id],
            body: (object) $parsed,
            options: $options,
            convert: SubNumberOrderUpdateRequirementGroupResponse::class,
        );
    }
}
