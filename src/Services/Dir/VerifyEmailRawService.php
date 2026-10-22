<?php

declare(strict_types=1);

namespace Telnyx\Services\Dir;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Dir\VerifyEmail\EmailVerificationStatusWrapped;
use Telnyx\Dir\VerifyEmail\VerifyEmailConfirmParams;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Dir\VerifyEmailRawContract;

/**
 * Verify ownership of a DIR's authorizer email. A short code is emailed and confirmed.
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
     * Email a 6-digit code to the DIR's authorizer email to confirm ownership of that address. The code goes to the authorizer, not to the caller. If the authorizer is someone else (for example a client's executive), that person has to share the code with whoever is completing setup.
     *
     * How long the code lasts: 15 minutes by default. 8 hours when the DIR has a call center (BPO) linked through `bpo_authorizations` whose authorization is pending review or approved (a rejected authorization does not count). Link the call center before you send the code: a code sent before the link keeps the 15-minute window, and a code sent after the link lasts 8 hours. The email states the window, and `expires_at` in the response always shows the exact expiry.
     *
     * To resend, call this endpoint again. Each send issues a fresh code and invalidates the previous one. Sends are limited to one every 60 seconds and 10 per DIR per UTC day. A throttled send returns `429` with `retry_after_secs` and `sends_remaining_today` in the error `meta`.
     *
     * Submit the code to `POST /dir/{dir_id}/verify_email/confirm`.
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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['dir/%1$s/verify_email', $dirID],
            options: $requestOptions,
            convert: EmailVerificationStatusWrapped::class,
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
     * @return BaseResponse<EmailVerificationStatusWrapped>
     *
     * @throws APIException
     */
    public function list(
        string $dirID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['dir/%1$s/verify_email', $dirID],
            options: $requestOptions,
            convert: EmailVerificationStatusWrapped::class,
        );
    }

    /**
     * @api
     *
     * Submit the 6-digit code that was emailed to the DIR's authorizer email. On success the authorizer email is marked verified.
     *
     * For security, any failure (wrong, expired, already-used, or too many attempts) returns the same generic message.
     *
     * @param string $dirID The DIR id. Lowercase UUID.
     * @param array{code: string}|VerifyEmailConfirmParams $params
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
    ): BaseResponse {
        [$parsed, $options] = VerifyEmailConfirmParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['dir/%1$s/verify_email/confirm', $dirID],
            body: (object) $parsed,
            options: $options,
            convert: EmailVerificationStatusWrapped::class,
        );
    }
}
