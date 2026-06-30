<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Dir;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Dir\VerifyEmail\VerifyEmailConfirmCodeParams;
use Telnyx\Dir\VerifyEmail\VerifyEmailConfirmCodeResponse;
use Telnyx\Dir\VerifyEmail\VerifyEmailSendCodeResponse;
use Telnyx\Dir\VerifyEmail\VerifyEmailStatusResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface VerifyEmailRawContract
{
    /**
     * @api
     *
     * @param string $dirID The DIR id. Lowercase UUID.
     * @param array<string,mixed>|VerifyEmailConfirmCodeParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<VerifyEmailConfirmCodeResponse>
     *
     * @throws APIException
     */
    public function confirmCode(
        string $dirID,
        array|VerifyEmailConfirmCodeParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $dirID The DIR id. Lowercase UUID.
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<VerifyEmailSendCodeResponse>
     *
     * @throws APIException
     */
    public function sendCode(
        string $dirID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $dirID The DIR id. Lowercase UUID.
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<VerifyEmailStatusResponse>
     *
     * @throws APIException
     */
    public function status(
        string $dirID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
