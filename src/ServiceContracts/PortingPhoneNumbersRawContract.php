<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\PortingPhoneNumbers\PortingPhoneNumberListParams;
use Telnyx\PortingPhoneNumbers\PortingPhoneNumberListResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface PortingPhoneNumbersRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|PortingPhoneNumberListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultPagination<PortingPhoneNumberListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|PortingPhoneNumberListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
