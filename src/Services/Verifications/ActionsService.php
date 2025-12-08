<?php

declare(strict_types=1);

namespace Telnyx\Services\Verifications;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Verifications\ActionsContract;
use Telnyx\Verifications\Actions\ActionVerifyParams;
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
     * Verify verification code by ID
     *
     * @param array{
     *   code?: string, status?: 'accepted'|'rejected'
     * }|ActionVerifyParams $params
     *
     * @throws APIException
     */
    public function verify(
        string $verificationID,
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
            path: ['verifications/%1$s/actions/verify', $verificationID],
            body: (object) $parsed,
            options: $options,
            convert: VerifyVerificationCodeResponse::class,
        );

        return $response->parse();
    }
}
