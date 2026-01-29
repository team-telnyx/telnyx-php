<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\VerifiedNumbers;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\VerifiedNumbers\Actions\ActionSubmitVerificationCodeParams;
use Telnyx\VerifiedNumbers\VerifiedNumberDataWrapper;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ActionsRawContract
{
    /**
     * @api
     *
     * @param string $phoneNumber +E164 formatted phone number
     * @param array<string,mixed>|ActionSubmitVerificationCodeParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<VerifiedNumberDataWrapper>
     *
     * @throws APIException
     */
    public function submitVerificationCode(
        string $phoneNumber,
        array|ActionSubmitVerificationCodeParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
