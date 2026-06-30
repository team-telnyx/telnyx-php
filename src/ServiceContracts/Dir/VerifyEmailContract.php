<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Dir;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Dir\VerifyEmail\VerifyEmailConfirmCodeResponse;
use Telnyx\Dir\VerifyEmail\VerifyEmailSendCodeResponse;
use Telnyx\Dir\VerifyEmail\VerifyEmailStatusResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface VerifyEmailContract
{
    /**
     * @api
     *
     * @param string $dirID The DIR id. Lowercase UUID.
     * @param string $code the 6-digit code sent to the authorizer email
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function confirmCode(
        string $dirID,
        string $code,
        RequestOptions|array|null $requestOptions = null,
    ): VerifyEmailConfirmCodeResponse;

    /**
     * @api
     *
     * @param string $dirID The DIR id. Lowercase UUID.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function sendCode(
        string $dirID,
        RequestOptions|array|null $requestOptions = null
    ): VerifyEmailSendCodeResponse;

    /**
     * @api
     *
     * @param string $dirID The DIR id. Lowercase UUID.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function status(
        string $dirID,
        RequestOptions|array|null $requestOptions = null
    ): VerifyEmailStatusResponse;
}
