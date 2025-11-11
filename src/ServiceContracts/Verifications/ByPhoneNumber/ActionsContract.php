<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Verifications\ByPhoneNumber;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Verifications\ByPhoneNumber\Actions\ActionVerifyParams;
use Telnyx\Verifications\ByPhoneNumber\Actions\VerifyVerificationCodeResponse;

interface ActionsContract
{
    /**
     * @api
     *
     * @param array<mixed>|ActionVerifyParams $params
     *
     * @throws APIException
     */
    public function verify(
        string $phoneNumber,
        array|ActionVerifyParams $params,
        ?RequestOptions $requestOptions = null,
    ): VerifyVerificationCodeResponse;
}
