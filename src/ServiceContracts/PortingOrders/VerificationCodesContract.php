<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PortingOrders;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\PortingOrders\VerificationCodes\VerificationCodeListParams;
use Telnyx\PortingOrders\VerificationCodes\VerificationCodeListResponse;
use Telnyx\PortingOrders\VerificationCodes\VerificationCodeSendParams;
use Telnyx\PortingOrders\VerificationCodes\VerificationCodeVerifyParams;
use Telnyx\PortingOrders\VerificationCodes\VerificationCodeVerifyResponse;
use Telnyx\RequestOptions;

interface VerificationCodesContract
{
    /**
     * @api
     *
     * @param array<mixed>|VerificationCodeListParams $params
     *
     * @return DefaultPagination<VerificationCodeListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $id,
        array|VerificationCodeListParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination;

    /**
     * @api
     *
     * @param array<mixed>|VerificationCodeSendParams $params
     *
     * @throws APIException
     */
    public function send(
        string $id,
        array|VerificationCodeSendParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|VerificationCodeVerifyParams $params
     *
     * @throws APIException
     */
    public function verify(
        string $id,
        array|VerificationCodeVerifyParams $params,
        ?RequestOptions $requestOptions = null,
    ): VerificationCodeVerifyResponse;
}
