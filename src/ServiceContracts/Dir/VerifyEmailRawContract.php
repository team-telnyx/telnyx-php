<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Dir;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Dir\VerifyEmail\EmailVerificationStatusWrapped;
use Telnyx\Dir\VerifyEmail\VerifyEmailConfirmParams;
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailVerificationStatusWrapped>
     *
     * @throws APIException
     */
    public function create(
        string $dirID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $dirID The DIR id. Lowercase UUID.
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailVerificationStatusWrapped>
     *
     * @throws APIException
     */
    public function list(
        string $dirID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $dirID The DIR id. Lowercase UUID.
     * @param array<string,mixed>|VerifyEmailConfirmParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailVerificationStatusWrapped>
     *
     * @throws APIException
     */
    public function confirm(
        string $dirID,
        array|VerifyEmailConfirmParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
