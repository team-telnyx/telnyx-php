<?php

declare(strict_types=1);

namespace Telnyx\Services\Verifications\ByPhoneNumber;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Verifications\ByPhoneNumber\ActionsContract;
use Telnyx\Verifications\ByPhoneNumber\Actions\VerifyVerificationCodeResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ActionsService implements ActionsContract
{
    /**
     * @api
     */
    public ActionsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ActionsRawService($client);
    }

    /**
     * @api
     *
     * Verify verification code by phone number
     *
     * @param string $phoneNumber +E164 formatted phone number
     * @param string $code this is the code the user submits for verification
     * @param string $verifyProfileID the identifier of the associated Verify profile
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function verify(
        string $phoneNumber,
        string $code,
        string $verifyProfileID,
        RequestOptions|array|null $requestOptions = null,
    ): VerifyVerificationCodeResponse {
        $params = Util::removeNulls(
            ['code' => $code, 'verifyProfileID' => $verifyProfileID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->verify($phoneNumber, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
