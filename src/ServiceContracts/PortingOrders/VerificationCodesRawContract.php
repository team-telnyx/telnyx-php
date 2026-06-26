<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PortingOrders;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\PortingOrders\VerificationCodes\VerificationCodeListParams;
use Telnyx\PortingOrders\VerificationCodes\VerificationCodeListResponse;
use Telnyx\PortingOrders\VerificationCodes\VerificationCodeSendParams;
use Telnyx\PortingOrders\VerificationCodes\VerificationCodeVerifyParams;
use Telnyx\PortingOrders\VerificationCodes\VerificationCodeVerifyResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface VerificationCodesRawContract
{
    /**
     * @api
     *
     * @param string $id Porting Order id
     * @param array<string,mixed>|VerificationCodeListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<VerificationCodeListResponse>>
     *
     * @throws APIException
     */
    public function list(
        string $id,
        array|VerificationCodeListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Porting Order id
     * @param array<string,mixed>|VerificationCodeSendParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function send(
        string $id,
        array|VerificationCodeSendParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Porting Order id
     * @param array<string,mixed>|VerificationCodeVerifyParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<VerificationCodeVerifyResponse>
     *
     * @throws APIException
     */
    public function verify(
        string $id,
        array|VerificationCodeVerifyParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
