<?php

declare(strict_types=1);

namespace Telnyx\Services\VerifiedNumbers;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\VerifiedNumbers\ActionsRawContract;
use Telnyx\VerifiedNumbers\Actions\ActionSubmitVerificationCodeParams;
use Telnyx\VerifiedNumbers\VerifiedNumberDataWrapper;

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
     * Submit verification code
     *
     * @param string $phoneNumber +E164 formatted phone number
     * @param array{
     *   verificationCode: string
     * }|ActionSubmitVerificationCodeParams $params
     *
     * @return BaseResponse<VerifiedNumberDataWrapper>
     *
     * @throws APIException
     */
    public function submitVerificationCode(
        string $phoneNumber,
        array|ActionSubmitVerificationCodeParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionSubmitVerificationCodeParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['verified_numbers/%1$s/actions/verify', $phoneNumber],
            body: (object) $parsed,
            options: $options,
            convert: VerifiedNumberDataWrapper::class,
        );
    }
}
