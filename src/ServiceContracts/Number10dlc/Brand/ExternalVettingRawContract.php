<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Number10dlc\Brand;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Number10dlc\Brand\ExternalVetting\ExternalVettingExternalVettingParams;
use Telnyx\Number10dlc\Brand\ExternalVetting\ExternalVettingExternalVettingResponse;
use Telnyx\Number10dlc\Brand\ExternalVetting\ExternalVettingGetExternalVettingResponseItem;
use Telnyx\Number10dlc\Brand\ExternalVetting\ExternalVettingUpdateExternalVettingParams;
use Telnyx\Number10dlc\Brand\ExternalVetting\ExternalVettingUpdateExternalVettingResponse;
use Telnyx\RequestOptions;

interface ExternalVettingRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|ExternalVettingExternalVettingParams $params
     *
     * @return BaseResponse<ExternalVettingExternalVettingResponse>
     *
     * @throws APIException
     */
    public function externalVetting(
        string $brandID,
        array|ExternalVettingExternalVettingParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<list<ExternalVettingGetExternalVettingResponseItem>>
     *
     * @throws APIException
     */
    public function retrieveExternalVetting(
        string $brandID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|ExternalVettingUpdateExternalVettingParams $params
     *
     * @return BaseResponse<ExternalVettingUpdateExternalVettingResponse>
     *
     * @throws APIException
     */
    public function updateExternalVetting(
        string $brandID,
        array|ExternalVettingUpdateExternalVettingParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
