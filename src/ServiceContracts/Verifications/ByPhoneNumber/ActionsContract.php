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
     * @param string $phoneNumber +E164 formatted phone number
     * @param string $code this is the code the user submits for verification
     * @param string $verifyProfileID the identifier of the associated Verify profile
     *
     * @throws APIException
     */
    public function verify(
        string $phoneNumber,
        string $code,
        string $verifyProfileID,
        ?RequestOptions $requestOptions = null,
    ): VerifyVerificationCodeResponse;
}
