<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\PortingPhoneNumbers\PortingPhoneNumberListParams;
use Telnyx\PortingPhoneNumbers\PortingPhoneNumberListResponse;
use Telnyx\RequestOptions;

interface PortingPhoneNumbersRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|PortingPhoneNumberListParams $params
     *
     * @return BaseResponse<PortingPhoneNumberListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|PortingPhoneNumberListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
