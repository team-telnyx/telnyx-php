<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\NumberOrderPhoneNumbers\UpdateRegulatoryRequirement;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\SubNumberOrdersContract;
use Telnyx\SubNumberOrders\SubNumberOrderCancelResponse;
use Telnyx\SubNumberOrders\SubNumberOrderGetResponse;
use Telnyx\SubNumberOrders\SubNumberOrderListParams;
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
     * @throws APIException
     */
    public function retrieve(
        string $subNumberOrderID,
        $filter = omit,
        ?RequestOptions $requestOptions = null,
    ): SubNumberOrderGetResponse {
        $params = ['filter' => $filter];

        return $this->retrieveRaw($subNumberOrderID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $subNumberOrderID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): SubNumberOrderGetResponse {
        [$parsed, $options] = SubNumberOrderRetrieveParams::parseRequest(
            $params,
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
     * @throws APIException
     */
    public function update(
        string $subNumberOrderID,
        $regulatoryRequirements = omit,
        ?RequestOptions $requestOptions = null,
    ): SubNumberOrderUpdateResponse {
        $params = ['regulatoryRequirements' => $regulatoryRequirements];

        return $this->updateRaw($subNumberOrderID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        string $subNumberOrderID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): SubNumberOrderUpdateResponse {
        [$parsed, $options] = SubNumberOrderUpdateParams::parseRequest(
            $params,
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
     * @param Telnyx\SubNumberOrders\SubNumberOrderListParams\Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[status], filter[order_request_id], filter[country_code], filter[phone_number_type], filter[phone_numbers_count]
     *
     * @throws APIException
     */
    public function list(
        $filter = omit,
        ?RequestOptions $requestOptions = null
    ): SubNumberOrderListResponse {
        $params = ['filter' => $filter];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): SubNumberOrderListResponse {
        [$parsed, $options] = SubNumberOrderListParams::parseRequest(
            $params,
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
     * @throws APIException
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
     * @throws APIException
     */
    public function updateRequirementGroup(
        string $id,
        $requirementGroupID,
        ?RequestOptions $requestOptions = null
    ): SubNumberOrderUpdateRequirementGroupResponse {
        $params = ['requirementGroupID' => $requirementGroupID];

        return $this->updateRequirementGroupRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRequirementGroupRaw(
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
    ): SubNumberOrderUpdateRequirementGroupResponse {
        [
            $parsed, $options,
        ] = SubNumberOrderUpdateRequirementGroupParams::parseRequest(
            $params,
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
