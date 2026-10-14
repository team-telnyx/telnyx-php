<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Enterprises;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Enterprises\VerifyEmail\EnterpriseEmailVerificationStatusWrapped;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface VerifyEmailContract
{
    /**
     * @api
     *
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $enterpriseID,
        RequestOptions|array|null $requestOptions = null
    ): EnterpriseEmailVerificationStatusWrapped;

    /**
     * @api
     *
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param string $code the 6-digit code sent to the enterprise account's contact email
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function confirm(
        string $enterpriseID,
        string $code,
        RequestOptions|array|null $requestOptions = null,
    ): EnterpriseEmailVerificationStatusWrapped;
}
