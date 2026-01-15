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
use Telnyx\Messaging10dlc\Brand\BrandTriggerSMSOtpParams;
use Telnyx\Messaging10dlc\Brand\BrandTriggerSMSOtpResponse;
use Telnyx\Messaging10dlc\Brand\BrandUpdateParams;
use Telnyx\Messaging10dlc\Brand\BrandVerifySMSOtpParams;
use Telnyx\Messaging10dlc\Brand\TelnyxBrand;
use Telnyx\PerPagePaginationV2;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface BrandRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|BrandCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TelnyxBrand>
     *
     * @throws APIException
     */
    public function create(
        array|BrandCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BrandGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $brandID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|BrandUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TelnyxBrand>
     *
     * @throws APIException
     */
    public function update(
        string $brandID,
        array|BrandUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|BrandListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PerPagePaginationV2<BrandListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|BrandListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $brandID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BrandGetFeedbackResponse>
     *
     * @throws APIException
     */
    public function getFeedback(
        string $brandID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function resend2faEmail(
        string $brandID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $brandID The Brand ID for which to query OTP status
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BrandGetSMSOtpStatusResponse>
     *
     * @throws APIException
     */
    public function retrieveSMSOtpStatus(
        string $brandID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TelnyxBrand>
     *
     * @throws APIException
     */
    public function revet(
        string $brandID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $brandID The Brand ID for which to trigger the OTP
     * @param array<string,mixed>|BrandTriggerSMSOtpParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BrandTriggerSMSOtpResponse>
     *
     * @throws APIException
     */
    public function triggerSMSOtp(
        string $brandID,
        array|BrandTriggerSMSOtpParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $brandID The Brand ID for which to verify the OTP
     * @param array<string,mixed>|BrandVerifySMSOtpParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function verifySMSOtp(
        string $brandID,
        array|BrandVerifySMSOtpParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
