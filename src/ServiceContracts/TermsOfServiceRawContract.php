<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\TermsOfService\TermsOfServiceGetInfoResponse;
use Telnyx\TermsOfService\TermsOfServiceRetrieveInfoParams;
use Telnyx\TermsOfService\TermsOfServiceStatusParams;
use Telnyx\TermsOfService\TermsOfServiceStatusResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface TermsOfServiceRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|TermsOfServiceRetrieveInfoParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TermsOfServiceGetInfoResponse>
     *
     * @throws APIException
     */
    public function retrieveInfo(
        array|TermsOfServiceRetrieveInfoParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|TermsOfServiceStatusParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TermsOfServiceStatusResponse>
     *
     * @throws APIException
     */
    public function status(
        array|TermsOfServiceStatusParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
