<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\SipRegistrationStatus\SipRegistrationStatusListParams;
use Telnyx\SipRegistrationStatus\SipRegistrationStatusListResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface SipRegistrationStatusRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|SipRegistrationStatusListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SipRegistrationStatusListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|SipRegistrationStatusListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
