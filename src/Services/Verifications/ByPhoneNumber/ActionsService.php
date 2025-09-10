<?php

declare(strict_types=1);

namespace Telnyx\Services\Verifications\ByPhoneNumber;

use Telnyx\Client;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Verifications\ByPhoneNumber\ActionsContract;
use Telnyx\Verifications\ByPhoneNumber\Actions\ActionVerifyParams;
use Telnyx\Verifications\ByPhoneNumber\Actions\VerifyVerificationCodeResponse;

final class ActionsService implements ActionsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Verify verification code by phone number
     *
     * @param string $code this is the code the user submits for verification
     * @param string $verifyProfileID the identifier of the associated Verify profile
     */
    public function verify(
        string $phoneNumber,
        $code,
        $verifyProfileID,
        ?RequestOptions $requestOptions = null,
    ): VerifyVerificationCodeResponse {
        [$parsed, $options] = ActionVerifyParams::parseRequest(
            ['code' => $code, 'verifyProfileID' => $verifyProfileID],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['verifications/by_phone_number/%1$s/actions/verify', $phoneNumber],
            body: (object) $parsed,
            options: $options,
            convert: VerifyVerificationCodeResponse::class,
        );
    }
}
