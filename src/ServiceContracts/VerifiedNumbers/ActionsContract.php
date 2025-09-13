<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\VerifiedNumbers;

use Telnyx\Core\Exceptions\APIException;
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
     *
     * @throws APIException
     */
    public function submitVerificationCode(
        string $phoneNumber,
        $verificationCode,
        ?RequestOptions $requestOptions = null,
    ): VerifiedNumberDataWrapper;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return VerifiedNumberDataWrapper<HasRawResponse>
     *
     * @throws APIException
     */
    public function submitVerificationCodeRaw(
        string $phoneNumber,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): VerifiedNumberDataWrapper;
}
