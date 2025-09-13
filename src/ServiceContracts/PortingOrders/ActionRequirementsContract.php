<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PortingOrders;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\PortingOrders\ActionRequirements\ActionRequirementInitiateParams\Params;
use Telnyx\PortingOrders\ActionRequirements\ActionRequirementInitiateResponse;
use Telnyx\PortingOrders\ActionRequirements\ActionRequirementListParams\Filter;
use Telnyx\PortingOrders\ActionRequirements\ActionRequirementListParams\Page;
use Telnyx\PortingOrders\ActionRequirements\ActionRequirementListParams\Sort;
use Telnyx\PortingOrders\ActionRequirements\ActionRequirementListResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface ActionRequirementsContract
{
    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[id][in][], filter[requirement_type_id], filter[action_type], filter[status]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param Sort $sort Consolidated sort parameter (deepObject style). Originally: sort[value]
     *
     * @return ActionRequirementListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        string $portingOrderID,
        $filter = omit,
        $page = omit,
        $sort = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionRequirementListResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return ActionRequirementListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        string $portingOrderID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): ActionRequirementListResponse;

    /**
     * @api
     *
     * @param string $portingOrderID
     * @param Params $params required information for initiating the action requirement for AU ID verification
     *
     * @return ActionRequirementInitiateResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function initiate(
        string $id,
        $portingOrderID,
        $params,
        ?RequestOptions $requestOptions = null,
    ): ActionRequirementInitiateResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return ActionRequirementInitiateResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function initiateRaw(
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ActionRequirementInitiateResponse;
}
