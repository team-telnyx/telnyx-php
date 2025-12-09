<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Verifications;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Verifications\ByPhoneNumber\ByPhoneNumberListResponse;

interface ByPhoneNumberRawContract
{
    /**
     * @api
     *
     * @param string $phoneNumber +E164 formatted phone number
     *
     * @return BaseResponse<ByPhoneNumberListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $phoneNumber,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
