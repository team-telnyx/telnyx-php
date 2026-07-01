<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Messaging10dlc\Brand;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Messaging10dlc\Brand\ExternalVetting\ExternalVetting;
use Telnyx\Messaging10dlc\Brand\ExternalVetting\ExternalVettingImportsParams;
use Telnyx\Messaging10dlc\Brand\ExternalVetting\ExternalVettingOrderParams;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ExternalVettingRawContract
{
    /**
     * @api
     *
     * @param string $brandID unique identifier of the brand
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<ExternalVetting>>
     *
     * @throws APIException
     */
    public function list(
        string $brandID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $brandID unique identifier of the brand
     * @param array<string,mixed>|ExternalVettingImportsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ExternalVetting>
     *
     * @throws APIException
     */
    public function imports(
        string $brandID,
        array|ExternalVettingImportsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $brandID unique identifier of the brand
     * @param array<string,mixed>|ExternalVettingOrderParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ExternalVetting>
     *
     * @throws APIException
     */
    public function order(
        string $brandID,
        array|ExternalVettingOrderParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
