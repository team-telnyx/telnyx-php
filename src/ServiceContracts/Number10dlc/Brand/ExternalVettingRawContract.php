<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Number10dlc\Brand;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Number10dlc\Brand\ExternalVetting\ExternalVettingImportParams;
use Telnyx\Number10dlc\Brand\ExternalVetting\ExternalVettingImportResponse;
use Telnyx\Number10dlc\Brand\ExternalVetting\ExternalVettingListResponseItem;
use Telnyx\Number10dlc\Brand\ExternalVetting\ExternalVettingOrderParams;
use Telnyx\Number10dlc\Brand\ExternalVetting\ExternalVettingOrderResponse;
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
     * @param array<mixed>|ExternalVettingImportParams $params
     *
     * @return BaseResponse<ExternalVettingImportResponse>
     *
     * @throws APIException
     */
    public function import(
        string $brandID,
        array|ExternalVettingImportParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|ExternalVettingOrderParams $params
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
