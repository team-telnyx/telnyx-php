<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Verifications;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Verifications\Actions\ActionVerifyParams;
use Telnyx\Verifications\ByPhoneNumber\Actions\VerifyVerificationCodeResponse;

interface ActionsRawContract
{
    /**
     * @api
     *
     * @param string $verificationID the identifier of the verification to retrieve
     * @param array<mixed>|ActionVerifyParams $params
     *
     * @return BaseResponse<VerifyVerificationCodeResponse>
     *
     * @throws APIException
     */
    public function verify(
        string $verificationID,
        array|ActionVerifyParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
