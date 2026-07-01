<?php

declare(strict_types=1);

namespace Telnyx\Services\Dir;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\Dir\VerifyEmail\EmailVerificationStatusWrapped;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Dir\VerifyEmailContract;

/**
 * Verify ownership of a DIR's authorizer email. A short code is emailed and confirmed; the email must be verified before references can be submitted.
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
     * Email a 6-digit code to the DIR's authorizer email to confirm ownership of that address.
     *
     * The code expires in 15 minutes. Requesting a new code invalidates any previous one. Resends are rate limited (a short cooldown plus a daily cap). Submit the code to `POST /dir/{dir_id}/verify_email/confirm`.
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
        $params = Util::removeNulls(['code' => $code]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->confirm($dirID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
