<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
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
     * @return DefaultPagination<PortingPhoneNumberListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|PortingPhoneNumberListParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination;
}
