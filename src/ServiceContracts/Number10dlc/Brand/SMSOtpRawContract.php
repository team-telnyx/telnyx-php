<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Number10dlc\Brand;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Number10dlc\Brand\SMSOtp\SMSOtpGetStatusParams;
use Telnyx\Number10dlc\Brand\SMSOtp\SMSOtpGetStatusResponse;
use Telnyx\Number10dlc\Brand\SMSOtp\SMSOtpTriggerParams;
use Telnyx\Number10dlc\Brand\SMSOtp\SMSOtpTriggerResponse;
use Telnyx\Number10dlc\Brand\SMSOtp\SMSOtpVerifyParams;
use Telnyx\RequestOptions;

interface SMSOtpRawContract
{
    /**
     * @api
     *
     * @param string $referenceID The reference ID returned when the OTP was initially triggered
     * @param array<mixed>|SMSOtpGetStatusParams $params
     *
     * @return BaseResponse<SMSOtpGetStatusResponse>
     *
     * @throws APIException
     */
    public function getStatus(
        string $referenceID,
        array|SMSOtpGetStatusParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $brandID The Brand ID for which to trigger the OTP
     * @param array<mixed>|SMSOtpTriggerParams $params
     *
     * @return BaseResponse<SMSOtpTriggerResponse>
     *
     * @throws APIException
     */
    public function trigger(
        string $brandID,
        array|SMSOtpTriggerParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $brandID The Brand ID for which to verify the OTP
     * @param array<mixed>|SMSOtpVerifyParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function verify(
        string $brandID,
        array|SMSOtpVerifyParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
