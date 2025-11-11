<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\VerifiedNumbers;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\VerifiedNumbers\Actions\ActionSubmitVerificationCodeParams;
use Telnyx\VerifiedNumbers\VerifiedNumberDataWrapper;

interface ActionsContract
{
    /**
     * @api
     *
     * @param array<mixed>|ActionSubmitVerificationCodeParams $params
     *
     * @throws APIException
     */
    public function submitVerificationCode(
        string $phoneNumber,
        array|ActionSubmitVerificationCodeParams $params,
        ?RequestOptions $requestOptions = null,
    ): VerifiedNumberDataWrapper;
}
