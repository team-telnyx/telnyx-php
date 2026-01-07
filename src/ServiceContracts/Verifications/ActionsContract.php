<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Verifications;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Verifications\Actions\ActionVerifyParams\Status;
use Telnyx\Verifications\ByPhoneNumber\Actions\VerifyVerificationCodeResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ActionsContract
{
    /**
     * @api
     *
     * @param string $verificationID the identifier of the verification to retrieve
     * @param string $code this is the code the user submits for verification
     * @param Status|value-of<Status> $status Identifies if the verification code has been accepted or rejected. Only permitted if custom_code was used for the verification.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function verify(
        string $verificationID,
        ?string $code = null,
        Status|string|null $status = null,
        RequestOptions|array|null $requestOptions = null,
    ): VerifyVerificationCodeResponse;
}
