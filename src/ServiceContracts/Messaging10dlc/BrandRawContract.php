<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Messaging10dlc;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Messaging10dlc\Brand\BrandCreateParams;
use Telnyx\Messaging10dlc\Brand\BrandGetFeedbackResponse;
use Telnyx\Messaging10dlc\Brand\BrandGetResponse;
use Telnyx\Messaging10dlc\Brand\BrandListParams;
use Telnyx\Messaging10dlc\Brand\BrandListResponse;
use Telnyx\Messaging10dlc\Brand\BrandUpdateParams;
use Telnyx\Messaging10dlc\Brand\TelnyxBrand;
use Telnyx\PerPagePaginationV2;
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
     * @return BaseResponse<PerPagePaginationV2<BrandListResponse>>
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
     * @return BaseResponse<BrandGetFeedbackResponse>
     *
     * @throws APIException
     */
    public function getFeedback(
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
    public function resend2faEmail(
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
    public function revet(
        string $brandID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
