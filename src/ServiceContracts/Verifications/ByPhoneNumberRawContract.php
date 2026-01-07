<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Verifications;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Verifications\ByPhoneNumber\ByPhoneNumberListResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ByPhoneNumberRawContract
{
    /**
     * @api
     *
     * @param string $phoneNumber +E164 formatted phone number
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ByPhoneNumberListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $phoneNumber,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
