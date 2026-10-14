<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Enterprises;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Enterprises\VerifyEmail\EnterpriseEmailVerificationStatusWrapped;
use Telnyx\Enterprises\VerifyEmail\VerifyEmailConfirmParams;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface VerifyEmailRawContract
{
    /**
     * @api
     *
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EnterpriseEmailVerificationStatusWrapped>
     *
     * @throws APIException
     */
    public function create(
        string $enterpriseID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param array<string,mixed>|VerifyEmailConfirmParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EnterpriseEmailVerificationStatusWrapped>
     *
     * @throws APIException
     */
    public function confirm(
        string $enterpriseID,
        array|VerifyEmailConfirmParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
