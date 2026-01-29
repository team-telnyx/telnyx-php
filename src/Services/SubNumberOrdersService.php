<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\NumberOrderPhoneNumbers\UpdateRegulatoryRequirement;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\SubNumberOrdersContract;
use Telnyx\SubNumberOrders\SubNumberOrderCancelResponse;
use Telnyx\SubNumberOrders\SubNumberOrderGetResponse;
use Telnyx\SubNumberOrders\SubNumberOrderListResponse;
use Telnyx\SubNumberOrders\SubNumberOrderRetrieveParams\Filter;
use Telnyx\SubNumberOrders\SubNumberOrderUpdateRequirementGroupResponse;
use Telnyx\SubNumberOrders\SubNumberOrderUpdateResponse;

/**
 * @phpstan-import-type FilterShape from \Telnyx\SubNumberOrders\SubNumberOrderRetrieveParams\Filter
 * @phpstan-import-type UpdateRegulatoryRequirementShape from \Telnyx\NumberOrderPhoneNumbers\UpdateRegulatoryRequirement
 * @phpstan-import-type FilterShape from \Telnyx\SubNumberOrders\SubNumberOrderListParams\Filter as FilterShape1
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class SubNumberOrdersService implements SubNumberOrdersContract
{
    /**
     * @api
     */
    public SubNumberOrdersRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SubNumberOrdersRawService($client);
    }

    /**
     * @api
     *
     * Get an existing sub number order.
     *
     * @param string $subNumberOrderID the sub number order ID
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[include_phone_numbers]
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $subNumberOrderID,
        Filter|array|null $filter = null,
        RequestOptions|array|null $requestOptions = null,
    ): SubNumberOrderGetResponse {
        $params = Util::removeNulls(['filter' => $filter]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($subNumberOrderID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Updates a sub number order.
     *
     * @param string $subNumberOrderID the sub number order ID
     * @param list<UpdateRegulatoryRequirement|UpdateRegulatoryRequirementShape> $regulatoryRequirements
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $subNumberOrderID,
        ?array $regulatoryRequirements = null,
        RequestOptions|array|null $requestOptions = null,
    ): SubNumberOrderUpdateResponse {
        $params = Util::removeNulls(
            ['regulatoryRequirements' => $regulatoryRequirements]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($subNumberOrderID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get a paginated list of sub number orders.
     *
     * @param \Telnyx\SubNumberOrders\SubNumberOrderListParams\Filter|FilterShape1 $filter Consolidated filter parameter (deepObject style). Originally: filter[status], filter[order_request_id], filter[country_code], filter[phone_number_type], filter[phone_numbers_count]
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        \Telnyx\SubNumberOrders\SubNumberOrderListParams\Filter|array|null $filter = null,
        RequestOptions|array|null $requestOptions = null,
    ): SubNumberOrderListResponse {
        $params = Util::removeNulls(['filter' => $filter]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Allows you to cancel a sub number order in 'pending' status.
     *
     * @param string $subNumberOrderID the ID of the sub number order
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function cancel(
        string $subNumberOrderID,
        RequestOptions|array|null $requestOptions = null
    ): SubNumberOrderCancelResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->cancel($subNumberOrderID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update requirement group for a sub number order
     *
     * @param string $id The ID of the sub number order
     * @param string $requirementGroupID The ID of the requirement group to associate
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateRequirementGroup(
        string $id,
        string $requirementGroupID,
        RequestOptions|array|null $requestOptions = null,
    ): SubNumberOrderUpdateRequirementGroupResponse {
        $params = Util::removeNulls(['requirementGroupID' => $requirementGroupID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateRequirementGroup($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
