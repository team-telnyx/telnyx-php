<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Enterprises\Reputation;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Enterprises\Reputation\ExternalVerification\ExternalVerificationCreateParams;
use Telnyx\Enterprises\Reputation\ExternalVerification\ExternalVerificationWrapped;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ExternalVerificationRawContract
{
    /**
     * @api
     *
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param array<string,mixed>|ExternalVerificationCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ExternalVerificationWrapped>
     *
     * @throws APIException
     */
    public function create(
        string $enterpriseID,
        array|ExternalVerificationCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ExternalVerificationWrapped>
     *
     * @throws APIException
     */
    public function list(
        string $enterpriseID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
