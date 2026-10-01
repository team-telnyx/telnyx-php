<?php

declare(strict_types=1);

namespace Telnyx\Services\Enterprises;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Enterprises\VerifyEmail\EnterpriseEmailVerificationStatusWrapped;
use Telnyx\Enterprises\VerifyEmail\VerifyEmailConfirmParams;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Enterprises\VerifyEmailRawContract;

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
     * Email a 6-digit code to the enterprise account's contact email to confirm ownership of that address.
     *
     * A BPO (Business Process Outsourcer) account has no DIR, so it proves ownership of its own contact email here rather than through a DIR. A BPO account cannot be approved for use until this contact email is verified.
     *
     * The code expires in 15 minutes. Requesting a new code invalidates any previous one. Resends are rate limited (a short cooldown plus a daily cap). Submit the code to `POST /enterprises/{enterprise_id}/verify_email/confirm`.
     *
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EnterpriseEmailVerificationStatusWrapped>
     *
     * @throws APIException
     */
    public function create(
        string $enterpriseID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['enterprises/%1$s/verify_email', $enterpriseID],
            options: $requestOptions,
            convert: EnterpriseEmailVerificationStatusWrapped::class,
        );
    }

    /**
     * @api
     *
     * Submit the 6-digit code that was emailed to the enterprise account's contact email. On success the contact email is marked verified.
     *
     * For security, any failure (wrong, expired, already-used, or too many attempts) returns the same generic message.
     *
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param array{code: string}|VerifyEmailConfirmParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EnterpriseEmailVerificationStatusWrapped>
     *
     * @throws APIException
     */
    public function confirm(
        string $enterpriseID,
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
            path: ['enterprises/%1$s/verify_email/confirm', $enterpriseID],
            body: (object) $parsed,
            options: $options,
            convert: EnterpriseEmailVerificationStatusWrapped::class,
        );
    }
}
