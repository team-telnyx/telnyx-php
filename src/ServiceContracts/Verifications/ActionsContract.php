<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Verifications;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Verifications\Actions\ActionVerifyParams\Status;
use Telnyx\Verifications\ByPhoneNumber\Actions\VerifyVerificationCodeResponse;

use const Telnyx\Core\OMIT as omit;

interface ActionsContract
{
    /**
     * @api
     *
     * @param string $code this is the code the user submits for verification
     * @param Status|value-of<Status> $status Identifies if the verification code has been accepted or rejected. Only permitted if custom_code was used for the verification.
     *
     * @throws APIException
     */
    public function verify(
        string $verificationID,
        $code = omit,
        $status = omit,
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
        string $verificationID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): VerifyVerificationCodeResponse;
}
