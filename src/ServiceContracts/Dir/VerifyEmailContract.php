<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Dir;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Dir\VerifyEmail\VerifyEmailConfirmResponse;
use Telnyx\Dir\VerifyEmail\VerifyEmailSendResponse;
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
    public function confirm(
        string $dirID,
        string $code,
        RequestOptions|array|null $requestOptions = null,
    ): VerifyEmailConfirmResponse;

    /**
     * @api
     *
     * @param string $dirID The DIR id. Lowercase UUID.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function send(
        string $dirID,
        RequestOptions|array|null $requestOptions = null
    ): VerifyEmailSendResponse;

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
