<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\VerifiedNumbers;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\VerifiedNumbers\VerifiedNumberDataWrapper;

interface ActionsContract
{
    /**
     * @api
     *
     * @param string $phoneNumber +E164 formatted phone number
     *
     * @throws APIException
     */
    public function submitVerificationCode(
        string $phoneNumber,
        string $verificationCode,
        ?RequestOptions $requestOptions = null,
    ): VerifiedNumberDataWrapper;
}
