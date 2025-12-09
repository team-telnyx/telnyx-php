<?php

declare(strict_types=1);

namespace Telnyx\Services\Verifications;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Verifications\ActionsRawContract;
use Telnyx\Verifications\Actions\ActionVerifyParams;
use Telnyx\Verifications\Actions\ActionVerifyParams\Status;
use Telnyx\Verifications\ByPhoneNumber\Actions\VerifyVerificationCodeResponse;

final class ActionsRawService implements ActionsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Verify verification code by ID
     *
     * @param string $verificationID the identifier of the verification to retrieve
     * @param array{
     *   code?: string, status?: 'accepted'|'rejected'|Status
     * }|ActionVerifyParams $params
     *
     * @return BaseResponse<VerifyVerificationCodeResponse>
     *
     * @throws APIException
     */
    public function verify(
        string $verificationID,
        array|ActionVerifyParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionVerifyParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['verifications/%1$s/actions/verify', $verificationID],
            body: (object) $parsed,
            options: $options,
            convert: VerifyVerificationCodeResponse::class,
        );
    }
}
