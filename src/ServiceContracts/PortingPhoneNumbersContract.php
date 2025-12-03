<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\PortingPhoneNumbers\PortingPhoneNumberListParams;
use Telnyx\PortingPhoneNumbers\PortingPhoneNumberListResponse;
use Telnyx\RequestOptions;

interface PortingPhoneNumbersContract
{
    /**
     * @api
     *
     * @param array<mixed>|PortingPhoneNumberListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|PortingPhoneNumberListParams $params,
        ?RequestOptions $requestOptions = null,
    ): PortingPhoneNumberListResponse;
}
