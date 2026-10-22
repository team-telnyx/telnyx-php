<?php

declare(strict_types=1);

namespace Telnyx\Services\Dir;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Dir\VerifyEmail\EmailVerificationStatusWrapped;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Dir\VerifyEmailContract;

/**
 * Verify ownership of a DIR's authorizer email. A short code is emailed and confirmed.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class VerifyEmailService implements VerifyEmailContract
{
    /**
     * @api
     */
    public VerifyEmailRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new VerifyEmailRawService($client);
    }

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
     * @throws APIException
     */
    public function create(
        string $dirID,
        RequestOptions|array|null $requestOptions = null
    ): EmailVerificationStatusWrapped {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($dirID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Whether the DIR's current authorizer email has been verified.
     *
     * @param string $dirID The DIR id. Lowercase UUID.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $dirID,
        RequestOptions|array|null $requestOptions = null
    ): EmailVerificationStatusWrapped {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($dirID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Submit the 6-digit code that was emailed to the DIR's authorizer email. On success the authorizer email is marked verified.
     *
     * For security, any failure (wrong, expired, already-used, or too many attempts) returns the same generic message.
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
    ): EmailVerificationStatusWrapped {
        $params = ['code' => $code];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->confirm($dirID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
