<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PortingOrders;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\PortingOrders\ActionRequirements\ActionRequirementInitiateParams\Params;
use Telnyx\PortingOrders\ActionRequirements\ActionRequirementInitiateResponse;
use Telnyx\PortingOrders\ActionRequirements\ActionRequirementListParams\Filter;
use Telnyx\PortingOrders\ActionRequirements\ActionRequirementListParams\Page;
use Telnyx\PortingOrders\ActionRequirements\ActionRequirementListParams\Sort;
use Telnyx\PortingOrders\ActionRequirements\ActionRequirementListResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type FilterShape from \Telnyx\PortingOrders\ActionRequirements\ActionRequirementListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\PortingOrders\ActionRequirements\ActionRequirementListParams\Page
 * @phpstan-import-type SortShape from \Telnyx\PortingOrders\ActionRequirements\ActionRequirementListParams\Sort
 * @phpstan-import-type ParamsShape from \Telnyx\PortingOrders\ActionRequirements\ActionRequirementInitiateParams\Params
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ActionRequirementsContract
{
    /**
     * @api
     *
     * @param string $portingOrderID The ID of the porting order
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[id][in][], filter[requirement_type_id], filter[action_type], filter[status]
     * @param Page|PageShape $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param Sort|SortShape $sort Consolidated sort parameter (deepObject style). Originally: sort[value]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultPagination<ActionRequirementListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $portingOrderID,
        Filter|array|null $filter = null,
        Page|array|null $page = null,
        Sort|array|null $sort = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultPagination;

    /**
     * @api
     *
     * @param string $id Path param: The ID of the action requirement
     * @param string $portingOrderID Path param: The ID of the porting order
     * @param Params|ParamsShape $params body param: Required information for initiating the action requirement for AU ID verification
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function initiate(
        string $id,
        string $portingOrderID,
        Params|array $params,
        RequestOptions|array|null $requestOptions = null,
    ): ActionRequirementInitiateResponse;
}
