<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Messaging10dlc;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Messaging10dlc\Brand\BrandCreateParams;
use Telnyx\Messaging10dlc\Brand\BrandGetFeedbackResponse;
use Telnyx\Messaging10dlc\Brand\BrandGetResponse;
use Telnyx\Messaging10dlc\Brand\BrandGetSMSOtpStatusResponse;
use Telnyx\Messaging10dlc\Brand\BrandListParams;
use Telnyx\Messaging10dlc\Brand\BrandListResponse;
use Telnyx\Messaging10dlc\Brand\BrandRetrieveSMSOtpStatusParams;
use Telnyx\Messaging10dlc\Brand\BrandTriggerSMSOtpParams;
use Telnyx\Messaging10dlc\Brand\BrandTriggerSMSOtpResponse;
use Telnyx\Messaging10dlc\Brand\BrandUpdateParams;
use Telnyx\Messaging10dlc\Brand\BrandVerifySMSOtpParams;
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
     * @param string $referenceID The reference ID returned when the OTP was initially triggered
     * @param array<mixed>|BrandRetrieveSMSOtpStatusParams $params
     *
     * @return BaseResponse<BrandGetSMSOtpStatusResponse>
     *
     * @throws APIException
     */
    public function retrieveSMSOtpStatus(
        string $referenceID,
        array|BrandRetrieveSMSOtpStatusParams $params,
        ?RequestOptions $requestOptions = null,
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

    /**
     * @api
     *
     * @param string $brandID The Brand ID for which to trigger the OTP
     * @param array<mixed>|BrandTriggerSMSOtpParams $params
     *
     * @return BaseResponse<BrandTriggerSMSOtpResponse>
     *
     * @throws APIException
     */
    public function triggerSMSOtp(
        string $brandID,
        array|BrandTriggerSMSOtpParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $brandID The Brand ID for which to verify the OTP
     * @param array<mixed>|BrandVerifySMSOtpParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function verifySMSOtp(
        string $brandID,
        array|BrandVerifySMSOtpParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
