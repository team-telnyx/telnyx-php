<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\VerifiedNumbers;

use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\VerifiedNumbers\VerifiedNumberDataWrapper;

interface ActionsContract
{
    /**
     * @api
     *
     * @param string $verificationCode
     *
     * @return VerifiedNumberDataWrapper<HasRawResponse>
     */
    public function submitVerificationCode(
        string $phoneNumber,
        $verificationCode,
        ?RequestOptions $requestOptions = null,
    ): VerifiedNumberDataWrapper;
}
