<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PortingOrders;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\PortingOrders\ActionRequirements\ActionRequirementInitiateResponse;
use Telnyx\PortingOrders\ActionRequirements\ActionRequirementListParams\Filter\ActionType;
use Telnyx\PortingOrders\ActionRequirements\ActionRequirementListParams\Filter\Status;
use Telnyx\PortingOrders\ActionRequirements\ActionRequirementListParams\Sort\Value;
use Telnyx\PortingOrders\ActionRequirements\ActionRequirementListResponse;
use Telnyx\RequestOptions;

interface ActionRequirementsContract
{
    /**
     * @api
     *
     * @param string $portingOrderID The ID of the porting order
     * @param array{
     *   id?: list<string>,
     *   actionType?: 'au_id_verification'|ActionType,
     *   requirementTypeID?: string,
     *   status?: 'created'|'pending'|'completed'|'cancelled'|'failed'|Status,
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[id][in][], filter[requirement_type_id], filter[action_type], filter[status]
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param array{
     *   value?: 'created_at'|'-created_at'|'updated_at'|'-updated_at'|Value
     * } $sort Consolidated sort parameter (deepObject style). Originally: sort[value]
     *
     * @return DefaultPagination<ActionRequirementListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $portingOrderID,
        ?array $filter = null,
        ?array $page = null,
        ?array $sort = null,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination;

    /**
     * @api
     *
     * @param string $id Path param: The ID of the action requirement
     * @param string $portingOrderID Path param: The ID of the porting order
     * @param array{
     *   firstName: string, lastName: string
     * } $params Body param: Required information for initiating the action requirement for AU ID verification
     *
     * @throws APIException
     */
    public function initiate(
        string $id,
        string $portingOrderID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): ActionRequirementInitiateResponse;
}
