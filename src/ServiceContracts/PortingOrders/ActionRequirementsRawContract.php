<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PortingOrders;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\PortingOrders\ActionRequirements\ActionRequirementInitiateParams;
use Telnyx\PortingOrders\ActionRequirements\ActionRequirementInitiateResponse;
use Telnyx\PortingOrders\ActionRequirements\ActionRequirementListParams;
use Telnyx\PortingOrders\ActionRequirements\ActionRequirementListResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ActionRequirementsRawContract
{
    /**
     * @api
     *
     * @param string $portingOrderID The ID of the porting order
     * @param array<string,mixed>|ActionRequirementListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultPagination<ActionRequirementListResponse>>
     *
     * @throws APIException
     */
    public function list(
        string $portingOrderID,
        array|ActionRequirementListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Path param: The ID of the action requirement
     * @param array<string,mixed>|ActionRequirementInitiateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionRequirementInitiateResponse>
     *
     * @throws APIException
     */
    public function initiate(
        string $id,
        array|ActionRequirementInitiateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
