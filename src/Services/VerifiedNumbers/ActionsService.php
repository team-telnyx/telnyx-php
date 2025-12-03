<?php

declare(strict_types=1);

namespace Telnyx\Services\VerifiedNumbers;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\VerifiedNumbers\ActionsContract;
use Telnyx\VerifiedNumbers\Actions\ActionSubmitVerificationCodeParams;
use Telnyx\VerifiedNumbers\VerifiedNumberDataWrapper;

final class ActionsService implements ActionsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Submit verification code
     *
     * @param array{
     *   verification_code: string
     * }|ActionSubmitVerificationCodeParams $params
     *
     * @throws APIException
     */
    public function submitVerificationCode(
        string $phoneNumber,
        array|ActionSubmitVerificationCodeParams $params,
        ?RequestOptions $requestOptions = null,
    ): VerifiedNumberDataWrapper {
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
