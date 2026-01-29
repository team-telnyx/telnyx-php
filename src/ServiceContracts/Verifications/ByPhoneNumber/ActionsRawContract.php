<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Verifications\ByPhoneNumber;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Verifications\ByPhoneNumber\Actions\ActionVerifyParams;
use Telnyx\Verifications\ByPhoneNumber\Actions\VerifyVerificationCodeResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ActionsRawContract
{
    /**
     * @api
     *
     * @param string $phoneNumber +E164 formatted phone number
     * @param array<string,mixed>|ActionVerifyParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<VerifyVerificationCodeResponse>
     *
     * @throws APIException
     */
    public function verify(
        string $phoneNumber,
        array|ActionVerifyParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
