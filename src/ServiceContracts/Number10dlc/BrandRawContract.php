<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Number10dlc;

use Telnyx\Brand\TelnyxBrand;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Number10dlc\Brand\BrandCreateParams;
use Telnyx\Number10dlc\Brand\BrandGetResponse;
use Telnyx\Number10dlc\Brand\BrandListParams;
use Telnyx\Number10dlc\Brand\BrandListResponse;
use Telnyx\Number10dlc\Brand\BrandUpdateParams;
use Telnyx\RequestOptions;

interface BrandRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|BrandCreateParams $params
     *
     * @return BaseResponse<TelnyxBrand>
     *
     * @throws APIException
     */
    public function create(
        array|BrandCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<BrandGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $brandID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|BrandUpdateParams $params
     *
     * @return BaseResponse<TelnyxBrand>
     *
     * @throws APIException
     */
    public function update(
        string $brandID,
        array|BrandUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|BrandListParams $params
     *
     * @return BaseResponse<BrandListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|BrandListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $brandID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function _2faEmail(
        string $brandID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<TelnyxBrand>
     *
     * @throws APIException
     */
    public function updateRevet(
        string $brandID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
