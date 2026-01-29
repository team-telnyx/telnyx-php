<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListParams;
use Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListResponse;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface AvailablePhoneNumbersRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|AvailablePhoneNumberListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AvailablePhoneNumberListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|AvailablePhoneNumberListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
