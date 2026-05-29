<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\SipRegistrationStatus\SipRegistrationStatusGetResponse;
use Telnyx\SipRegistrationStatus\SipRegistrationStatusRetrieveParams;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface SipRegistrationStatusRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|SipRegistrationStatusRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SipRegistrationStatusGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        array|SipRegistrationStatusRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
