<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\TermsOfService\TermsOfServiceInfoParams;
use Telnyx\TermsOfService\TermsOfServiceInfoResponse;
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
     * @param array<string,mixed>|TermsOfServiceInfoParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TermsOfServiceInfoResponse>
     *
     * @throws APIException
     */
    public function info(
        array|TermsOfServiceInfoParams $params,
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
