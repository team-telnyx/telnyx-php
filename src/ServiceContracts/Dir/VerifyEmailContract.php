<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Dir;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Dir\VerifyEmail\EmailVerificationStatusWrapped;
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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $dirID,
        RequestOptions|array|null $requestOptions = null
    ): EmailVerificationStatusWrapped;

    /**
     * @api
     *
     * @param string $dirID The DIR id. Lowercase UUID.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $dirID,
        RequestOptions|array|null $requestOptions = null
    ): EmailVerificationStatusWrapped;

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
    ): EmailVerificationStatusWrapped;
}
