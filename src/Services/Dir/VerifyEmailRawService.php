<?php

declare(strict_types=1);

namespace Telnyx\Services\Dir;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Dir\VerifyEmail\VerifyEmailConfirmCodeParams;
use Telnyx\Dir\VerifyEmail\VerifyEmailConfirmCodeResponse;
use Telnyx\Dir\VerifyEmail\VerifyEmailSendCodeResponse;
use Telnyx\Dir\VerifyEmail\VerifyEmailStatusResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Dir\VerifyEmailRawContract;

/**
 * Verify ownership of a DIR's authorizer email. A short code is emailed and confirmed; the email must be verified before references can be submitted.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class VerifyEmailRawService implements VerifyEmailRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Submit the 6-digit code that was emailed to the DIR's authorizer email. On success the authorizer email is marked verified.
     *
     * For security, any failure (wrong, expired, already-used, or too many attempts) returns the same generic message.
     *
     * @param string $dirID The DIR id. Lowercase UUID.
     * @param array{code: string}|VerifyEmailConfirmCodeParams $params
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
    ): BaseResponse {
        [$parsed, $options] = VerifyEmailConfirmCodeParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['dir/%1$s/verify_email/confirm', $dirID],
            body: (object) $parsed,
            options: $options,
            convert: VerifyEmailConfirmCodeResponse::class,
        );
    }

    /**
     * @api
     *
     * Email a 6-digit code to the DIR's authorizer email to confirm ownership of that address.
     *
     * The code expires in 15 minutes. Requesting a new code invalidates any previous one. Resends are rate limited (a short cooldown plus a daily cap). Submit the code to `POST /dir/{dir_id}/verify_email/confirm`.
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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['dir/%1$s/verify_email', $dirID],
            options: $requestOptions,
            convert: VerifyEmailSendCodeResponse::class,
        );
    }

    /**
     * @api
     *
     * Whether the DIR's current authorizer email has been verified.
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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['dir/%1$s/verify_email', $dirID],
            options: $requestOptions,
            convert: VerifyEmailStatusResponse::class,
        );
    }
}
