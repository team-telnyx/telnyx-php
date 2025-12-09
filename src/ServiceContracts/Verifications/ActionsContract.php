<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Verifications;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Verifications\Actions\ActionVerifyParams\Status;
use Telnyx\Verifications\ByPhoneNumber\Actions\VerifyVerificationCodeResponse;

interface ActionsContract
{
    /**
     * @api
     *
     * @param string $verificationID the identifier of the verification to retrieve
     * @param string $code this is the code the user submits for verification
     * @param 'accepted'|'rejected'|Status $status Identifies if the verification code has been accepted or rejected. Only permitted if custom_code was used for the verification.
     *
     * @throws APIException
     */
    public function verify(
        string $verificationID,
        ?string $code = null,
        string|Status|null $status = null,
        ?RequestOptions $requestOptions = null,
    ): VerifyVerificationCodeResponse;
}
