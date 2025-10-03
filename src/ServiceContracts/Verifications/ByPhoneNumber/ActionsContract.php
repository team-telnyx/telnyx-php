<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Verifications\ByPhoneNumber;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Verifications\ByPhoneNumber\Actions\VerifyVerificationCodeResponse;

interface ActionsContract
{
    /**
     * @api
     *
     * @param string $code this is the code the user submits for verification
     * @param string $verifyProfileID the identifier of the associated Verify profile
     *
     * @throws APIException
     */
    public function verify(
        string $phoneNumber,
        $code,
        $verifyProfileID,
        ?RequestOptions $requestOptions = null,
    ): VerifyVerificationCodeResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function verifyRaw(
        string $phoneNumber,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): VerifyVerificationCodeResponse;
}
