<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\ExternalRequirements;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\ExternalRequirements\SubNumberOrders\SubNumberOrderGetResponse;
use Telnyx\ExternalRequirements\SubNumberOrders\SubNumberOrderRetrieveParams;
use Telnyx\ExternalRequirements\SubNumberOrders\SubNumberOrderUpdateParams;
use Telnyx\ExternalRequirements\SubNumberOrders\SubNumberOrderUpdateResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface SubNumberOrdersRawContract
{
    /**
     * @api
     *
     * @param string $subNumberOrderID the ID of the sub number order the requirement belongs to
     * @param array<string,mixed>|SubNumberOrderRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SubNumberOrderGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $subNumberOrderID,
        array|SubNumberOrderRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $subNumberOrderID path param: The ID of the sub number order the requirement belongs to
     * @param array<string,mixed>|SubNumberOrderUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SubNumberOrderUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $subNumberOrderID,
        array|SubNumberOrderUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
