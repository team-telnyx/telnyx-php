<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\AvailablePhoneNumberBlocks\AvailablePhoneNumberBlockListParams;
use Telnyx\AvailablePhoneNumberBlocks\AvailablePhoneNumberBlockListResponse;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface AvailablePhoneNumberBlocksRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|AvailablePhoneNumberBlockListParams $params
     *
     * @return BaseResponse<AvailablePhoneNumberBlockListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|AvailablePhoneNumberBlockListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
