<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PortingOrders;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\PortingOrders\VerificationCodes\VerificationCodeListParams;
use Telnyx\PortingOrders\VerificationCodes\VerificationCodeListResponse;
use Telnyx\PortingOrders\VerificationCodes\VerificationCodeSendParams;
use Telnyx\PortingOrders\VerificationCodes\VerificationCodeVerifyParams;
use Telnyx\PortingOrders\VerificationCodes\VerificationCodeVerifyResponse;
use Telnyx\RequestOptions;

interface VerificationCodesRawContract
{
    /**
     * @api
     *
     * @param string $id Porting Order id
     * @param array<mixed>|VerificationCodeListParams $params
     *
     * @return BaseResponse<DefaultPagination<VerificationCodeListResponse>>
     *
     * @throws APIException
     */
    public function list(
        string $id,
        array|VerificationCodeListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Porting Order id
     * @param array<mixed>|VerificationCodeSendParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function send(
        string $id,
        array|VerificationCodeSendParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Porting Order id
     * @param array<mixed>|VerificationCodeVerifyParams $params
     *
     * @return BaseResponse<VerificationCodeVerifyResponse>
     *
     * @throws APIException
     */
    public function verify(
        string $id,
        array|VerificationCodeVerifyParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
