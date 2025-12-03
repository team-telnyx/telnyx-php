<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PortingOrders;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\PortingOrders\ActionRequirements\ActionRequirementInitiateParams;
use Telnyx\PortingOrders\ActionRequirements\ActionRequirementInitiateResponse;
use Telnyx\PortingOrders\ActionRequirements\ActionRequirementListParams;
use Telnyx\PortingOrders\ActionRequirements\ActionRequirementListResponse;
use Telnyx\RequestOptions;

interface ActionRequirementsContract
{
    /**
     * @api
     *
     * @param array<mixed>|ActionRequirementListParams $params
     *
     * @return DefaultPagination<ActionRequirementListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $portingOrderID,
        array|ActionRequirementListParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination;

    /**
     * @api
     *
     * @param array<mixed>|ActionRequirementInitiateParams $params
     *
     * @throws APIException
     */
    public function initiate(
        string $id,
        array|ActionRequirementInitiateParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionRequirementInitiateResponse;
}
