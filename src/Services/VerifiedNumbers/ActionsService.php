<?php

declare(strict_types=1);

namespace Telnyx\Services\VerifiedNumbers;

use Telnyx\Client;
use Telnyx\Core\Implementation\HasRawResponse;
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
     * @param string $verificationCode
     *
     * @return VerifiedNumberDataWrapper<HasRawResponse>
     */
    public function submitVerificationCode(
        string $phoneNumber,
        $verificationCode,
        ?RequestOptions $requestOptions = null,
    ): VerifiedNumberDataWrapper {
        [$parsed, $options] = ActionSubmitVerificationCodeParams::parseRequest(
            ['verificationCode' => $verificationCode],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['verified_numbers/%1$s/actions/verify', $phoneNumber],
            body: (object) $parsed,
            options: $options,
            convert: VerifiedNumberDataWrapper::class,
        );
    }
}
