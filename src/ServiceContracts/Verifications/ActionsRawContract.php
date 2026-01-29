<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Verifications;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Verifications\Actions\ActionVerifyParams;
use Telnyx\Verifications\ByPhoneNumber\Actions\VerifyVerificationCodeResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ActionsRawContract
{
    /**
     * @api
     *
     * @param string $verificationID the identifier of the verification to retrieve
     * @param array<string,mixed>|ActionVerifyParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<VerifyVerificationCodeResponse>
     *
     * @throws APIException
     */
    public function verify(
        string $verificationID,
        array|ActionVerifyParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
