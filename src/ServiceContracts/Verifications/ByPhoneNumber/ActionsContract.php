<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Verifications\ByPhoneNumber;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Verifications\ByPhoneNumber\Actions\VerifyVerificationCodeResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ActionsContract
{
    /**
     * @api
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
    ): VerifyVerificationCodeResponse;
}
