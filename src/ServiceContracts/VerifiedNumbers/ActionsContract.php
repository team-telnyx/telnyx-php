<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\VerifiedNumbers;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\VerifiedNumbers\VerifiedNumberDataWrapper;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ActionsContract
{
    /**
     * @api
     *
     * @param string $phoneNumber +E164 formatted phone number
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function submitVerificationCode(
        string $phoneNumber,
        string $verificationCode,
        RequestOptions|array|null $requestOptions = null,
    ): VerifiedNumberDataWrapper;
}
