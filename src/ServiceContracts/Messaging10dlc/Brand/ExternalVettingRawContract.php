<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Messaging10dlc\Brand;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Messaging10dlc\Brand\ExternalVetting\ExternalVettingImportsParams;
use Telnyx\Messaging10dlc\Brand\ExternalVetting\ExternalVettingImportsResponse;
use Telnyx\Messaging10dlc\Brand\ExternalVetting\ExternalVettingListResponseItem;
use Telnyx\Messaging10dlc\Brand\ExternalVetting\ExternalVettingOrderParams;
use Telnyx\Messaging10dlc\Brand\ExternalVetting\ExternalVettingOrderResponse;
use Telnyx\RequestOptions;

interface ExternalVettingRawContract
{
    /**
     * @api
     *
     * @return BaseResponse<list<ExternalVettingListResponseItem>>
     *
     * @throws APIException
     */
    public function list(
        string $brandID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ExternalVettingImportsParams $params
     *
     * @return BaseResponse<ExternalVettingImportsResponse>
     *
     * @throws APIException
     */
    public function imports(
        string $brandID,
        array|ExternalVettingImportsParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ExternalVettingOrderParams $params
     *
     * @return BaseResponse<ExternalVettingOrderResponse>
     *
     * @throws APIException
     */
    public function order(
        string $brandID,
        array|ExternalVettingOrderParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
