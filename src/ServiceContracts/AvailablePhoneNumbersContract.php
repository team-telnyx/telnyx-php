<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListParams;
use Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface AvailablePhoneNumbersContract
{
    /**
     * @api
     *
     * @param array<mixed>|AvailablePhoneNumberListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|AvailablePhoneNumberListParams $params,
        ?RequestOptions $requestOptions = null,
    ): AvailablePhoneNumberListResponse;
}
