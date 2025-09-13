<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Verifications\ByPhoneNumber;

use Telnyx\Core\Implementation\HasRawResponse;
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
     * @return VerifyVerificationCodeResponse<HasRawResponse>
     */
    public function verify(
        string $phoneNumber,
        $code,
        $verifyProfileID,
        ?RequestOptions $requestOptions = null,
    ): VerifyVerificationCodeResponse;
}
