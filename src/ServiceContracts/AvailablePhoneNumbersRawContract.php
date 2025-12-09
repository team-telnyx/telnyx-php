<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListParams;
use Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListResponse;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface AvailablePhoneNumbersRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|AvailablePhoneNumberListParams $params
     *
     * @return BaseResponse<AvailablePhoneNumberListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|AvailablePhoneNumberListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
