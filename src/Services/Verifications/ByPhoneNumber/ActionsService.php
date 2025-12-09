<?php

declare(strict_types=1);

namespace Telnyx\Services\Verifications\ByPhoneNumber;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
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
     * @param array{code: string, verifyProfileID: string}|ActionVerifyParams $params
     *
     * @throws APIException
     */
    public function verify(
        string $phoneNumber,
        array|ActionVerifyParams $params,
        ?RequestOptions $requestOptions = null,
    ): VerifyVerificationCodeResponse {
        [$parsed, $options] = ActionVerifyParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<VerifyVerificationCodeResponse> */
        $response = $this->client->request(
            method: 'post',
            path: ['verifications/by_phone_number/%1$s/actions/verify', $phoneNumber],
            body: (object) $parsed,
            options: $options,
            convert: VerifyVerificationCodeResponse::class,
        );

        return $response->parse();
    }
}
