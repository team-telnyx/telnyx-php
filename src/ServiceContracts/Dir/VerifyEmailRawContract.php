<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Dir;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Dir\VerifyEmail\VerifyEmailConfirmParams;
use Telnyx\Dir\VerifyEmail\VerifyEmailConfirmResponse;
use Telnyx\Dir\VerifyEmail\VerifyEmailSendResponse;
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
     * @param array<string,mixed>|VerifyEmailConfirmParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<VerifyEmailConfirmResponse>
     *
     * @throws APIException
     */
    public function confirm(
        string $dirID,
        array|VerifyEmailConfirmParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $dirID The DIR id. Lowercase UUID.
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<VerifyEmailSendResponse>
     *
     * @throws APIException
     */
    public function send(
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
