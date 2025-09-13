<?php

declare(strict_types=1);

namespace Telnyx\Services\Verifications;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Verifications\ActionsContract;
use Telnyx\Verifications\Actions\ActionVerifyParams;
use Telnyx\Verifications\Actions\ActionVerifyParams\Status;
use Telnyx\Verifications\ByPhoneNumber\Actions\VerifyVerificationCodeResponse;

use const Telnyx\Core\OMIT as omit;

final class ActionsService implements ActionsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Verify verification code by ID
     *
     * @param string $code this is the code the user submits for verification
     * @param Status|value-of<Status> $status Identifies if the verification code has been accepted or rejected. Only permitted if custom_code was used for the verification.
     *
     * @return VerifyVerificationCodeResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function verify(
        string $verificationID,
        $code = omit,
        $status = omit,
        ?RequestOptions $requestOptions = null,
    ): VerifyVerificationCodeResponse {
        $params = ['code' => $code, 'status' => $status];

        return $this->verifyRaw($verificationID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return VerifyVerificationCodeResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function verifyRaw(
        string $verificationID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): VerifyVerificationCodeResponse {
        [$parsed, $options] = ActionVerifyParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['verifications/%1$s/actions/verify', $verificationID],
            body: (object) $parsed,
            options: $options,
            convert: VerifyVerificationCodeResponse::class,
        );
    }
}
